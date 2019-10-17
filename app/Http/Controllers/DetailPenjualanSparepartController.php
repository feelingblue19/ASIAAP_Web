<?php

namespace App\Http\Controllers;

use App\DetailPenjualanSparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Sparepart;
use App\Penjualan;

class DetailPenjualanSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailPenjualanSparepart = DetailPenjualanSparepart::all();
        return response()->json($detailPenjualanSparepart, 200);
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
            'data.*.kode_sparepart' => 'required',
            'data.*.jumlah_penjualan_sparepart' => 'numeric',
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
        
        // $cek = substr($datas[0]->no_transaksi, 0, 2);

        // if($cek != 'SS') {
        //     $penjualan = Penjualan::find($datas[0]->no_transaksi);
        //     $penjualan->subtotal_penjualan = 0;
        // }


        DetailPenjualanSparepart::where('no_transaksi', $datas[0]->no_transaksi)->delete();
        $subtotal = 0;
        foreach($datas as $data) {
            $detailPenjualanSparepart = new DetailPenjualanSparepart();

            $id = DetailPenjualanSparepart::orderBy('id_penjualan_sparepart', 'desc')->first();
            if(!$id)
                $detailPenjualanSparepart->id_penjualan_sparepart = 'PENSPR01';
            else 
                $detailPenjualanSparepart->id_penjualan_sparepart = ++$id->id_penjualan_sparepart;

            $detailPenjualanSparepart->no_transaksi = $data->no_transaksi; 
            $detailPenjualanSparepart->kode_sparepart = $data->kode_sparepart; 
            $detailPenjualanSparepart->jumlah_penjualan_sparepart = $data->jumlah_penjualan_sparepart; 

            if(isset($data->id_kendaraan))
                $detailPenjualanSparepart->id_kendaraan = $data->id_kendaraan;

            $sparepart = Sparepart::find($data->kode_sparepart);

            $detailPenjualanSparepart->subtotal_sparepart = $data->jumlah_penjualan_sparepart * $sparepart->harga_jual_sparepart;

            $subtotal = $subtotal + $detailPenjualanSparepart->subtotal_sparepart;
            $success = $detailPenjualanSparepart->save();
            if(!$success)
                return response()->json(['status' => 'failed creating detail penjualan sparepart'], 500);
        }
        $penjualan = Penjualan::where('no_transaksi', $datas[0]->no_transaksi)->first();
        // $sub = $penjualan->subtotal_transaksi;
        $penjualan->subtotal_transaksi = 0 + $subtotal;
        $penjualan->save();

        return response()->json(['status' => 'success creating detail penjualan sparepart', 'detail_penjualan_sparepart' => $detailPenjualanSparepart], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailPenjualanSparepart  $detailPenjualanSparepart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailPenjualanSparepart = DetailPenjualanSparepart::where('no_transaksi', $id)->with('kendaraan')->get();
        if(is_null($detailPenjualanSparepart))
            return response()->json(['status' => 'detail penjualan sparepart'], 404);
        else
            return response()->json($detailPenjualanSparepart, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailPenjualanSparepart  $detailPenjualanSparepart
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPenjualanSparepart $detailPenjualanSparepart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPenjualanSparepart  $detailPenjualanSparepart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailPenjualanSparepart $detailPenjualanSparepart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailPenjualanSparepart  $detailPenjualanSparepart
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPenjualanSparepart $detailPenjualanSparepart)
    {
        //
    }
}
