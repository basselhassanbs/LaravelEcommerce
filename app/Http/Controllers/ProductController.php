<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        // return $products;
        return view('products.index', ['products' => $products]);
    }
    public function show(Product $product){
        return view('products.show', ['product' => $product]);
    }
    public function create(){

        return view('products.create');
    }
    public function store(){

        $this->validateProduct();
        // if(request()->hasFile('product_image')){
        //     $path = request()->file('product_image')->store('products','public');
        //     Product::create([
        //         'type' => request()->type,
        //         'name' => request()->name,
        //         'price' => request()->price,
        //         'description' => request()->description,
        //         'user_id' => auth()->user()->id,
        //         'image_path' => '/storage/'.$path
        //     ]);
        // }

        if(request()->file()){
            $fileName = time().'_'.request()->file('product_image')->getClientOriginalName();
            $filePath = request()->file('product_image')->storeAs('uploads', $fileName, 'public');
            Product::create([
                        'type' => request()->type,
                        'name' => request()->name,
                        'price' => request()->price,
                        'description' => request()->description,
                        'user_id' => auth()->user()->id,
                        'image_path' => $filePath
                    ]);
        }

        return redirect('/');
    }
    public function edit(Product $product){

        $this->authorize('update',$product);
        return view('products.edit',
            ['product' => $product]);
    }
    public function update(Product $product){

        $this->authorize('update',$product);

        $this->validateProduct2();
        if(request()->hasFile('image_path')){
            $fileName = time().'_'.request()->file('product_image')->getClientOriginalName();
            $filePath = request()->file('product_image')->storeAs('uploads', $fileName, 'public');
            $product->type = request()->type;
            $product->name = request()->name;
            $product->price = request()->price;
            $product->description = request()->description;
            $product->image_path = '/storage/'.$filePath;
            $product->save();
        }
        else
        {
            $product->type = request()->type;
            $product->name = request()->name;
            $product->price = request()->price;
            $product->description = request()->description;
            $product->save();
        }
        return redirect(route('products.show',$product));
    }
    public function destroy(Product $product)
    {
        $this->authorize('delete',$product);

        if($product){
            $product->delete();
            return redirect('/myproducts')->with([
                'message' => 'deleted successfully',
                'alert-type' => 'success'
            ]);
        }
        else{
            return redirect('/myproducts')->with([
                'message' => 'deleted failed',
                'alert-type' => 'danger'
            ]);
        }
    }
    protected function validateProduct()
    {
        return request()->validate([
            'type' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
    protected function validateProduct2()
    {
        return request()->validate([
            'type' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
    }
}
