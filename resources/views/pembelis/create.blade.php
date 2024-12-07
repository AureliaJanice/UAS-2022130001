@extends('layouts.app')

@section('title', 'Register New Buyer')

@section('content')

<div class="mt-4 p-5 bg-black text-white">
    <h1>Register</h1>
</div>

<div class="row my-5">
    <div class="col-12 px-5">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('pembeli.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="buyer_name">Name</label>
                <input type="text" class="form-control" id="buyer_name"
                    placeholder="buyer Name" name="name" required value="{{ old('name')}}">
            </div>

            <div class="form-group">
                <label for="message">Address</label>
                <input type="text" class="form-control" id="message"
                    placeholder="Message" name="message" required value="{{ old('message')}}">
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number"
                    placeholder="Phone Number" name="phone_number" value="{{ old('phone_number')}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"
                    placeholder="Email Address" name="email" value="{{ old('email')}}">
            </div>


            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>

@endsection
