<?php

namespace App\Http\Controllers;

use App\Http\Requests\productRequest;
use App\Models\PanelUsers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function panel () {
        return redirect('/panel/urunler');
    }

    public function index () {
        $title = 'Ürünler';
        $products = Product::where('is_published', 1)->get();
        return view('panel.products.product', compact('title', 'products'));
    } 

    public function create () {
        return view('panel.products.create');
    }

    public function create_last (productRequest $request) {
        $product = new Product();
        $product->ad = $request->get('name');  
        $product->description = $request->get('description');  
        $product->fiyat = $request->get('price');  
        $product->is_published = $request->boolean('is_published');  
        $product->save();
        return redirect()->back();
    }

    public function update ($id) {
        $product = Product::find($id);
        if($product) {
            return view('panel.products.update', compact('product'));
        } else {
            return redirect('/panel/urunler');
        }
    } 

    public function update_last (productRequest $request, $id) {
        $product = Product::find($id);
        $product->ad = $request->get('name');  
        $product->description = $request->get('description');  
        $product->fiyat = $request->get('price');  
        $product->is_published = $request->boolean('is_published');  
        $product->save();
        return redirect()->back();
    } 

    public function sil ($id) {
        $product = Product::find($id);
        if($product) {
            $product->delete();
            return redirect()->back();
        } else {
            return redirect('/panel/urunler');
        }
    }
}
