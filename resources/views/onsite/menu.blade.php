@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ __('Registration Menu') }}
            </div>
            <div class="card-body">
                @isset($success)
                    {{ $success }}
                @endisset
                <br /><br />
                <button type="submit" class="btn btn-primary btn-block" id="myButton-1">Registrasi tanpa Email</button>
                <button type="submit" class="btn btn-primary btn-block" id="myButton-2">Registrasi Lengkap</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.getElementById("myButton-1").onclick = function () {
            location.href = "{{ url('regis/onsite') }}";
        };
        document.getElementById("myButton-2").onclick = function () {
            location.href = "{{ route('register') }}";
        };
    </script>

@endsection