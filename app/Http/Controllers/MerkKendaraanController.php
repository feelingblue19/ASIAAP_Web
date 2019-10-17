<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MerkKendaraan;
use Illuminate\Support\Facades\Validator;

class MerkKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = MerkKendaraan::all();
        return response()->json($merk, 200);
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
            'nama_merk' => 'required'
        ]);

        if($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
		
        $merk = new MerkKendaraan;
		
		$id = MerkKendaraan::orderBy('id_merk', 'desc')->first();
        if(!$id)
			$merk->id_merk = 'MERK01';
		else
            $merk->id_merk = ++$id->id_merk;
            
        $merk->nama_merk = $request->nama_merk;

        $success = $merk->save();
        if($success)
            return response()->json(['status' => 'success creating merk kendaraan', 'merk' => $merk], 200);
        else
            return response()->json(['status' => 'failed creating merk kendaraan'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merk = MerkKendaraan::find($id);
        if(is_null($merk))
            return response()->json(['status' => 'merk kendaraan not found'], 404);
        else
            return response()->json($merk, 200);
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
        $merk = MerkKendaraan::find($id);
        if(is_null($merk))
            return response()->json(['status' => 'merk kendaraan not found'], 404);
        else {
            $v = Validator::make($request->all(),[
                'nama_merk' => 'required'
            ]);

            if($v->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }

            $merk->nama_merk = $request->nama_merk;

            $success = $merk->save();
            if($success)
                return response()->json(['status' => 'success updating merk kendaraan'], 200);
            else
                return response()->json(['status' => 'error updating merk kendaraan'], 500);
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
        $merk = MerkKendaraan::find($id);
        if(is_null($merk))
            return response()->json(['status' => 'merk kendaraan not found'], 404);
        else{
            $success = $merk->delete();
            if($success)
                return response()->json(['status' => 'success deleting merk kendaraan'], 200);
            else
                return response()->json(['status' => 'error deleting merk kendaraan'], 500);
        }
    }
}
