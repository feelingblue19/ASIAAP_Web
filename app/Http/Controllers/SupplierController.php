<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return response()->json($supplier, 200);
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
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
            'no_telp_supplier' => 'required',
            'nama_sales' => 'required',
            'no_telp_sales' => 'required',
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $supplier = new Supplier;

        $id = Supplier::orderBy('id_supplier', 'desc')->first();
        if(!$id)
            $supplier->id_supplier = 'SUP01';
		else
            $supplier->id_supplier = ++$id->id_supplier;

        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->no_telp_supplier = $request->no_telp_supplier;
        $supplier->nama_sales = $request->nama_sales;
        $supplier->no_telp_sales = $request->no_telp_sales;

        $success = $supplier->save();
        if($success)
            return response()->json(['status' => 'success creating supplier', 'supplier' => $supplier], 200);
        else
            return response()->json(['status' => 'failed creating supplier'], 500);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        if(is_null($supplier))
            return response()->json(['status' => 'supplier not found'], 404);
        else
            return response()->json($supplier);
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
        $supplier = Supplier::find($id);
        if(is_null($supplier))
            return response()->json(['status' => 'supplier not found'], 404);
        else {
            $v = Validator::make($request->all(), [
                'nama_supplier' => 'required',
                'alamat_supplier' => 'required',
                'no_telp_supplier' => 'required',
                'nama_sales' => 'required',
                'no_telp_sales' => 'required',
            ]);
    
            if ($v->fails())
            {
                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }
            
            $supplier->nama_supplier = $request->nama_supplier;
            $supplier->alamat_supplier = $request->alamat_supplier;
            $supplier->no_telp_supplier = $request->no_telp_supplier;
            $supplier->nama_sales = $request->nama_sales;
            $supplier->no_telp_sales = $request->no_telp_sales;
    
            $success = $supplier->save();
            if($success)
                return response()->json(['status' => 'success updating supplier'], 200);
            else
                return response()->json(['status' => 'failed updating supplier'], 500);
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
        $supplier = Supplier::find($id);
        if(is_null($supplier))
            return response()->json(['status' => 'supplier not found'], 404);
        else {
            $success = $supplier->delete();
            if($success)
                return response()->json(['status' => 'success deleting supplier'], 200);
            else
                return response()->json(['status'=>'failed deleting supplier'], 500);
        }
            
    }
}
