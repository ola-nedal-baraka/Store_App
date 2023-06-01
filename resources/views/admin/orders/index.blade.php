@extends('layouts.admin')
@section('content')
<div class="mt-3">
<a href="{{url('/orders/create')}}" class="btn btn-primary"> Add New order   </a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">quantity</th>
            <th scope="col">total price</th>
            <th scope="col">actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $index => $order)
            <tr>
                <th scope="row">{{ ++$index }}</th>
                <td>{{ $order->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_price }}</td>
                <!-- other columns -->
                <td>
                    <a href="{{ url('/orders/destroy/' . $order->id) }}" class="btn btn-danger">حذف</a>
                    <a href="{{ url('/orders/edit/' . $order->id) }}" class="btn btn-info">تحديث</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $orders->links() }}<!--  Blade directive in Laravel that generates pagination links for a paginated result set. -->
</div>
@endsection