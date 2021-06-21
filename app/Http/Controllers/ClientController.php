<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
public function store(Request $request){
$rules=[
    'username'=>'required','unique',
    'gender'=>'nullable',
    'birthdate'=>'nullable|date',
    'payment_method'=>'nullable',
];
 $msgs= $this->getmsg();
$validator=Validator::make($request->all(),$rules,$msgs);
    if($validator->fails()){
        return $validator->errors();
    }
Client::create([
    'username'=>$request->username,
    'gender'=>$request->gender,
    'birthdate'=>$request->birthdate,
    'payment_method'=>$request->payment_method,



]);
}
protected function getmsg(){  
return $msgs=[
'phone.required'=>'you must enter a phone number to save this reservation',
'numberOfIndividual.required'=>'you must enter number of people to save this reservation',
'date.required'=>'you must enter the date to save this reservation',
'phone.max'=>'phone number is 11 characters only',
'phone.numeric'=>'must be numbers only',

];}

}
