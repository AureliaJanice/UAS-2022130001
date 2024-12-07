@extends('layouts.app')

@section('title', 'Input New Camera')

@section('content')

<div class="text-center mb-4">
    <h1>Input New Camera</h1>
</div>

<div class="row my-4">
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

        <form action="{{ route('camera.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Camera Name</label>
                <input type="text" class="form-control" id="camera_name"
                    placeholder="Input Camera Name" name="camera_name" required value="{{ old('camera_name')}}">
            </div><br>

            {{-- Select ISO 3166-1 ALPHA-2 Primary Type Codes --}}
            <div class="">
                {{-- mb-3 col-md-12 col-sm-12 --}}
                <label for="brand" class="form-group">Brand</label>
                <select class="form-select" id="brand" name="brand">
                    <option value="" disabled selected>Select Brand</option>
                            @foreach (['Nikon', 'Canon', 'FujiFilm', 'Minolta', 'Yashica', 'Pentax', 'Ricoh', 'Olympus', 'Kowa'] as $type)
                                <option value="{{ $type }}"
                                    {{ old('brand') == $type ? 'selected' : '' }}>
                                    {{ $type }}</option>
                            @endforeach
                </select>
            </div><br>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description"
                    placeholder="Input description" name="description" required value="{{ old('description')}}">
            </div><br>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price"
                    placeholder="Input Price" name="price" value="{{ old('price')}}">
            </div><br>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity"
                    placeholder="Input Quantity" name="quantity" value="{{ old('quantity')}}">
            </div><br>

            <div class="form-check">
                <label class="form-check-label" for="status">
                    Status is New
                </label>
                <input class="form-check-input" type="checkbox" value="" id="status"
                    name="status" value="{{ old('status')}}" >
            </div><br>

            {{-- Input photo --}}
            <div class="form-group">
                <label for="photo">Camera Image</label>
                <input type="file" class="form-control" id="photo"
                    name="photo">
            </div>
            <br>

            <table>
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
