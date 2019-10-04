@extends('layouts.app')

@section('content')
    {{--  dd(done);  --}}
    <script type="text/javascript">
        setTimeout(function() {
            window.location.href = "{{ url('/reg-success') }}";
        }, 100);
    </script>
@endsection