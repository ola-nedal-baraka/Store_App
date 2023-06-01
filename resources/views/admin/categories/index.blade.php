@extends('layouts.admin')
@section('content')
<div class="py-5">
<a href="{{url('/category/create')}}" class="btn btn-primary"></a>صنف جديد</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">اسم الصنف</th>
      <th scope="col">الأحداث</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
    <tr>
      <th scope="row">1</th>
      <td>{{$category->name}}</td>
         <!-- other columns -->
      <td>
      <a href="{{url('$products/delete/'.$category->$id)}}" class="btn btn-danger"> حذف</a>
        <a href="{{url('$products/edit/'.$category->$id)}}" class="btn btn-success">تحديث</a>
    </td>
    </tr>
@endforeach

  </tbody>
</table>
{{ $categories->links() }}<!--  Blade directive in Laravel that generates pagination links for a paginated result set. -->
</div>
@endsection