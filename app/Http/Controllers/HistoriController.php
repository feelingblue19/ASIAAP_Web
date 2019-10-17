<?php

namespace App\Http\Controllers;

use App\Histori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Sparepart;

class HistoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histori = Histori::all();
        return response()->json($histori, 200);
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
            'data.*.jumlah_histori' => 'numeric|required',
            'data.*.kode_sparepart' => 'required',
            'data.*.keterangan_histori' => 'required',
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
        
        foreach($datas as $data) 
        { 
            $histori = new Histori();
            $id = Histori::orderBy('id_histori', 'desc')->first();
            if(!$id)
                $histori->id_histori = 'HIS01';
            else
                $histori->id_histori = ++$id->id_histori;

            $histori->jumlah_histori = $data->jumlah_histori;
            $histori->kode_sparepart = $data->kode_sparepart;
            $histori->keterangan_histori = $data->keterangan_histori;
            $histori->tanggal_histori = Carbon::now()->setTimezone('Asia/Jakarta');

            $sparepart = Sparepart::find($data->kode_sparepart);
            if($histori->keterangan_histori == 'Masuk') {
                $sparepart->stok_sparepart = $sparepart->stok_sparepart + $histori->jumlah_histori;
                $sparepart->save(); 
            }
            else {
                $sparepart->stok_sparepart = $sparepart->stok_sparepart - $histori->jumlah_histori;
                $sparepart->save();
            }

            $histori->sisa_stok = $sparepart->stok_sparepart;

            $success = $histori->save();
            if(!$success)
                return response()->json(['status' => 'failed creating history'], 500);
        }

            return response()->json(['status' => 'success creating history'], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function show(Histori $histori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function edit(Histori $histori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Histori $histori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Histori  $histori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Histori $histori)
    {
        //
    }
}
