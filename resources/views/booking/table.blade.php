
@extends('layouts.navbar')

@section('content') 

<style> body {
  background-color: #404040
;
}
th{color: white;}
td{color: white;}
.dot {
  height: 50px;
  width: 50px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  position: relative;
}

</style>
<div class="card-group d-flex me-5 ">
<div class="card bg-light mb-3 me-5 " style="max-width:33%;   border-radius: 25px;
">
<h5> <div class="card-header">Clients</div></h5>

  <div class="card-body d-flex ">
  <span class="dot">
  <img  class="dot" style="width: 50px; height: 50px; position: absolute; padding:px; margin-right:7px;"src="https://img.icons8.com/office/100/000000/crowd.png"/>
  </span>
  <h5 class="card-title md-2 px-3"> Number of existing clients is <bold> {{$bookings->count() }}  </bold> 
</h5>
  </div>
</div>
<div class="card  bg-light mb-3 me-5" style="max-width:33%;   border-radius: 25px;
">
   <h5><div class="card-header">Income</div></h5>
  <div class="card-body d-flex">
  <span class="dot">
  <img style="width: 44px; height: 44px; position: absolute; padding:1px; margin-top:3px;"src="https://img.icons8.com/office/100/000000/price-tag.png"/>
  </span>
    <h5 class="card-title md-2 px-3"> current income is {{$costs}}</h5>

  </div>
</div>
<div class="card   bg-light mb-3" style="max-width:33%;   border-radius: 25px;
">
<h5><div class="card-header">Booking</div></h5>
  <div class="card-body">
    <h5 class="card-title">Add a Reservation</h5>
    <a href="{{route('ajax.booking.add')}}" class="btn btn-success font-weight-bold"> <b>Book Now </b></a>
    
  </div>
</div>
 </div>
    <div class="container">
        <div class="alert alert-success" id="success_msg" style="display: none"> deleted successfully</div>
    <table class="table" id="datatable">
        <thead>
        <tr >
            <th scope="col">phone</th>
            <th scope="col">Date Carbon</th>
            <th scope="col"> number Of Individual</th>
            <th scope="col">Action</th>
        </tr>
       
        
        </tr>
        </thead>
        <tbody>
        <form class="form-inline" type="get" action ="{{route('booking.search')}}">
        <tr>
        <td>
        <input type="text" class="form-control" name ="query_phone"
        style ="width:170px;border: none;border-radius: 4px;background-color:#404040; color:white;" 
        placeholder=" search for phone" id="Search" />
        </td>
        <td>
        <input type="text" style ="width:170px;border: 1px solid #ffffff;border-radius: 4px; border: none; background-color:#404040; color: #ffffff;" class=" form-contoller filter-input " placeholder=" search by date" data-column="1"/>
        </td>
        <td> </td>
        <td> </td>
        </form>
        @foreach($bookings as $booking)
        <tr class="BookingRow{{$booking->id}}">
            <td>{{$booking->phone}}</td>
            <td> {{ \Carbon\Carbon::parse($booking->date)->diffForHumans()}}</td>
            <td>{{$booking->numberOfIndividual}}</td>

            <td>
            <a href="{{route('ajax.booking.edit',$booking->id)}}" class="btn btn-primary"> Edit</a>
            <a href="" delete_book="{{$booking->id}}" class="delete_btn btn btn-danger">delete</a>
            <a href="{{route('ajax.booking.checkin')}}" class=" checkinbtn checkin_btn btn btn-success" row_id="{{$booking->id}}"> Check IN</a>
            <a href="{{route('ajax.booking.calculate')}}" class="checkoutbtn checkout_btn btn btn-warning"  id="{{$booking->id}}"  rowid="{{$booking->id}}">  Check Out</a>
            <a href="{{route('ajax.booking.cost')}}" class="cost_btn btn btn-info"  costid="{{$booking->id}}"> Bill</a>

            </td></div>
        </tr>
        @endforeach
        </tbody>

    </table>
    </div>
@stop
@section('script') 
<script>
function disableButton(btn){
		document.getElementById(row_id).disabled = true;
		alert("Button has been disabled.");
	}
$(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();

            var booking_id =  $(this).attr('delete_book');
            $.ajax({
                type: 'post',
                url: "{{route('ajax.booking.delete')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id':booking_id },
                success: function (data) {

                 if (data.status == true) {
                    $('#success_msg').show();
    // alert(data.msg);
                      $('.BookingRow'+data.id).remove();  
                                         }


}, error: function (reject) {}
}
          );
  });
  $(document).on('click', '.checkin_btn', function (e) {
            e.preventDefault();

            var booking_id =  $(this).attr('row_id');
            $.ajax({
                type: 'get',
                url: "{{route('ajax.booking.checkin')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id':booking_id },
                success: function (data) {
                  document.getElementById(booking_id).disabled = true;
	              	alert("It is not valid to press the checkin twice.");
                 if (data.status == true) {
                    $('#success_msg').show();
                    
    // alert(data.msg);
                                         }


}, error: function (reject) {
  
}
}
          );
  });    
  $(document).on('click', '.checkout_btn', function (e) {
            e.preventDefault();

            var booking_id =  $(this).attr('rowid');
            $.ajax({
                type: 'get',
                url: "{{route('ajax.booking.calculate')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id':booking_id },
                success: function (data) {

                 if (data.status == true) {
                    $('#success_msg').show();
    // alert(data.msg);
                                         }


}, error: function (reject) {}
}
          );
  }); 
  $(document).on('click', '.cost_btn', function (e) {
            e.preventDefault();

            var booking_id =  $(this).attr('costid');
            $.ajax({
                type: 'get',
                url: "{{route('ajax.booking.cost')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id':booking_id },
                success: function (data) {

                 if (data.status == true) {
                    $('#success_msg').show();
    // alert(data.msg);
                                         }


}, error: function (reject) {}
}
          );
  }); 

$(document).on('keypress', '.Search', function (e) {
          e.preventDefault();
          $.ajax({
          url:"{{route('booking.search')}}"});
}); 
</script>
@stop