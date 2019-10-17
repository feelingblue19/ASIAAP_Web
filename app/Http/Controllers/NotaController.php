<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\DetailPenjualanJasa;
use App\DetailPenjualanSparepart;
use Illuminate\Support\Facades\DB;
use App\Pengadaan;

class NotaController extends Controller
{
    //ini buat dapet data-data penjualan, dicarinya pake nomor transaksi, berguna di SPK sama Nota Lunas
    public function getPenjualan($id) {
        $penjualan = Penjualan::where('no_transaksi', $id)->with('pegawai')->first();
        if(is_null($penjualan))
            return response()->json(['status' => 'penjualan not found'], 404);
        else
            return response()->json($penjualan, 200);
    }

    //ini buat dapet data-data detail penjualan jasa service dari SETIAP motor di suatu transaksi, berguna pas di SPK
    public function getDetailPenjualanJasa($id, $kendaraan) {
        $detailPenjualanJasa = DetailPenjualanJasa::where('no_transaksi', $id)
        ->where('id_kendaraan', $kendaraan)->with('jasa_service')->get();
        if(!$detailPenjualanJasa)
            return response()->json(['status' => 'detail penjualan jasa not found'], 404);
        else
            return response()->json($detailPenjualanJasa, 200);
    }

    public function getDetailPenjualanSprSatu($id, $kendaraan) {
        $detailPenjualanSparepart = DetailPenjualanSparepart::where('no_transaksi', $id)
        ->where('id_kendaraan', $kendaraan)->with('sparepart')->get();
        if(!$detailPenjualanSparepart)
            return response()->json(['status' => 'detail penjualan sparepart not found'], 404);
        else
            return response()->json($detailPenjualanSparepart, 200);
    }

    //ini buat dapet data-data detail penjualan jasa service dari SEMUA motor di suatu transaksi, berguna pas di Nota Lunas
    public function getPenjualanJasaperTrans($id) {
        $data = DB::select(
            'SELECT
            id_jasa_service "id",
            nama_jasa_service "nama",
            harga_jasa_service "harga",
            sum(jumlah_penjualan_jasa) "jumlah",
            sum(subtotal_jasa) "subtotal"
            FROM
                penjualans
            JOIN detail_penjualan_jasas USING(no_transaksi)
            JOIN jasa_services USING(id_jasa_service)
            WHERE
                no_transaksi = :id
            GROUP by id_jasa_service', ['id' => $id]
        );

        return response()->json($data, 200);
    }

    //ini buat dapet data-data detail penjualan sparepart di suatu transaksi, berguna pas di Nota Lunas
    public function getDetailPenjualanSparepart($id) {
        $detailPenjualanSparepart = DetailPenjualanSparepart::where('no_transaksi', $id)->with('sparepart')->get();
        if(is_null($detailPenjualanSparepart))
            return response()->json(['status' => 'detail penjualan sparepart'], 404);
        else
            return response()->json($detailPenjualanSparepart, 200);
    }

    //ini buat dapet semua kendaraan yang ada di suatu transaksi penjualan, berguna buat di Nota Lunas
    public function getKendaraan($id) {
        $kendaraan = DB::select(
            'SELECT DISTINCT
            nama_merk,
            nama_tipe,
            no_polisi
            FROM
                penjualans
            JOIN detail_penjualan_jasas USING(no_transaksi)
            JOIN kendaraan_customers USING(id_kendaraan)
            JOIN tipe_kendaraans USING(id_tipe)
            JOIN merk_kendaraans USING(id_merk)
            WHERE
                no_transaksi = :id', ["id" => $id]);
        return response()->json($kendaraan, 200);
    }

    //ini buat dapet satu kendaraan di suatu transaksi, berguna pas di SPK
    public function getSatukendaraan($id) {
        $kendaraan = DB::select(
            'SELECT
                nama_merk,
                nama_tipe,
                no_polisi, 
                nama_pegawai
            FROM
                kendaraan_customers
            JOIN tipe_kendaraans USING(id_tipe)
            JOIN merk_kendaraans USING(id_merk)
            join pegawais using (id_pegawai)
            WHERE
                id_kendaraan = :id', ['id' => $id]
        );

        return response()->json($kendaraan, 200);
    }

    

    
}
