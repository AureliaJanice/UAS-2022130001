@extends('layouts.app')

@section('title', 'Sale List')

@section('content')
<div class="text-center">
    <h1>All Sale</h1>

    <a href="{{ route('sale.create') }}" class="btn btn-primary btn-sm">Create New sale</a>

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
                    <th scope="col">Penjual</th>
                    <th scope="col">Nama Camera</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody id="sale-list">
                @forelse ($sales as $sale)
                <tr>
                    <th scope="row">{{ str_pad($sale->id_sale, 4, '0', STR_PAD_LEFT) }}</th>
                    <td>
                        <a href="{{ route('sale.show', $sale) }}">
                        {{ $sale->sale_name }}
                        </a>
                    </td>

                    <td>{{ $sale->penjual }}</td>
                    <td>{{ $sale->camera_name }}</td>
                    <td>{{ $sale->brand }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{{ Str::limit($sale->description, 50, '...') }}</td>

                    <td>
                        <a href="{{ route('sale.edit', $sale) }}" class="btn btn-warning  btn-sm">
                           Edit
                        </a>
                        <form action={{ route('sale.destroy', $sale) }} method="POST" class="d-inline-block">
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
                    <td colspan="7">No sales found.</td>
                </tr>
                @endforelse
            </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $sales->links() !!}
    </div>
</div>
@endsection

