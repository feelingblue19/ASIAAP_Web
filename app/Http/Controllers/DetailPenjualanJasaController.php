<?php

namespace App\Http\Controllers;

use App\DetailPenjualanJasa;
use Illuminate\Http\Request;
use App\JasaService;
use Illuminate\Support\Facades\Validator;
use App\Penjualan;

class DetailPenjualanJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailPenjualanJasa = DetailPenjualanJasa::with('kendaraan')->get();
        return response()->json($detailPenjualanJasa, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [ 
            'data.*.no_transaksi' => 'required',
            'data.*.id_jasa_service' => 'required',
            'data.*.id_kendaraan' => 'required',
            'data.*.jumlah_penjualan_jasa' => 'required|numeric',
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        

        $datas = array(); 
        $datas = json_decode($request->data); 

        
        $cek = substr($datas[0]->no_transaksi, 0, 2);

        $test = DetailPenjualanJasa::where('no_transaksi', $datas[0]->no_transaksi)->delete();
        $subtotal = 0;
        foreach($datas as $data) {
            $detailPenjualanJasa = new DetailPenjualanJasa();

            $id = DetailPenjualanJasa::orderBy('id_penjualan_jasa', 'desc')->first();
            if(!$id)
                $detailPenjualanJasa->id_penjualan_jasa = 'PENJS01';
            else 
                $detailPenjualanJasa->id_penjualan_jasa = ++$id->id_penjualan_jasa;

            $detailPenjualanJasa->no_transaksi = $data->no_transaksi; 
            $detailPenjualanJasa->id_jasa_service = $data->id_jasa_service; 
            $detailPenjualanJasa->jumlah_penjualan_jasa = $data->jumlah_penjualan_jasa; 
            $detailPenjualanJasa->id_kendaraan = $data->id_kendaraan;

            $service = JasaService::find($data->id_jasa_service);

            $detailPenjualanJasa->subtotal_jasa = $data->jumlah_penjualan_jasa * $service->harga_jasa_service;

            $success = $detailPenjualanJasa->save();
            $subtotal += $detailPenjualanJasa->subtotal_jasa;
            if(!$success)
                return response()->json(['status' => 'failed creating detail penjualan jasa'], 500);
        }
        
        $penjualan = Penjualan::find($datas[0]->no_transaksi);
        if($cek == 'SV')
            $sub = 0;
        else
            $sub = $penjualan->subtotal_transaksi;

        

        $penjualan->subtotal_transaksi = $sub + $subtotal;
        $penjualan->save();
        // dd($penjualan->subtotal_transaksi);

        return response()->json(['status' => 'success creating detail penjualan jasa', 'detail_penjualan_jasa' => $detailPenjualanJasa], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailPenjualanJasa  $detailPenjualanJasa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailPenjualanJasa = DetailPenjualanJasa::where('no_transaksi', $id)->with('kendaraan')->get();
        if(!$detailPenjualanJasa)
            return response()->json(['status' => 'detail penjualan jasa not found'], 404);
        else
            return response()->json($detailPenjualanJasa, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailPenjualanJasa  $detailPenjualanJasa
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPenjualanJasa $detailPenjualanJasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPenjualanJasa  $detailPenjualanJasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailPenjualanJasa  $detailPenjualanJasa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
