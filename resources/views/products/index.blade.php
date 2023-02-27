@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">商品一覧</div>
                <div>
                    <form action="{{ route('index') }}" method="GET">
                      <input type="text" name="keyword" value="{{ $keyword }}">
                      <input type="submit" value="検索">
                    </form>
                  </div>
                <a href="{{ route('create') }}">新規登録</a>
                <hr>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
    <tbody>
        @foreach($products as $product)
    <tr>
        <td><a href="/products/detail/{{$product->id}}">{{$product->id}}</td>
        <td>{{$product->product_name}}</td>
        <td>{{$product->price}}</td>
    </tr>
    @endforeach
    </tbody>
    
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
