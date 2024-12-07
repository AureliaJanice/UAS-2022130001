@extends('layouts.app')

@section('title', 'Register New Guest')

@section('content')

<div class="mt-4 p-5 bg-black text-white">
    <h1>Register New Guest</h1>
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

        <form action="{{ route('guests.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="guest_name">Guest Name</label>
                <input type="text" class="form-control" id="guest_name"
                    placeholder="Guest Name" name="name" required value="{{ old('name')}}">
            </div>

            <div class="form-group">
                <label for="guest_category">Guest Category</label>
                <select class="form-select form-select-lg mb-3" name="category_id" >
                    {{-- cara menghub ke tabel induk --}}
                    <option value=" ">No Category</option>
                    @foreach ( $categories as $category )
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="guest_tag">Guest Tags</label>
                <select class="form-select form-select-lg mb-3" name="tags[]" multiple>
                    {{-- cara menghub ke tabel induk --}}
                    @foreach ( $tags as $tag )
                        <option value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <input type="text" class="form-control" id="message"
                    placeholder="Message" name="message" required value="{{ old('message')}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"
                    placeholder="Email Address" name="email" value="{{ old('email')}}">
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number"
                    placeholder="Phone Number" name="phone_number" value="{{ old('phone_number')}}">
            </div>

{{-- shortcut: ctrl+ ?/ --}}

            {{-- Input avatar --}}
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control" id="avatar"
                    name="avatar">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>

@endsection
