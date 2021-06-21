@extends('layouts.navbar')
@section('content')
<h2> Add a Reservation</h2>
<form method='POST' action="{{route('ajax.booking.update')}}" id="UpdateForm" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <input type="text" class="form-control text-line" id="exampleInputEmail1" value="{{$booking->id}}" name="id" aria-describedby="emailHelp" style="display: none;">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone number</label>
    <input type="text" class="form-control text-line" id="phone" value="{{$booking->phone}}" name="phone" aria-describedby="emailHelp" style="width:400px; background: transparent;
    border: none;
    border-bottom: 1px solid #000000;">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Number Of Individual</label>
    <input type="number" class="form-control text-line" id="individual" value="{{$booking->numberOfIndividual}}" name="numberOfIndividual" style="width:400px; background: transparent;
    border: none;
    border-bottom: 1px solid #000000; " >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Date</label>
    <input type="datetime-local" class="form-control text-line" id="date" value="{{ \Carbon\Carbon::parse($booking->date)->format('Y-m-d\TH:i')}}" name="date" style="width:400px; background: transparent;
    border: none;
    border-bottom: 1px solid #000000;">
  </div>
  <button id="update_booking" class="btn btn-primary">Update Booking</button>
</form>
@endsection
@section('script')
<script>
$(document).on('click', '#update_booking', function (e) {
  e.preventDefault();
  var formData =new FormData($('#UpdateForm')[0]);
  $.ajax({
      type: 'POST',
      enctype: 'multipart/form-data',
      url: "{{route('ajax.booking.update')}}",
      data: formData,
      processData:false,
      contentType:false,
      cache:false,
      success: function (data) {
          if (data.status == true) {
             $('#success_msg').show();
              // alert(data.msg);
          }

      }, error: function (reject) {}
});
});

</script>
@endsection