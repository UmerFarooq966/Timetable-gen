<!-- resources/views/components/notify.blade.php -->

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
