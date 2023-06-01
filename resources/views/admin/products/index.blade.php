@extends('layouts.admin')
@section('content')
<div class="py-5">

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">اسم المنتج</th>
      <th scope="col">الكمية</th>
      <th scope="col">السعر</th>
      <th scope="col">الصنف</th>
      <th scope="col">الأحداث</th>
    </tr>
  </thead>
  <tbody>
@foreach ($products as $product)
    <tr>
      <th scope="row">1</th>
      <td>{{$product->name}}</td>
      <td>{{$product->category_id}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->quantity}}</td>
        <!-- other columns -->
      <td>
      |<a href="{{url('$products/delete/'.$product->$id)}}" class="btn btn-danger"> حذف</a>
      <a href="{{url('$products/edit/'.$product->$id)}}" class="btn btn-success">تحديث</a>
    </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
{{ $products->links() }}  <!--  Blade directive in Laravel that generates pagination links for a paginated result set. -->
</div>
@endsection
