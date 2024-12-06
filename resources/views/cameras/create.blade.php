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
                <label for="retail_price">Retail Price</label>
                <input type="text" class="form-control" id="retail_price"
                    placeholder="Input Retail Price" name="retail_price" value="{{ old('retail_price')}}">
            </div><br>

            <div class="form-group">
                <label for="height">Height</label>
                <input type="number" class="form-control" id="height"
                    placeholder="Input Height" name="height" value="{{ old('height')}}">
            </div><br>

            <div class="form-group">
                <label for="hp">Hp</label>
                <input type="number" class="form-control" id="hp"
                    placeholder="Input Hp" name="hp" value="{{ old('hp')}}">
            </div><br>

            <div class="form-group">
                <label for="attack">Attack</label>
                <input type="number" class="form-control" id="attack"
                    placeholder="Input Attack" name="attack" value="{{ old('attack')}}">
            </div><br>

            <div class="form-group">
                <label for="defense">Defense</label>
                <input type="number" class="form-control" id="defense"
                    placeholder="Input Defense" name="defense" value="{{ old('defense')}}">
            </div><br>

            <div class="form-check">
                <label class="form-check-label" for="is_legendary">
                    Is Legendary
                </label>
                <input class="form-check-input" type="checkbox" value="" id="is_legendary"
                    name="is_legendary" value="{{ old('is_legendary')}}" >
            </div><br>

            {{-- Input photo --}}
            <div class="form-group">
                <label for="photo">camera Image</label>
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
