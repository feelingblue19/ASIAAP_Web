<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\JasaService;

class JasaServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasa_service = JasaService::all();
        return response()->json($jasa_service, 200);
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
            'nama_jasa_service' => 'required',
            'harga_jasa_service' => 'required|numeric'
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $jasa_service = new JasaService();

        $id = JasaService::orderBy('id_jasa_service', 'desc')->first();
        if(!$id)
            $jasa_service->id_jasa_service = 'SRV01';
		else
            $jasa_service->id_jasa_service = ++$id->id_jasa_service;

        $jasa_service->nama_jasa_service = $request->nama_jasa_service;
        $jasa_service->harga_jasa_service = $request->harga_jasa_service;

        $success = $jasa_service->save();
        if($success)
            return response()->json(['status' => 'success creating jasa service', 'jasa_service' => $jasa_service], 200);
        else
            return response()->json(['status' => 'failed creating jasa service'], 500);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jasa_service = JasaService::find($id);
        if(is_null($jasa_service))
            return response()->json(['status' => 'jasa service not found'], 404);
        else
            return response()->json($jasa_service, 200);
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
        $jasa_service = JasaService::find($id);
        if(is_null($jasa_service))
            return response()->json(['status' => 'jasa service not found'], 404);
        else {
            $v = Validator::make($request->all(), [
                'nama_jasa_service' => 'required',
                'harga_jasa_service' => 'required'
            ]);
    
            if ($v->fails())
            {
                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }
    
            $jasa_service->nama_jasa_service = $request->nama_jasa_service;
            $jasa_service->harga_jasa_service = $request->harga_jasa_service;
    
            $success = $jasa_service->save();
            if($success)
                return response()->json(['status' => 'success updating jasa service'], 200);
            else
                return response()->json(['status' => 'failed updating jasa service'], 500);
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
        $jasa_service = JasaService::find($id);
        if(is_null($jasa_service))
            return response()->json(['status' => 'jasa service not found'], 404);
        else {
            $success = $jasa_service->delete();
            if($success)
                return response()->json(['status' => 'success deleting jasa service'], 200);
            else
                return response()->json(['status'=>'failed deleting jasa_service'], 500);
        }
    }
}
