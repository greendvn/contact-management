@extends('layout.master')
@section('content')
    <h3> Add New Contact</h3>



    <form method="post" action="{{route('store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label >First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="first name" value="{{old('first_name')}}" required>
            @if ($errors->has('first_name'))
                {{$errors->first('first_name')}}
            @endif
        </div>
        <div class="form-group">
            <label >Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="last name" value="{{old('last_name')}}"  required>
            @if ($errors->has('last_name'))
                {{$errors->first('last_name')}}
            @endif
        </div>
        <div class="form-group">
            <label >Phone Number</label>
            <input type="text" class="form-control" name="phone" placeholder="phone" value="{{old('phone')}}"  required>
            @if ($errors->has('phone'))
                {{$errors->first('phone')}}
            @endif
        </div>
        <div class="form-group">
            <label >Email</label>
            <input type="email" class="form-control" name="email" placeholder="name@example.com" value="{{old('email')}}" required>
            @if ($errors->has('email'))
                {{$errors->first('email')}}
            @endif
        </div>

        <div class="form-group">
            <label >Address</label>
            <textarea class="form-control" name="address" rows="3">{{old('address')}} </textarea>
            @if ($errors->has('address'))
                {{$errors->first('address')}}
            @endif
        </div>
        <div class="form-group">
            <label>Avatar</label>
            <input type="file" class="form-control-file" name="avatar">
            @if ($errors->has('avatar'))
                {{$errors->first('avatar')}}
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('index')}}"  class="btn btn-primary">Back</a>
    </form>




@endsection
