@extends('layout.master')
@section('content')

    <h3> Contacts List</h3>
    <div class="row" >
        <div class="col-md-6">

            <a href="{{route('create')}}" class="btn btn-primary">Add New Contact</a>
        </div>
        <div class="col-mad-6">
            <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="get">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search"
                       aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Session::has('succes'))
        {{ \Illuminate\Support\Facades\Session::get('succes')}}
    @endif
    <table class="table" style="margin-top: 5px">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Avatar</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($contacts as $key => $contact)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$contact->first_name}}</td>
                <td>{{$contact->last_name}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->address}}</td>
                <td><img src="{{asset('storage/images/contact/'.$contact->avatar)}} " style="width:100px"></td>
                <td><a href="{{route('delete',$contact->id)}}" class="btn btn-danger"   onclick="return confirm('Bạn chắc chắn không')" >Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8"><p style="text-align: center">No data</p></td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
