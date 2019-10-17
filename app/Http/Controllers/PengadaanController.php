<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pengadaan;
use Carbon\Carbon;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengadaan = Pengadaan::with('supplier')->get();
        return response()->json($pengadaan, 200);
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
            'id_supplier' => 'required',
            'total_pengadaan' => 'required|numeric',
            'status' => 'required'
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $pengadaan = new Pengadaan();

        $id = Pengadaan::orderBy('id_pengadaan', 'desc')->first();
        if(!$id)
            $pengadaan->id_pengadaan = 'PENG01';
		else
            $pengadaan->id_pengadaan = ++$id->id_pengadaan;
        
        $pengadaan->id_supplier = $request->id_supplier;
        $pengadaan->tanggal_pengadaan = Carbon::now()->toDateString();
        $pengadaan->total_pengadaan = $request->total_pengadaan;
        $pengadaan->status = $request->status;

        $success = $pengadaan->save();
        if($success)
            return response()->json(['status' => 'success creating pengadaan', 'pengadaan' => $pengadaan], 200);
        else
            return response()->json(['status' => 'failed creating pengadaan'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengadaan = Pengadaan::where('id_pengadaan', $id)->with('supplier')->first();
        if(is_null($pengadaan))
            return response()->json(['status' => 'pengadaan not found'], 404);
        else 
            return response()->json($pengadaan, 200);
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
        $pengadaan = Pengadaan::find($id);
        if(is_null($pengadaan))
            return response()->json(['status' => 'pengadaan not found'], 404);
        else {
            $v = Validator::make($request->all(), [
                'id_supplier' => 'required',
                'total_pengadaan' => 'required',
                'status' => 'required'
            ]);
    
            if ($v->fails())
            {
                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }
    
            $pengadaan->id_supplier = $request->id_supplier;
            $pengadaan->tanggal_pengadaan = Carbon::now()->toDateString();
            $pengadaan->total_pengadaan = $request->total_pengadaan;
            $pengadaan->status = $request->status;
    
            $success = $pengadaan->save();
            if($success)
                return response()->json(['status' => 'success updating pengadaan'], 200);
            else
                return response()->json(['status' => 'failed updating pengadaan'], 500);
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
        $pengadaan = Pengadaan::find($id);
        if(is_null($pengadaan))
            return response()->json(['status' => 'pengadaan not found'], 404);
        else {
            $success = $pengadaan->delete();
            if($success)
                return response()->json(['status' => 'success deleting pengadaan'], 200);
            else
                return response()->json(['status' => 'failed deleting pengadaan'], 500);
        }
    }

    public function selesai($id) {
        $pengadaan = Pengadaan::find($id);
        if(is_null($pengadaan))
            return response()->json(['status' => 'pengadaan not found'], 404);
        else {
            $pengadaan->status = 'Dicetak';
            $success = $pengadaan->save();
            if($success)
                return response()->json(['status' => 'success updating pengadaan'], 200);
            else
                return response()->json(['status' => 'failed updating pengadaan'], 500);
        }
    }
}
