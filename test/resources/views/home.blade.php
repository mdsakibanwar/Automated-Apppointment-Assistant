@extends('layout')

@section('content')
<?php 
    use App\Appointment;
    $user = Auth::user();
    $appointmentToMe = Appointment::where('user_id','=', $user->id)->get();
    $appointmentFromMe = Appointment::where('client_id','=', $user->id)->get();
?>
<div align="left">
  <h1>{{ $user->name }}</h1>
  <h2>{{ $user->profession }}</h2>
  <a href="/user/{{$user->id}}/edit" class="btn btn-success"> Edit </a>
</div>
  <h2 align="left">Appointment List From Me</h2>
  <table>
     <tr >
        <th style=" padding-right: 20px;">Appoinment ID</th>
        <th style=" padding-right: 20px;">Client_ID</th>
        <th >Appointment Time</th>
      </tr>
      @foreach($appointmentToMe as $appointment)
        <tr >
          <td style=" padding-right: 20px;">{{ $appointment->id }}</td>
          <td style=" padding-right: 20px;">{{ $appointment->client_id }}</td>
          <td >{{ $appointment->appointmentTime }}</td>
        </tr>
      @endforeach
  </table>
<br>
  <h2 align="left">Appointment List To Me</h2>
  <table>
     <tr >
        <th style=" padding-right: 20px;">Appoinment ID</th>
        <th style=" padding-right: 20px;">User_ID</th>
        <th >Appointment Time</th>
      </tr>
      @foreach($appointmentFromMe as $appointment)
        <tr>
          <td style=" padding-right: 20px;">{{ $appointment->id }}</td>
          <td style=" padding-right: 20px;">{{ $appointment->user_id }}</td>
          <td >{{ $appointment->appointmentTime }}</td>
        </tr>
      @endforeach
 </table>
<div style="clear: both"></div>
@endsection
