@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registration on The Spot') }}</div>

                <div class="card-body">
                    @isset($success)
                        {{ $success }}
                        <br />
                        <div style="font-size: 20px;">
                            Selamat Datang, <b>{{ $data->name }}</b>
                        </div>
                    @endisset
                    <br /><br />
                    <form method="POST" action="{{ url('/onsite') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required>
    
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="asal_gereja_atau_organisasi" class="col-md-4 col-form-label text-md-right">{{ __('Asal Gereja / Organisasi') }}</label>
    
                                <div class="col-md-6">
                                    <input id="asal_gereja_atau_organisasi" type="text" class="form-control @error('asal_gereja_atau_organisasi') is-invalid @enderror" name="asal_gereja_atau_organisasi" required autofocus>
    
                                    @error('asal_gereja_atau_organisasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <button type="submit" class="btn btn-primary" id="myButton-1">
                        {{ __('Menu') }}
                    </button>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("myButton-1").onclick = function () {
        location.href = "{{ url('regis/menu') }}";
    };
</script>

@endsection