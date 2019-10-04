@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Get Ticket') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <h5>Pastikan alamat email yang Anda masukkan benar. Silahkan pilih sesi minimal 1 dan maksimal 3.</h5>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="asal_gereja_atau_organisasi" class="col-md-4 col-form-label text-md-right">{{ __('Asal Gereja / Organisasi') }}</label>
    
                                <div class="col-md-6">
                                    <input id="asal_gereja_atau_organisasi" type="text" class="form-control @error('asal_gereja_atau_organisasi') is-invalid @enderror" name="asal_gereja_atau_organisasi" value="{{ old('asal_gereja_atau_organisasi') }}" required autocomplete="asal_gereja_atau_organisasi" autofocus>
    
                                    @error('asal_gereja_atau_organisasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="sesi-1" class="col-md-4 col-form-label text-md-right">{{ __('Session') }}</label>
                                <div class="col-sm-10 col-md-6 @error('sesi') is-invalid @enderror">
                                    <div class="form-check" required>
                                        <input class="form-check-input" type="checkbox" name="sesi[]" value="Sesi 1">
                                        <label class="form-check-label" for="sesi_1">
                                            1 ( 09.00 - 13.00 )
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="sesi[]" value="Sesi 2">
                                        <label class="form-check-label" for="sesi_2">
                                            2 ( 13.00 - 17.00 )
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="sesi[]" value="Sesi 3">
                                        <label class="form-check-label" for="sesi_3">
                                            3 ( 17.00 - 21.00 )
                                        </label>
                                    </div>
                                    @error('sesi')
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
