@extends('layouts.app')

@section('title', 'Update Buyer')

@section('content')

<div class="mt-4 p-5 bg-black text-white">
    <h1>Update Profile</h1>
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

        <form action="{{ route('pembeli.update', $pembeli->update) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="buyer_name">Name</label>
                <input type="text" class="form-control" id="buyer_name"
                    placeholder="buyer Name" name="name" required value="{{ old('name', $pembeli->name)}}">
            </div>

            <div class="form-group">
                <label for="message">Address</label>
                <input type="text" class="form-control" id="message"
                    placeholder="Message" name="message" required value="{{ old('message', $pembeli->message)}}">
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number"
                    placeholder="Phone Number" name="phone_number" value="{{ old('phone_number', $pembeli->phone_number)}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"
                    placeholder="Email Address" name="email" value="{{ old('email', $pembeli->email)}}">
            </div>


            <button type="submit" class="btn btn-success btn-block">Save Update</button>
            <div class="d-flex justify-content-start mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            </div><table>
                <td>
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                    <button type="reset" class="btn btn-outline-danger btn-block">Reset</button>
                    <div class="d-flex justify-content-start mt-4">
                    <a href="{{ route('camera.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </td>
            </table>
        </form>
    </div>
</div>

@endsection
