<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image;
use File;
use App\Product;
use App\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $products = Product::OrderBy('created_at', 'desc')->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::pluck('nama', 'id');
        return view('products.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $this->handleRequest($request);
        $create = Product::create($data);
        if($create != ""){
            $notif = $this->getPesan('create');
        }else{
            $notif = $this->getPesan('error');
        }
        return redirect()->route('produk.index')->with($notif);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $suppliers = Supplier::pluck('nama', 'id');
        return view('products.edit', compact('suppliers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        $oldImage = $products->image;
        $data = $this->handleRequest($request);
        $products->update($data);
        if ($oldImage !== $products->image) {
            $this->deleteImage($oldImage);
        }

        if($products != ""){
            $notif = $this->getPesan('update');
        }else{
            $notif = $this->getPesan('error');
        }
        return redirect()->route('produk.index')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::find($id);
        if(!empty($delete->image)){
        $data['photo'] = $this->deleteImage($delete->image);
        }
        $delete->delete();
        $notif = $this->getPesan('delete');
        return redirect()->back()->with($notif);
    }

    public function deleteImage($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'image/products'
            . DIRECTORY_SEPARATOR . $filename;
        return File::delete($path);
    }

    public function handleRequest($request)
    {
        $data = $request->all();
		if ($request->hasFile('image')) {
            $nama = str_slug($request->nama);
			$image     = $request->file('image');
			$extension = $image->guessClientExtension();
            $fileName  = 'product-'.$nama.'.' . $extension;
            $destination = base_path() . '/public/image/products';
			$successUpload = Image::make($image->getRealPath())
                ->resize(300, 250)
                ->save($destination. "/" . $fileName);
			$data['image'] = $fileName;
		}
        return $data;
    }
}
