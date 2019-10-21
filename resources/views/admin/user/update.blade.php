@extends('layouts.app-admin')

@section('content')

<div class="card">
<div class="card-body">

    <form method="POST" action="/user/edit/{{ $user->id }}">
        
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama .." value=" {{ $user->name }}">
            @if($errors->has('nama'))
            <div class="text-danger">
                {{ $errors->first('nama')}}
            </div>
            @endif
        </div>

        {{-- <div class="form-group">
            <label>Asal Gereja / Organisasi</label>
            <input type="text" name="asal_gereja_atau_organisasi" class="form-control" placeholder="Asal Gereja / Organisasi .." value=" {{ $user->member->asal_gereja_atau_organisasi }}">
            @if($errors->has('asal_gereja_atau_organisasi'))
            <div class="text-danger">
                {{ $errors->first('asal_gereja_atau_organisasi')}}
            </div>
            @endif
        </div> --}}

        <div class="form-group">
            <label>Email Address</label>
            <input type="text" name="email" class="form-control" placeholder="Email .." value=" {{ $user->email }}">
            @if($errors->has('email'))
            <div class="text-danger">
                {{ $errors->first('email')}}
            </div>
            @endif
        </div>

        {{-- <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number .." value=" {{ $user->member->phone_number }}">
            @if($errors->has('phone_number'))
            <div class="text-danger">
                {{ $errors->first('phone_number')}}
            </div>
            @endif
        </div> --}}
        
        
        
        <div class="form-group">
        <input type="submit" class="btn btn-success" value="Save">
    </div>
    
</form>

</div>
</div>

@endsection