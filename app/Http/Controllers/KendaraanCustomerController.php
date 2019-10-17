<?php

namespace App\Http\Controllers;

use App\KendaraanCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class KendaraanCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraanCustomer = KendaraanCustomer::all();
        return response()->json($kendaraanCustomer, 200);
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
        // $v = Validator::make($request->all(), [
        //     'id_tipe' => 'required',
        //     'no_polisi' => 'required',
        //     'id_pegawai' => 'required',
        // ]);

        // if ($v->fails())
        // {
        //     return response()->json([
        //         'status' => 'error',
        //         'errors' => $v->errors()
        //     ], 422);
        // }

        $datas = array();
        $id_kendaraan = array();
        $datas = json_decode($request->data);
        

        foreach($datas as $data) {
            if(property_exists($data, 'id_kendaraan') !== false)
            {
                $cek = KendaraanCustomer::find($data->id_kendaraan);
                if($cek)
                    $cek->delete();
            }

            $kendaraanCustomer = new KendaraanCustomer();


            $id = KendaraanCustomer::orderBy('id_kendaraan', 'desc')->first();
            if(!$id)
                $kendaraanCustomer->id_kendaraan = 'KEN01';
            else
                $kendaraanCustomer->id_kendaraan = ++$id->id_kendaraan;

            
            
            $kendaraanCustomer->id_tipe = $data->id_tipe;
            $kendaraanCustomer->no_polisi = $data->no_polisi;
            $kendaraanCustomer->id_pegawai = $data->id_pegawai;

            array_push($id_kendaraan, $kendaraanCustomer);
            $cek = KendaraanCustomer::where('no_polisi','=', $kendaraanCustomer->no_polisi)->first();
            $success = $kendaraanCustomer->save();
            if(!$success)
                return response()->json(['status' => 'failed creating kendaraan customer'], 500);
            if ($cek === null)
            {
                
                
            }
                
            
            
        }

        return response()->json(['status' => 'success creating kendaraan customer', 'kendaraan_customer' => $id_kendaraan], 200);
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KendaraanCustomer  $kendaraanCustomer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kendaraan_customer = KendaraanCustomer::where('id_kendaraan', $id)->with('pegawai')->first();
        if(is_null($kendaraan_customer))
            return response()->json(['status' => 'kendaraan customer not found'], 404);
        else
            return response()->json($kendaraan_customer, 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KendaraanCustomer  $kendaraanCustomer
     * @return \Illuminate\Http\Response
     */
    public function edit(KendaraanCustomer $kendaraanCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KendaraanCustomer  $kendaraanCustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KendaraanCustomer $kendaraanCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KendaraanCustomer  $kendaraanCustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(KendaraanCustomer $kendaraanCustomer)
    {
        //
    }

    public function cari_kendaraan($id) {
        $kendaraan = DB::select('SELECT DISTINCT id_kendaraan, id_tipe, no_polisi, id_pegawai from penjualans join detail_penjualan_jasas using (no_transaksi) join kendaraan_customers using (id_kendaraan) where no_transaksi = :id', ["id" => $id]);
        return response()->json($kendaraan, 200);
    }
}
