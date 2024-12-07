@extends('layouts.app')

@section('title', "Pembeli: $pembeli->name")

@section('content')

<table class="table table-bordered">
    <tbody>
        <tr>
            <th scope="row">Name</th>
            <td>{{ $pembeli->name }}</td>
        </tr>
        <tr>
            <th scope="row">Address</th>
            <td>{{ $pembeli->message }}</td>
        </tr>
        <tr>
            <th scope="row">Phone Number</th>
            <td>{{ $pembeli->phone_number }}</td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td>{{ $pembeli->email }}</td>
        </tr>

    </tbody>
</table>

<div>
    <small>Created at: {{ $pembeli->created_at }}</small>
    @if ($pembeli->updated_at)
        <br><small>Updated at: {{ $pembeli->updated_at }}</small>
    @endif
</div>

@endsection
