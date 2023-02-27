@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品編集ページ</div>
        <form action="{{route('update')}}" method="POST" >
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="form-group">
                        <label for="company_id">会社名</label>
                        <select class="form-control" id="company_id" name="company_id" placeholder="company_id" value="{{$product->company_id }}">
                            <option value="A">A社</option>
                            <option value="B">B社</option>
                            <option value="C">C社</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="product_name">商品名</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="product_name" value="{{$product->product_name }}">
                    </div>

                    <div class="form-group">
                        <label for="price">値段</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="price" value="{{$product->price}}">
                    </div>

                    <div class="form-group">
                        <label for="stock">在庫</label>
                        <input type="text" class="form-control" id="stock" name="stock" placeholder="stock" value="{{$product->stock}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="comment">コメント</label>
                        <textarea class="form-control" id="comment" name="comment" placeholder="comment" value="">{{$product->comment}}</textarea>
                    </div>
            
                    <button class="btn btn-primary" name="submit" type="submit">編集する</button>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('js/alert.js') }}" defer></script>
