<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::with('cabangs')->get();
        return response()->json($pegawai, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

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
            'id_cabang' => 'required',
            'nama_pegawai' => 'required',
            'alamat_pegawai' => 'required',
            'no_telp_pegawai' => 'required',
            'gaji_per_minggu' => 'required',
            'jabatan_pegawai' => 'required',
            'username' => 'unique:pegawais|max:10|nullable',
            'password' => 'max:10|nullable'
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $pegawai = new Pegawai;

        $id = Pegawai::orderBy('id_pegawai', 'desc')->first();
        if(!$id)
            $pegawai->id_pegawai = 'PEG01';
		else
            $pegawai->id_pegawai = ++$id->id_pegawai;
            
        $pegawai->id_cabang = $request->id_cabang;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->alamat_pegawai = $request->alamat_pegawai;
        $pegawai->no_telp_pegawai = $request->no_telp_pegawai;
        $pegawai->gaji_per_minggu = $request->gaji_per_minggu;
        $pegawai->jabatan_pegawai = $request->jabatan_pegawai;
        $pegawai->username = $request->username;
        $pegawai->password = bcrypt($request->password);

        $success = $pegawai->save();
        if($success)
            return response()->json(['status' => 'success creating pegawai', 'pegawai' => $pegawai], 200);
        else
            return response()->json(['status' => 'failed creating pegawai'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        if(is_null($pegawai))
            return response()->json(['status' => 'pegawai not found'], 404);
        else
            return response()->json($pegawai, 200);
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
        $pegawai = Pegawai::find($id);
        if(is_null($pegawai))
            return response()->json(['status' => 'pegawai not found'], 404);
        else {
            $v = Validator::make($request->all(), [
                'id_cabang' => 'required',
                'nama_pegawai' => 'required',
                'alamat_pegawai' => 'required',
                'no_telp_pegawai' => 'required',
                'gaji_per_minggu' => 'required',
                'jabatan_pegawai' => 'required',
                'username' => [Rule::unique('pegawais','username')->ignore($pegawai->username, 'username'), 'nullable'],
                'password' => 'nullable'
            ]);

            if ($v->fails())
            {
                return response()->json([
                    'status' => 'error',
                    'errors' => $v->errors()
                ], 422);
            }

            $pegawai->id_cabang = $request->id_cabang;
            $pegawai->nama_pegawai = $request->nama_pegawai;
            $pegawai->alamat_pegawai = $request->alamat_pegawai;
            $pegawai->no_telp_pegawai = $request->no_telp_pegawai;
            $pegawai->gaji_per_minggu = $request->gaji_per_minggu;
            $pegawai->jabatan_pegawai = $request->jabatan_pegawai;
            $pegawai->username = $request->username;
            $pegawai->password = bcrypt($request->password);

            $success = $pegawai->save();
            if($success)
                return response()->json(['status' => 'success updating pegawai'], 200);
            else
                return response()->json(['status' => 'failed updating pegawai'], 500);
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
        $pegawai = Pegawai::find($id);
        if(is_null($pegawai))
            return response()->json(['status' => 'pegawai not found'], 404);
        else {
            $success = $pegawai->delete();
            if($success)
                return response()->json(['status' => 'success deleting pegawai'], 200);
            else
                return response()->json(['status'=>'failed deleting pegawai'], 500);
        }
    }

    public function showMontir() {
        $pegawai = Pegawai::where('jabatan_pegawai', '=', 'Montir')->get();
        return response()->json($pegawai, 200);
    }


}
