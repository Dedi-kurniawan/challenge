<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Supplier;

class CatalogueController extends Controller
{
    public function index(){
        $katalog = Product::OrderBy('created_at', 'desc')->paginate(9);
        return view('welcome',compact('katalog'));
    }

    public function SupplierProduct($id){
        $supplier = Supplier::where('id', $id)->paginate(9);
        return view('supplier',compact('supplier'));
    }

    public function DetailProduct($id){
        $products = Product::where('id', $id)->first();
        return view('detail',compact('products'));
    }
}
