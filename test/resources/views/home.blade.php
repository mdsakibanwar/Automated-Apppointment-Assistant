@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged inlala!

                </div>
            </div>
        </div>
    </div>
</div>
<form method="GET" action="/appointments">
  {{ csrf_field() }}
    <button type="Submit" class="btn btn-primary">Show Appointments</button>
</form>
@endsection