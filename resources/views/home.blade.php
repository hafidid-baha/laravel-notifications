@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @isset($data)
                        @foreach ($data as $d)
                            <div class="alert alert-primary" role="alert">
                                {{ $d["msg"] }}
                            </div>
                        @endforeach
                    @endisset
                    

                    {{ __('You are logged in!') }}

                    <a href="{{ route('notification.database') }}" class="btn btn-success d-block mt-3 mb-3">Send Notifications</a>

                    <small>this button well send all the notification specified inside via method</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
