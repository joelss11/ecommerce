@extends('admin.layouts.template')
@section('page_title')
Pending Orders - Ecommerce
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-title">
            <h2 class="text-center">Pending Orders</h2>
        </div>
        <div class="card-body">

            <table class="table">
                <tr>
                    <th>User Id</th>
                    <th>Shipping Information</th>
                    <th>Product Id</th>
                    <th>Quantity</th>
                    <th>Total Will Pay</th>
                    <th>Action</th>
                </tr>
                @foreach ($pending_orders as $order )
                <tr>
                    <td> {{$order->userid }}</td>
                    <td>
                        <ul>
                            <li>Phone Number - {{ $order->shipping_phoneNumber }} </li>
                            <li>City - {{ $order->shipping_city }} </li>
                            <li>Postal Code - {{ $order->shipping_postalcode }} </li>
                        </ul>
                    </td>
                    <td>{{ $order->product_id }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->total_price}}</td>
                    <td>
                        <form action="{{ route('approveorder', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Approve Now</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection