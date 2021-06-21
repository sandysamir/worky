<?php

namespace App\Http\Controllers;
use App\Booking;
use App\Checkin;
use App\Checkout;
use App\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Workspace;
use App\User;
use Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        return view('booking.addBooking');
}
public function  all (){
    // $user= User::find($user);
    $id = Auth::user()->id;
    $bookings=Booking::select('id', 'phone','numberOfIndividual','date')->where('workspace_id',$id)->orderBy('date', 'desc')->get();
    $costs = Cost::sum('cost');
    return view('booking.table',compact('bookings','id','costs'));

}
public function store(Request $request){
    $rules=[
        'phone'=>'required',
        'numberOfIndividual'=>'required|numeric',
        'date'=>'required|date',
    ];
     $msgs= $this->getmsg();
      $id = auth()->user()->id;
    $validator=Validator::make($request->all(),$rules,$msgs);
        if($validator->fails()){
            return $validator->errors();
        }
    booking::create([
        'phone'=>$request->phone,
        'numberOfIndividual'=>$request->numberOfIndividual,
        'date'=>$request->date,
        'workspace_id'=>$id,
        

    ]);  
    $id = Auth::user()->id;
    return redirect()->route('table.show',['user' =>   $id]);
}
protected function getmsg(){  
    return $msgs=[
    'phone.required'=>'you must enter a phone number to save this reservation',
    'numberOfIndividual.required'=>'you must enter number of people to save this reservation',
    'date.required'=>'you must enter the date to save this reservation',
    'phone.max'=>'phone number is 11 characters only',
    'phone.numeric'=>'must be numbers only',

];

}

public function edit(Request  $request)
{     $booking = Booking::find($request -> booking_id);
    if (!$booking)
        return response()->json([
            'status' => false,
            'msg' => 'this reservation not found' ,
        ]);
        $booking=Booking::select('id', 'phone','numberOfIndividual','date')->find($request -> booking_id);

    return view('booking.editBooking', compact('booking'));

}
public  function update(Request $request){
    
    return $request;
}



public function  Cost (Request $request){ 
       $cost=0;
       $humans=Booking::select('numberOfIndividual')->where('id','=',$request->id)->get()->first(); 
       $hour1=Checkin::select('checkin')->where('booking_id','=',$request->id)->get()->first(); 
       $hour2=Checkout::select('checkout')->where('booking_id','=',$request->id)->get()->first(); 
       $hr2=$hour2->checkout;
       $hr1=$hour1->checkin;
       $hu=$humans->numberOfIndividual;
       $from = Carbon::parse($hr2);
       $to = Carbon::parse($hr1);
       $diff_in_hours = $to->diffInHours($from);
       if($diff_in_hours<2){
        $cost=10;
          }
       else {
              $cost=30;
} 
$fcost=$cost*$hu;
Cost::create([
    'cost'=>$fcost,
    'booking_id'=>$request->id,
]);
return $hu;}
public function  Calculate (Request $request){
    $now=Carbon::now('Africa/Cairo')->format('H:i:s');
    Checkout::create([
    'checkout'=>$now,
    'booking_id'=>$request->id,
]);
       
return'saved'; 
}
public function  CheckIn (Request $request){
    $now=Carbon::now('Africa/Cairo')->format('H:i:s');
    Checkin::create([
        'checkin'=>$now,
        'booking_id'=>$request->id,
    ]);
   
}
public function  delete(Request $request){

    $booking = Booking::find($request->id);   // Offer::where('id','$offer_id') -> first();

    if (!$booking)
        return redirect()->back()->with(['error' => __('messages.offer not exist')]);

    $booking->delete();
    return response()->json([
        'status' => true,
        'msg' => 'deleted with ajaxا',
        'id'=>$request->id
    ]);

}
public function  Search(){
    return "hi";
    $id = Auth::user()->id;
    $searchphone=$_GET['query_phone'];
    $bookings=Booking::where('phone','LIKE','%'.$searchphone.'%')->get();
    $costs = Cost::sum('cost');
    return view('booking.table',compact('bookings','costs','id'));
}



}
