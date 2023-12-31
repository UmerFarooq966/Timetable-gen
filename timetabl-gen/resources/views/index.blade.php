@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @auth()
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if(auth()->type=1)

                                    <p> <a href="{{route('admin.home')}}">view your admin panel</a></p>
                            @elseif(auth()->type=2)
                                    <p><a href="{{route('home')}}">view your student panel </a></p>

                                @endif
                                @else
                                <p>You are not logged in</p>

                            @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
