<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Booking;
use App\User;
use App\Workspace;
class ApiController extends Controller
{
    public function Getclient(){
        $Clientdata = Client::get();
        return response()->json($Clientdata);
    }
    public function Getworkspace(){
        $Workspacedata = Workspace::get();
        return response()->json($Workspacedata);
    }
    public function Getbooking(){
        $bookingdata = Booking::get();
        return response()->json($bookingdata);
    }
    
    public function saveReservation(Request $request){
        $reservation =new  Booking;
        $reservation->phone=$request->phone;
        $reservation->date=$request->date;
        $reservation->numberOfIndividual=$request->numberOfIndividual;
        $reservation->workspace_id=$request->workspace_id;
        if($reservation->save()){
            return ['result'=>"reservation has been added"];
        }
    }
    public function saveClient(Request $request){
        $reservation =new  Client;
        $reservation->username=$request->username;
        $reservation->email=$request->email;
        $reservation->gender=$request->gender;
        $reservation->birthday=$request->birthday;
        $reservation->payment_method=$request->payment_method;
        


        if($reservation->save()){
            return ['result'=>"client has been added"];
        }

    }
    public function searchWorkspace(){
        $name = User::get();
       $WorkspaceName = User::where('name', 'like', "%{$name}%")
                 ->get();
return response()->json([
    'name' => $WorkspaceName
]);

    }
    
    
}

// https://workiispace.000webhostapp.com/api/getclient?api_password=workspace1234