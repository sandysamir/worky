@extends('layouts.navbar')
@section('content')
<h2 class='pb-5'> CheckOut Reservation</h2>
<form method='POST' id="CalculateForm"  action="{{route('ajax.booking.calculate')}}" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <h2> total cost </h2>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Date</label>
    <input type="time" class="form-control text-line" id="exampleInputPassword1"  name="checkout" style="width:500px; background: transparent;
    border: none;
    border-bottom: 1px solid #000000;">
  </div>
  <a href="{{route('ajax.booking.calculate')}}" class=" checkout_btn btn btn-warning" rowid="{{$bookings->id}}" >  Check Out</a>
</form>
@section('script')
<script>

$(document).on('click', '.checkout_btn', function (e) {
            e.preventDefault();

            var booking_id =  $(this).attr('rowid');
            $.ajax({
                type: 'get',
                url: "{{route('ajax.booking.calculate')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                  
                    'id':booking_id},
                success: function (data) {

                 if (data.status == true) {
                    $('#success_msg').show();
    // alert(data.msg);
                                         }


}, error: function (reject) {}
}
          );
  });

</script>
@stop @stop 