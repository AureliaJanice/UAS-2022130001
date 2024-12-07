@extends('layouts.app')

@section('title', 'Camera List')

@section('content')
<div class="text-center">
    <h1>All Camera</h1>

    <a href="{{ route('camera.create') }}" class="btn btn-primary btn-sm">Create New camera</a>

</div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

<div class="container mt-5">
    <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Primary Type</th>
                    <th scope="col">Power</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody id="camera-list">
                @forelse ($cameras as $camera)
                <tr>
                    <th scope="row">{{ str_pad($camera->id_camera, 4, '0', STR_PAD_LEFT) }}</th>
                    <td>
                        <a href="{{ route('camera.show', $camera) }}">
                        {{ $camera->camera_name }}
                        </a>
                    </td>

                    <td>{{ $camera->brand }}</td>
                    <td>{{ $camera->price }}</td>
                    <td>{{ $camera->quantity }}</td>

                    <td>
                        <a href="{{ route('camera.edit', $camera) }}" class="btn btn-warning  btn-sm">
                           Edit
                        </a>
                        <form action={{ route('camera.destroy', $camera) }} method="POST" class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">No cameras found.</td>
                </tr>
                @endforelse
            </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $cameras->links() !!}
    </div>
</div>
@endsection

