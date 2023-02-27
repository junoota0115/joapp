<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //商品一覧画面
    public function showIndex(Request $request){
        $products = Product::all();
        $keyword = $request->input('keyword');

        $query = Product::query();

        if(!empty($keyword)) {
            $query->where('product_name', 'LIKE', "%{$keyword}%");
                // ->orWhere('author', 'LIKE', "%{$keyword}%");
        }

        $products = $query->get();
        // return view('products.index',['products' =>$products]);
        return view('products.index', compact('products', 'keyword'));
    }

    //商品詳細画面表示
    public function showDetail($id){
        $product = Product::find($id);

        return view('products.detail',['product' => $product]);
    }

    //商品登録ページ表示
    public function showCreate(){
        return view('products.create');
    }

    //商品登録
    public function exeStore(Request $request){
    $inputs = $request->all();
    DB::begintransaction();
    // dd($inputs);
    try{
        Product::create($inputs);
        DB::commit();
    }catch(\Throwable $e){
        DB::rollback();
        abort(500);
    }
    return redirect(route('index'));
    }

    //商品登録ページ表示
    public function showEdit($id){
        $product = Product::find($id);
        return view('products.edit',['product' => $product]);
    }

    //商品編集更新
    public function exeUpdate(Request $request){
    $inputs = $request->all();
    DB::beginTransaction();
    try{
        $product = Product::find($inputs['id']);
        $product->fill([
            'company_id' => $inputs['company_id'],
            'product_name' => $inputs['product_name'],
            'price' => $inputs['price'],
            'stock' => $inputs['stock'],
            'comment' => $inputs['comment'],
        ]);
        $product->save();
        DB::commit();
    }catch(\Throwable $e){
        DB::rollback();
        abort(500);
    }
    return view('products.detail',['product' => $product]);
    }

    //削除機能
    public function exeDestory(Request $request){
        $inputs = $request->all();
        try{
            DB::beginTransaction();
            Product::where('id',$inputs['id'])->delete();
            DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }
        return redirect(route('index'));
        }

}
