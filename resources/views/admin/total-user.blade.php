@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Total User</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    Total User : {{$member}}<br />
                    Total Sesi 1 : {{ count($sesi1) }}<br />
                    Total Sesi 2 : {{ count($sesi2) }}<br />
                    Total Sesi 3 : {{ count($sesi3) }}<br />
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
