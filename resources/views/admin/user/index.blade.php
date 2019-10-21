@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    User Management
                    <a class="float-right" href="{{ url('/user/create') }}">{{ __('Create User') }}</a>
                </div>
            </div>
            <br />
        </div>
            <br />
                <form>
                    <input type="text" name="search" placeholder="search user ...">
                    <button type="input">Search</button>
                    {{--  <input type="text" name="searchchurch">
                    <button type="input">Search</button>  --}}
                </form>

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                {{--  <th width="5">No.</th>  --}}
                                <th>Name</th>
                                <th>Asal Gereja / Organisasi</th>
                                <th>Sesi</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $value)
                            <tr>
                                {{--  <td>{{ $key+1 }}</td>  --}}
                                {{--  <td>{{ $value->id}}</td>  --}}
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->member->asal_gereja_atau_organisasi }}</td>
                                <td>{{ $value->member->sesi }}</td>
                                <td>{{ $value->member->phone_number }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <a class="btn btn-secondary" href="/user/edit/{{ $value->id }}">Edit</a>
                                    |
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="/user/delete/{{ $value->id }}">Delete<i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
            Halaman : {{ $users->currentPage() }} <br/>
            Data Per Halaman : {{ $users->perPage() }} <br/>
            Total : {{ $users->total() }} <br />

            </div>
        {{ $users->links() }}
</div>
@endsection