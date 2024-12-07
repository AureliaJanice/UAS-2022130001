@extends('layouts.app')

@section('title', "Camera: $camera->camera_name")

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center ">
        <div class="card">
            <div class="card-header text-center">
                <h1>Detail Camera</h1></div>
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-3">
                        @if ($camera->photo)
                            <img src="{{ $camera->photo_url }}" class="rounded img-thumbnail w-40"/>
                        @endif
                    </div>
        <div class="col-sm-6">
          <div class="row d-flex justify-content-center">
            <div class="col-8 col-sm-4">
                Name
            </div>
            <div class="col-8 col-sm-4">
                {{ $camera->name }}
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Species
                </div>
                <div class="col-4 col-sm-4">
                    {{ $camera->species }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Primary Type
                </div>
                <div class="col-4 col-sm-4">
                    {{ $camera->primary_type }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Weight
                </div>
                <div class="col-4 col-sm-4">
                    {{ $camera->weight }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Height
                </div>
                <div class="col-4 col-sm-4">
                    {{ $camera->height }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Hp
                </div>
                <div class="col-4 col-sm-4">
                    {{ $camera->hp }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Defense
                </div>
                <div class="col-4 col-sm-4">
                    {{ $camera->defense }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Is Legendary
                </div>
                <div class="col-4 col-sm-4">
                    @if ($camera->is_legendary)
                            <td>Yes</td>
                        @else
                            <td>No</td>
                        @endif
                </div>
            </div>
        </div>
      </div>
</div>

<br>
<div class="mb-4 d-flex justify-content-center">
    <a href="{{ route('pembeli', $pembeli) }}" class="btn btn-success btn-sm me-3 ">
        Beli
    </a>
</div>
</br>

<br>
<div class="mb-4 d-flex justify-content-center">
    <a href="{{ route('Home', $camera) }}" class="btn btn-secondary btn-sm me-3 ">
        Back to Home
    </a>

    <a href="{{ route('camera.index', $camera) }}" class="btn btn-secondary btn-sm ">
        Back to List Camera
    </a>

</div><br>

@endsection
