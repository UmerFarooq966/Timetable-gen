@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Class Timing for') }} {{ $course->name }}</div>

                    <div class="card-body">
                        <!-- Display existing class timings -->
                        <h3>{{ __('Existing Class Timings') }}:</h3>
                        <ul>
                            @foreach($classTimings as $timing)
                                <li>{{ $timing->start_time }} to {{ $timing->end_time }}</li>
                            @endforeach
                        </ul>

                        <form method="POST" action="{{ route('storeClassTiming', $course->id) }}">
                            @csrf

                            <div class="form-group">
                                <label for="start_time">{{ __('Start Time') }}:</label>
                                <input type="datetime-local" id="start_time" name="start_time" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="end_time">{{ __('End Time') }}:</label>
                                <input type="datetime-local" id="end_time" name="end_time" class="form-control" required>
                            </div>

                            <!-- Add other form fields as needed -->

                            <button type="submit" class="btn btn-primary">{{ __('Create Class Timing') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
