@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品登録ページ</div>
                <form class="card-body" action="{{route('destory')}}" method="POST">
                  @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button type="submit">削除</button>
                </form>
                    <div>商品ID:
                {{$product->id}}
            </div>
            <div>商品名:
                <td>{{$product->product_name}}</td>
            </div>
            <div>会社名:
                <td>{{$product->company_id}}</td>
            </div>
            <div>値段:
                <td>{{$product->price}}</td>
            </div>
            <div>在庫:
                <td>{{$product->stock}}</td>
            </div>
            <div>コメント:
                <td>{{$product->comment}}</td>
            </div>
            
            <a href="/products/edit/{{$product->id}}">編集</a>
            <a href="/products/index/">HOME</a>

            </div>
        </div>
    </div>
</div>
@endsection