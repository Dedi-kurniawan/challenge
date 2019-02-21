<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Supplier;
use GuzzleHttp\Client;

class SupplierController extends Controller
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
        $suppliers = Supplier::OrderBy('created_at', 'desc')->paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = $this->KotaIndonesia();
        return view('suppliers.create', compact('kota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        $data = $request->all();
        $create = Supplier::create($data);

        if($create != ""){
            $notif = $this->getPesan('create');
        }else{
            $notif = $this->getPesan('error');
        }
        return redirect()->route('supplier.index')->with($notif);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suppliers = Supplier::find($id);
        return view('suppliers.show', compact('suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::find($id);
        $kota = $this->KotaIndonesia();
        return view('suppliers.edit', compact('kota', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
        $data = $request->all();
        $suppliers = Supplier::find($id)->update($data);
        if($suppliers != ""){
            $notif = $this->getPesan('update');
        }else{
            $notif = $this->getPesan('error');
        }
        return redirect()->route('supplier.index')->with($notif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Supplier::find($id)->delete();
        $notif = $this->getPesan('delete');
        return redirect()->back()->with($notif);
    }

    public function KotaIndonesia(){
        $url = 'https://api.rajaongkir.com/starter/city';
        $client = new Client();
        $response = $client->request('GET', $url, [
            'headers' => [
            'key' => 'Api Key Raja Ongkir Disini',
        ]]);
        $body = $response->getBody();
        $json = json_decode($body, true);
        $kota = $json['rajaongkir']['results'];
        $data = [];
        foreach($kota as $ko){
           $data[] =[
           'kota' => $ko['city_name'],
           ];
        }

        $collect = collect($data);
        $plucked = $collect->pluck('kota', 'kota');
        return $plucked;
    }
}
