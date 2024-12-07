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
                        @if ($camera->camera_image)
                            <img src="{{ $camera->camera_image_url }}" class="rounded img-thumbnail w-40"/>
                        @endif
                    </div>
        <div class="col-sm-6">
          <div class="row d-flex justify-content-center">
            <div class="col-8 col-sm-4">
                Camera Name
            </div>
            <div class="col-8 col-sm-4">
                {{ $camera->camera_name }}
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Brand
                </div>
                <div class="col-4 col-sm-4">
                    {{ $camera->brand }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Price
                </div>
                <div class="col-4 col-sm-4">
                    {{ $camera->price}}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Quantity
                </div>
                <div class="col-4 col-sm-4">
                    {{ $camera->quantity }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Status
                </div>
                <div class="col-4 col-sm-4">
                    @if ($camera->status)
                            <td>New</td>
                        @else
                            <td>Second</td>
                        @endif
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Description
                </div>
                <div class="col-4 col-sm-4">
                    {{ $camera->hp }}
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
