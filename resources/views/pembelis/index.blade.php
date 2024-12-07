@extends('layouts.app')

@section('title', 'Pembelis List')

@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Pembeli</h1>

    <a href="{{ route('pembelis.create') }}" class="btn btn-primary btn-sm">Create New Pembeli</a>

</div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

<div class="container mt-5">
    <table class="table table-bordered mb-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pembelis as $pembeli)
                <tr>
                    <th scope="row">{{ $pembeli->id }}</th>
                    <td>
                        <a href="{{ route('pembelis.show', $pembeli) }}">
                        {{ $pembeli->name }}
                        </a>
                    </td>
                    <td>
                        {{ $pembeli->category?->name ?? 'No category' }}
                    </td>
                    <td>
                        @foreach ($pembeli->tags as $tag)
                            <span class="badage bg-primary">{{ $tag->name }}</span>
                        @endforeach
                    </td>

                    <td>{{ $pembeli->phone_number }}</td>
                    <td>{{ $pembeli->email }}</td>
                    <td>{{ $pembeli->created_at }}</td>
                    <td>{{ $pembeli->updated_at }}</td>
                    <td>
                        <a href="{{ route('pembelis.edit', $pembeli) }}" class="btn btn-warning btn-sm">
                           Edit
                        </a>
                        <form action={{ route('pembelis.destroy', $pembeli) }} method="POST" class="d-inline-block">
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
                    <td colspan="7">No pembelis found.</td>
                </tr>
                @endforelse
            </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $pembelis->links() !!}
    </div>
</div>
@endsection

