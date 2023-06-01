@extends('layouts.admin')
@section('content')
    <form action="{{ url('/orders/store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">اسم المنتج</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"> المنتج</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">الكمية </label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="quantity">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">السعر الكلي  </label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="total_price">
        </div>
        <button type="submit" class="btn btn-primary">احفظ</button>
    </form>
@endsection