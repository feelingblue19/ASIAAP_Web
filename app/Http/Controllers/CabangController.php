<?php

namespace App\Http\Controllers;

use App\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = cabang::all();
        return response()->json($cabang, 200);
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
            'nama_cabang' => 'required',
            'alamat_cabang' => 'required',
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $cabang = new Cabang;

        $id = Cabang::orderBy('id_cabang', 'desc')->first();
        if(!$id)
			$cabang->id_cabang = 'CAB01';
		else
            $cabang->id_cabang = ++$id->id_cabang;

        $cabang->nama_cabang = $request->nama_cabang;
        $cabang->alamat_cabang = $request->alamat_cabang;

        $success = $cabang->save();
        if($success)
            return response()->json(['status' => 'success creating cabang', 'cabang' => $cabang], 200);
        else
            return response()->json(['status' => 'failed creating cabang'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cabang = Cabang::find($id);
        if(is_null($cabang))
            return response()->json(['status' => 'cabang not found'], 404);
        else
            return response()->json($cabang);
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
        $cabang = Cabang::find($id);
        if(is_null($cabang))
            return response()->json(['status' => 'cabang not found'], 404);
        else {
            $v = Validator::make($request->all(), [
                'nama_cabang' => 'required',
                'alamat_cabang' => 'required',
            ]);

            if ($v->fails())
            {
                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
                // return response()->json($request, 200);
            }

            

            $cabang->nama_cabang = $request->nama_cabang;
            $cabang->alamat_cabang = $request->alamat_cabang;

            $success = $cabang->save();
            if($success)
                return response()->json(['status' => 'success editing cabang'], 200);
            else
                return response()->json(['status' => 'failed creating cabang'], 500);
                // return response()->json($request->nama_cabang, 200);
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
        $cabang = Cabang::find($id);
        if(is_null($cabang))
            return response()->json(['status' => 'cabang not found'], 404);
        else {
            $success = $cabang->delete();
            if($success)
                return response()->json(['status' => 'success deleting cabang'], 200);
            else
                return response()->json(['status' => 'failed deleting cabang'], 500);
        }
    }
}
