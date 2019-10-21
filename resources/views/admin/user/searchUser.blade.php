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
            <form action="{{ url('search-user') }}">
                    <div class="row">
                      <div class="col-md-4">
                        <input class="form-control form-control-sm" type="search" name="q" value="{{ $q }}">
                      </div>

                      {{-- <div class="col-md-4">
                        <input class="form-control form-control-sm" type="search" name="r" value="{{ $r }}">
                        </div> --}}
                  
                      <div class="col-md-2 col-3">
                        <select name="sortBy" class="form-control form-control-sm" value="{{ $sortBy }}">
                          @foreach(['name', 'email', 'asal_gereja_atau_organisasi'] as $col)
                            <option @if($col == $sortBy) selected @endif value="{{ $col }}">{{ ucfirst($col) }}</option>
                          @endforeach
                        </select>
                      </div>
                  
                      <div class="col-md-2 col-3">
                        <select name="orderBy" class="form-control form-control-sm" value="{{ $orderBy }}">
                          @foreach(['asc', 'desc'] as $order)
                            <option @if($order == $orderBy) selected @endif value="{{ $order }}">{{ ucfirst($order) }}</option>
                          @endforeach
                        </select>
                      </div>
                  
                      <div class="col-md-2 col-3">
                        <select name="perPage" class="form-control form-control-sm" value="{{ $perPage }}">
                          @foreach(['20','50','100','250'] as $page)
                            <option @if($page == $perPage) selected @endif value="{{ $page }}">{{ $page }}</option>
                          @endforeach
                        </select>
                      </div>
                  
                      <div class="col-md-2 col-3">
                        <button type="submit" class="w-100 btn btn-sm bg-blue">Filter</button>
                      </div>
                    </div>
                  </form>
            <br />
        </div>
                    
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="5">No.</th>
                                <th>Name</th>
                                <th>Option</th>
                                <th>Asal Gereja / Organisasi</th>
                                <th>Sesi</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $value)
                            <tr>
                                <!--<td>{{ $key+1 }}</td>-->
                                <td>{{ $value->id}}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                    <!--            <a href="/user/edit/{{ $value->id }}">Edit</a>-->
				                    <!--|-->
				                    <a href="/user/delete/{{ $value->id }}">Hapus</a>
                                </td>
                                <td>{{ $value->member->asal_gereja_atau_organisasi }}</td>
                                <td>{{ $value->member->sesi }}</td>
                                <td>{{ $value->member->phone_number }}</td>
                                <td>{{ $value->email }}</td>
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
