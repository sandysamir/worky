@extends('layouts.navbar')
@section('content')
<h2> Add a Reservation</h2>
<form method='POST' id="offerForm" action="{{url('booking\store')}}" >
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone number</label>
    <input type="text" class="form-control text-line" id="exampleInputEmail1" name="phone" aria-describedby="emailHelp" style="width:500px; background: transparent;
    border: none;
    border-bottom: 1px solid #000000;">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Number Of Individual</label>
    <input type="number" class="form-control text-line" id="exampleInputPassword1" name="numberOfIndividual" style="width:500px; background: transparent;
    border: none;
    border-bottom: 1px solid #000000; " >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Date</label>
    <input type="datetime-local" class="form-control text-line" id="exampleInputPassword1"  name="date" style="width:500px; background: transparent;
    border: none;
    border-bottom: 1px solid #000000;">
  </div>
  <button id="save_booking" class="btn btn-primary">Book</button>
</form>
@endsection
@section('script')
<script>

$(document).on('click', '#save_booking', function (e) {
  e.preventDefault();
  var formData =new FormData($('#offerForm')[0]);
  $.ajax({
      type: 'POST',
      enctype: 'multipart/form-data',
      url: "{{route('ajax.booking.store')}}",
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
          var response = $.parseJSON(reject.responseText);
          $.each(response.errors, function (key, val) {
              $("#" + key + "_error").text(val[0]);
          }
          );
});

</script>
@stop 