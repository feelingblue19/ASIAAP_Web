<?php

namespace App\Http\Controllers;

use App\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = DB::select('select * from penjualans order by substring(no_transaksi, 11) + 0');
        return response()->json($penjualan, 200);
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
            'nama_customer' => 'required',
            'no_telp_customer' => 'required',
            'jenis_transaksi' => 'required',
            'status_transaksi' => 'required',
            'keterangan_transaksi' => 'required',
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $penjualan = new Penjualan();
        $id = array();
        $id = DB::select('select no_transaksi from penjualans order by substring(no_transaksi, 11) + 0 desc limit 1');
        if(!$id)
            $no = 1;
        else {
            $no_str = substr($id[0]->no_transaksi, 10);
            $no = ++$no_str;
        }
            
        // $tanggal = Carbon::parse($request->tanggal_transaksi)->format('dmy');
        $tanggal = Carbon::now()->format('dmy');

        $penjualan->no_transaksi = $request->jenis_transaksi.'-'.$tanggal.'-'.$no;

        $penjualan->tanggal_transaksi = Carbon::now()->setTimezone('Asia/Jakarta');
        $penjualan->nama_customer = $request->nama_customer;
        $penjualan->no_telp_customer = $request->no_telp_customer;
        $penjualan->status_transaksi = $request->status_transaksi;
        $penjualan->keterangan_transaksi = $request->keterangan_transaksi;

        $success = $penjualan->save();
        $penjualan->pegawai()->attach(Auth::user()->id_pegawai);
        
        if($success)
            return response()->json(['status' => 'success creating penjualan', 'penjualan' => $penjualan], 200);
        else
            return response()->json(['status' => 'failed creating penjualan'], 500);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penjualan = Penjualan::where('no_transaksi', $id)->with('pegawai')->first();
        if(is_null($penjualan))
            return response()->json(['status' => 'penjualan not found'], 404);
        else
            return response()->json($penjualan, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);
        if(is_null($penjualan))
            return response()->json(['status' => 'penjualan not found'], 404);
        else {
            $v = Validator::make($request->all(), [
                'nama_customer' => 'required',
                'no_telp_customer' => 'required',
                'status_transaksi' => 'required',
                'keterangan_transaksi' => 'required',
            ]);
    
            if ($v->fails())
            {
                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }
    
            $penjualan->nama_customer = $request->nama_customer;
            $penjualan->no_telp_customer = $request->no_telp_customer;
            $penjualan->status_transaksi = $request->status_transaksi;
            $penjualan->keterangan_transaksi = $request->keterangan_transaksi;
    
            $success = $penjualan->save();
            $penjualan->pegawai()->sync(Auth::user()->id_pegawai);
            
            if($success)
                return response()->json(['status' => 'success updating penjualan', 'penjualan' => $penjualan], 200);
            else
                return response()->json(['status' => 'failed updating penjualan'], 500);
        }
        
    }

    public function selesai(Request $request, $id) {
        $penjualan = Penjualan::find($id);
        if(is_null($penjualan))
            return response()->json(['status' => 'penjualan not found'], 404);
        else {
            $penjualan->status_transaksi = 'Selesai';
            $penjualan->save();
            return response()->json(['status' => 'success updating penjualan'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);
        if(is_null($penjualan))
            return response()->json(['status' => 'penjualan not found'], 404);
        else {
            $penjualan->delete();
            return response()->json(['status' => 'success deleting penjualan'], 200);
        }
    }

    public function bayar(Request $request, $id){
        $penjualan = Penjualan::find($id);
        if(is_null($penjualan))
            return response()->json(['status' => 'penjualan not found'], 404);
        else {
            $penjualan->diskon_transaksi = $request->diskon;
            $penjualan->total_transaksi = $request->total_transaksi;
            $penjualan->keterangan_transaksi = 'Lunas';
            
            $success = $penjualan->save();
            $penjualan->pegawai()->attach(Auth::user()->id_pegawai);
            if($success)
                return response()->json(['status'=> 'pembayaran success'], 200);
        }
        
    }

    function tampilRiwayat() {
        $penjualan = DB::select('select no_transaksi, no_telp_customer, no_polisi, status_transaksi from penjualans join detail_penjualan_jasas 
                    using(no_transaksi) join kendaraan_customers using(id_kendaraan)');
        return response()->json($penjualan, 200);
    }

    function getMontir($id) {
        $montir = DB::select('SELECT DISTINCT nama_pegawai 
                        FROM penjualans join detail_penjualan_jasas USING (no_transaksi) 
                        join kendaraan_customers using (id_kendaraan) 
                        join pegawais using (id_pegawai) 
                        WHERE no_transaksi = :id', ['id' => $id]);

        return response()->json($montir, 200);
    }
}
