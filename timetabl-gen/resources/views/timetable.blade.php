@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Timetable</h2>

        @component('components.notify')
        @endcomponent

        @if($clashes->isNotEmpty())
            <div class="alert alert-danger" role="alert">
                There are timetable clashes in your enrolled courses. Please review your timetable.
            </div>
        @endif

        <div id="calendar"></div>

        <h3>Enrolled Courses:</h3>
        <ul>
            @foreach($enrolledCourses as $enrolledCourse)
                <li>{{ $enrolledCourse->course->name }}</li>
            @endforeach
        </ul>

        <h3>Class Schedule:</h3>
        @foreach ($groupedClasses as $date => $classes)
            <h3>{{ $date }}</h3>
            <ul>
                @foreach ($classes as $class)
                    <li>{{ $class->name }} - {{ $class->start_time->format('H:i') }} to {{ $class->end_time->format('H:i') }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    // Here you need to provide the events data
                    // Each event should have a title, start, and end
                        @foreach($groupedClasses as $date => $classes)
                        @foreach ($classes as $class)
                    {
                        title: '{{ $class->name }}',
                        start: '{{ $class->start_time->toIso8601String() }}',
                        end: '{{ $class->end_time->toIso8601String() }}',
                    },
                    @endforeach
                    @endforeach
                ],
            });
            calendar.render();
        });
    </script>
@endsection
