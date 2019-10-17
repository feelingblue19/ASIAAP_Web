<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipeKendaraan;
use Illuminate\Support\Facades\Validator;

class TipeKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipe = TipeKendaraan::with('merk_kendaraan', 'sparepart')->get();
        return response()->json($tipe, 200);
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
        $v = Validator::make($request->all(),[
            'id_merk' => 'required',
            'nama_tipe' => 'required'
        ]);

        if($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $tipe = new TipeKendaraan;

        $id = TipeKendaraan::orderBy('id_tipe', 'desc')->first();
        if(!$id)
			$tipe->id_tipe = 'TIPE01';
		else
            $tipe->id_tipe = ++$id->id_tipe;

        $tipe->id_merk = $request->id_merk;
        $tipe->nama_tipe = $request->nama_tipe;

        $success = $tipe->save();
        if($success)
            return response()->json(['status' => 'success creating tipe kendaraan', 'tipe' => $tipe], 200);
        else
            return response()->json(['status' => 'error creating tipe kendaraan'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipe = TipeKendaraan::find($id);
        if(is_null($tipe))
            return response()->json(['status' => 'tipe kendaraan not found'], 404);
        else
            return response()->json($tipe, 200);
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
        $tipe = TipeKendaraan::find($id);
        if(is_null($tipe))
            return response()->json(['status' => 'tipe kendaraan not found'], 404);
        else {
            $v = Validator::make($request->all(),[
                'id_merk' => 'required',
                'nama_tipe' => 'required'
            ]);

            if($v->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }

            $tipe->id_merk = $request->id_merk;
            $tipe->nama_tipe = $request->nama_tipe;

            $success = $tipe->save();
            if($success)
                return response()->json(['status' => 'success updating tipe kendaraan'], 200);
            else
                return response()->json(['status' => 'error updating tipe kendaraan'], 500);
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
        $tipe = TipeKendaraan::find($id);
        if(is_null($tipe))
            return response()->json(['status' => 'tipe kendaraan not found'], 404);
        else{
            $success = $tipe->delete();
            if($success)
                return response()->json(['status' => 'success deleting tipe kendaraan'], 200);
            else
                return response()->json(['status' => 'error deleting tipe kendaraan'], 500);
        }
    }
}
