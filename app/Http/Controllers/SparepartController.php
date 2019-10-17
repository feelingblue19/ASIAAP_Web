<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Sparepart;
use PhpParser\Node\Expr\BinaryOp\Spaceship;
use PHPUnit\Framework\Constraint\Exception;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sparepart = Sparepart::with('tipe_kendaraan')->get();
        return response()->json($sparepart, 200);
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
            'penempatan_sparepart' => 'required',
            'tipe_sparepart' => 'required',
            'nama_sparepart' => 'required',
            'harga_jual_sparepart' => 'required|numeric',
            'harga_beli_sparepart' => 'required|numeric',
            'merk_sparepart' => 'required',
            'stok_sparepart' => 'required|numeric',
            'min_stok' => 'required|numeric',
            'gambar_sparepart' => 'required',
            'id_tipe.*' => 'required'
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }



        $sparepart = new Sparepart();

        $kode = Sparepart::orderBy('kode_sparepart', 'desc')->first();
        if(!$kode)
            $sparepart->kode_sparepart = 'SPR01';
		else
            $sparepart->kode_sparepart = ++$kode->kode_sparepart;

        $penempatan = $request->penempatan_sparepart;
        $no = Sparepart::where('penempatan_sparepart', 'like', $penempatan.'%')
                ->orderBy('penempatan_sparepart', 'desc')->pluck('penempatan_sparepart')->first();
        if(!$no)
            $no = '1';
        else {
            if(strlen($no) == 11)
                $no_subs = substr($no, 9);
            else
                $no_subs = substr($no, 8);
            $no = ++$no_subs;
        }

        if($no < 10 )
            $penempatan = $penempatan.'0'.$no;
        else
            $penempatan = $penempatan.$no;

        $id_tipe = json_decode($request->id_tipe);

        $sparepart->penempatan_sparepart = $penempatan;
        $sparepart->tipe_sparepart = $request->tipe_sparepart;
        $sparepart->nama_sparepart = $request->nama_sparepart; 
        $sparepart->harga_beli_sparepart = $request->harga_beli_sparepart;
        $sparepart->harga_jual_sparepart = $request->harga_jual_sparepart;
        $sparepart->merk_sparepart = $request->merk_sparepart; 
        $sparepart->stok_sparepart = $request->stok_sparepart;
        $sparepart->min_stok = $request->min_stok;

        if($request->hasFile('gambar_sparepart')){
            $dir = 'uploads/';
            $path = 'http://localhost/8900/public/uploads/'; 
            $extension = strtolower($request->file('gambar_sparepart')->getClientOriginalExtension());
            $fileName = str_random() . '.' . $extension;
            $file = $path . $fileName;
            $request->file('gambar_sparepart')->move($dir, $fileName);
            $sparepart->gambar_sparepart = $file;
        }

        $sparepart->save();
        $sparepart->tipe_kendaraan()->attach($id_tipe);

        return response()->json(['status' => 'success creating sparepart', 'kode_sparepart' => $sparepart->kode_sparepart, 'penempatan_sparepart' => $sparepart->penempatan_sparepart], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sparepart = Sparepart::where('kode_sparepart', $id)->with('tipe_kendaraan')->first();
        if(is_null($sparepart))
            return response()->json(['status' => 'sparepart not found'], 404);
        else {
            return response()->json($sparepart, 200);
        }
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
        $sparepart = Sparepart::find($id);
        if(is_null($sparepart))
            return response()->json(['status' => 'sparepart not found'], 404);
        else {
            $v = Validator::make($request->all(), [
                'penempatan_sparepart' => 'required',
                'tipe_sparepart' => 'required',
                'nama_sparepart' => 'required',
                'harga_jual_sparepart' => 'required|numeric',
                'harga_beli_sparepart' => 'required|numeric',
                'merk_sparepart' => 'required',
                'stok_sparepart' => 'required|numeric',
                'min_stok' => 'required|numeric',
                'id_tipe.*' => 'required'
            ]);
    
            if ($v->fails())
            {
                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }

            if(substr($sparepart->penempatan_sparepart, 0, -2) != $request->penempatan_sparepart) {
                $penempatan = $request->penempatan_sparepart;
                $no = Sparepart::where('penempatan_sparepart', 'like', $penempatan.'%')
                        ->orderBy('penempatan_sparepart', 'desc')->pluck('penempatan_sparepart')->first();
                if(!$no)
                    $no = '1';
                else {
                    if(strlen($no) == 11)
                        $no_subs = substr($no, 9);
                    else
                        $no_subs = substr($no, 8);
                    $no = ++$no_subs;
                }
        
                if($no < 10 )
                    $penempatan = $penempatan.'0'.$no;
                else
                    $penempatan = $penempatan.$no;

                $sparepart->penempatan_sparepart = $penempatan;
            }
    
            
    
            $id_tipe = json_decode($request->id_tipe);
    
            $sparepart->tipe_sparepart = $request->tipe_sparepart;
            $sparepart->nama_sparepart = $request->nama_sparepart; 
            $sparepart->harga_beli_sparepart = $request->harga_beli_sparepart;
            $sparepart->harga_jual_sparepart = $request->harga_jual_sparepart;
            $sparepart->merk_sparepart = $request->merk_sparepart; 
            $sparepart->stok_sparepart = $request->stok_sparepart;
            $sparepart->min_stok = $request->min_stok;
    
            if($request->hasFile('gambar_sparepart')){
                $dir = 'uploads/';
                $path = 'http://localhost/8900/public/uploads/';
                $extension = strtolower($request->file('gambar_sparepart')->getClientOriginalExtension());
                $fileName = str_random() . '.' . $extension;
                $file = $path . $fileName;
                $request->file('gambar_sparepart')->move($dir, $fileName);
                $sparepart->gambar_sparepart = $file;
            }
    
            $sparepart->save();
            $sparepart->tipe_kendaraan()->sync($id_tipe);
    
            return response()->json(['status' => 'success creating sparepart'], 200);
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
        $sparepart = Sparepart::find($id);
        if(is_null($sparepart))
            return response()->json(['status' => 'sparepart not found'], 404);
        else {
            $success = $sparepart->delete();
            if($success)
                return response()->json(['status' => 'success deleting sparepart'], 200);
            else
                return response()->json(['status' => 'error deleting sparepart'], 500);

        }
    }

    public function getTipe() {
        $sparepart = Sparepart::distinct()->get(['tipe_sparepart']);
        return response()->json($sparepart, 200);
    }
}
