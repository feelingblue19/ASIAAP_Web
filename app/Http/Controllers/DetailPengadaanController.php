<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPengadaan;
use App\Pengadaan;
use Illuminate\Support\Facades\Validator;

class DetailPengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_pengadaan = DetailPengadaan::all();
        return response()->json($detail_pengadaan, 200);
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
            'data.*.id_pengadaan' => 'required' , 
            'data.*.kode_sparepart' => 'required',
            'data.*.jumlah' => 'required|numeric',
            'data.*.harga_beli' => 'required|numeric',
            'data.*.satuan' => 'required',
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

        DetailPengadaan::where('id_pengadaan', $datas[0]->id_pengadaan)->delete();
        
        foreach($datas as $data) {
            $detail_pengadaan = new DetailPengadaan();

            $id = DetailPengadaan::orderBy('id_detail_pengadaan', 'desc')->first();
            if(!$id)
                $detail_pengadaan->id_detail_pengadaan = 'DETPENG01';
            else 
                $detail_pengadaan->id_detail_pengadaan = ++$id->id_detail_pengadaan;

            $detail_pengadaan->id_pengadaan = $data->id_pengadaan; 
            $detail_pengadaan->kode_sparepart = $data->kode_sparepart; 
            $detail_pengadaan->jumlah = $data->jumlah; 
            $detail_pengadaan->harga_beli = $data->harga_beli;
            $detail_pengadaan->subtotal_pengadaan = $data->jumlah * $data->harga_beli;
            $detail_pengadaan->satuan = $data->satuan;

            $success = $detail_pengadaan->save();
            if(!$success)
                return response()->json(['status' => 'failed creating detail pengadaan'], 500);
        }

        return response()->json(['status' => 'success creating detail pengadaan', 'detail_pengadaan' => $detail_pengadaan], 200);
        //     //  return response()->json($request, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_pengadaan = DetailPengadaan::where('id_pengadaan', $id)->with('sparepart')->get();
        if(!$detail_pengadaan)
            return response()->json(['status' => 'detail pengadaan not found'], 404);
        else
            return response()->json($detail_pengadaan, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $detail_pengadaan = DetailPengadaan::find($id);
        if(!$detail_pengadaan)
            return response()->json(['status' => 'detail pengadaan not found'], 404);
        else {
            $v = Validator::make($request->all(), [
                'kode_sparepart' => 'required',
                'jumlah' => 'required|numeric',
                'harga_beli' => 'required|numeric',
                'satuan' => 'required',
            ]);
    
            if ($v->fails())
            {
                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }

                $detail_pengadaan->kode_sparepart = $request->kode_sparepart; 
                $detail_pengadaan->jumlah = $request->jumlah; 
                $detail_pengadaan->harga_beli = $request->harga_beli;
                $detail_pengadaan->subtotal_pengadaan = $request->jumlah * $request->harga_beli;
                $detail_pengadaan->satuan = $request->satuan;
    
                $success = $detail_pengadaan->save();
                if(!$success)
                    return response()->json(['status' => 'failed editing detail pengadaan'], 500);
                else
                    return response()->json(['status' => 'success creating editing pengadaan'], 200);          
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail_pengadaan = DetailPengadaan::find($id);
        if(is_null($detail_pengadaan))
            return response()->json(['status' => 'detail pengadaan not found'], 404);
        else {
            $success = $detail_pengadaan->delete();
            if($success)
                return response()->json(['status' => 'success deleting detail pengadaan'], 200);
            else 
                return response()->json(['status' => 'failed deleting detail pengadaan'], 500);
        }
    }
}
