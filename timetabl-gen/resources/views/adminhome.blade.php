@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body py-1">
                    @auth()
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as admin!') }}

                        @foreach($courses as $course)

                            <x-card class="d-inline-grid py-5 mx-5">

                                <div class="ms-auto">

                                     <h2 class="text-2xl">
                                         {{$course ->name}}
                                      </h2>

                                    <a href="/addtime/{{$course->id}}">
                                      Add Time
                                    </a>

                                </div>

                            </x-card>




                        @endforeach

                    @else
                    <p>You are not logged in</p>

                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
