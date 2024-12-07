@extends('layouts.app')

@section('title', 'order List')

@section('content')
<div class="text-center">
    <h1>All order</h1>

    <a href="{{ route('order.create') }}" class="btn btn-primary btn-sm">Create New order</a>

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
                    <th scope="col">pembeli</th>
                    <th scope="col">Nama Camera</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody id="order-list">
                @forelse ($orders as $order)
                <tr>
                    <th scope="row">{{ str_pad($order->id_order, 4, '0', STR_PAD_LEFT) }}</th>
                    <td>
                        <a href="{{ route('order.show', $order) }}">
                        {{ $order->order_name }}
                        </a>
                    </td>

                    <td>{{ $order->pembeli }}</td>
                    <td>{{ $order->camera_name }}</td>
                    <td>{{ $order->brand }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ Str::limit($order->description, 50, '...') }}</td>

                    <td>
                        <a href="{{ route('order.edit', $order) }}" class="btn btn-warning  btn-sm">
                           Edit
                        </a>
                        <form action={{ route('order.destroy', $order) }} method="POST" class="d-inline-block">
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
                    <td colspan="7">No orders found.</td>
                </tr>
                @endforelse
            </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $orders->links() !!}
    </div>
</div>
@endsection

