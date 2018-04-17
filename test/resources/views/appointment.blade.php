@extends('layout')

@section('content')
<h1>{{ $user->name }}</h1>
<h2>{{ $user->profession }}</h2>

<form method="POST" action="/placeappointments/{{$user->id}}">
  {{ csrf_field() }}
  <div class="form-group">
    Appointment date and time:
    <input type="datetime-local" name="appointmentTime">
    <input type="hidden" name="userID" value="{{$user->id}}">
  </div>
  <button type="submit" class="btn btn-primary">Place Appointment</button>
</form>
@endsection