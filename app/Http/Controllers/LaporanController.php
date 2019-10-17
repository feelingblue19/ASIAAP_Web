<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function pengeluaranBulanan($tahun) {
        $data = DB::select(
            'SELECT
                MONTH(tanggal_pengadaan) "bulan",
                SUM(total_pengadaan) "pengeluaran"
            FROM
                pengadaans
            WHERE
            status = "Dicetak" AND YEAR(tanggal_pengadaan) = :tahun
            GROUP BY
                MONTH(tanggal_pengadaan)', ['tahun' => $tahun]);

        return response()->json($data, 200);
    }

    public function penjualanJasa($bulan, $tahun) {
        $data = DB::select(
            'SELECT
                nama_merk,
                nama_tipe,
                nama_jasa_service,
                SUM(jumlah_penjualan_jasa) "total"
            FROM
                detail_penjualan_jasas
            JOIN kendaraan_customers USING(id_kendaraan)
            JOIN jasa_services USING(id_jasa_service)
            JOIN tipe_kendaraans USING(id_tipe)
            join merk_kendaraans USING(id_merk)
            join penjualans USING(no_transaksi)
            where month(tanggal_transaksi)= :bulan and year(tanggal_transaksi) = :tahun
            and keterangan_transaksi = "Lunas"
            GROUP BY
                nama_merk,
                nama_tipe,
                nama_jasa_service', ['bulan' => $bulan, 'tahun' => $tahun]);

        return response()->json($data, 200);
    }

    public function pendapatanBulanan($tahun) {
        $data = DB::select(
            'SELECT
            bulan,
            tahun,
            SUM(service) "service",
            SUM(sparepart) "sparepart",
            SUM(service) + SUM(sparepart) "total"
            FROM
                (
                SELECT
                    MONTH(tanggal_transaksi) "bulan",
                    YEAR(tanggal_transaksi) "tahun",
                    subtotal_jasa "service",
                    0 "sparepart"
                FROM
                    penjualans
                JOIN detail_penjualan_jasas USING(no_transaksi)
                WHERE
                    keterangan_transaksi = "Lunas"
                UNION ALL
                SELECT
                    MONTH(tanggal_transaksi) "bulan",
                    YEAR(tanggal_transaksi) "tahun",
                    0 "service",
                    subtotal_sparepart "sparepart"
                FROM
                    penjualans
                JOIN detail_penjualan_spareparts USING(no_transaksi)
                WHERE
                    keterangan_transaksi = "Lunas"
            ) a
            GROUP BY
                bulan,
                tahun
            HAVING
                tahun = :tahun', ['tahun' => $tahun]);

        return response()->json($data, 200);
    }

    public function sparepartTerlaris($tahun) {
        $data =DB::select(
            'SELECT
            bulan,
            nama,
            tipe,
            MAX(total) "total"
            FROM
                (
                SELECT
                    MONTH(tanggal_transaksi) AS bulan,
                    nama_sparepart AS nama,
                    tipe_sparepart as tipe,
                    SUM(jumlah_penjualan_sparepart) AS total
                FROM
                    detail_penjualan_spareparts
                JOIN penjualans USING(no_transaksi)
                join spareparts using(kode_sparepart)
                WHERE
                    YEAR(tanggal_transaksi) = :tahun AND keterangan_transaksi = "Lunas"
                GROUP BY
                    kode_sparepart,
                    bulan
                ORDER BY
                    total
                DESC
            ) q
            GROUP BY
                bulan
            ORDER BY
                bulan ASC',
                ['tahun' => $tahun]);

        return response()->json($data, 200);
    }

    public function sisaStok($barang, $tahun) {
        $data = DB::select(
            'SELECT
            MONTH(tanggal_histori) "bulan",
            tipe_sparepart,
            sum(sisa_stok) "sisa_stok"
            FROM
                historis
            JOIN spareparts USING(kode_sparepart)
            WHERE
                tipe_sparepart = :barang AND tanggal_histori IN(
                SELECT
                    MAX(tanggal_histori)
                FROM
                    historis
                JOIN spareparts USING(kode_sparepart)
                WHERE
                    YEAR(tanggal_histori) = :tahun AND tipe_sparepart = :barang1
                GROUP BY
                    nama_sparepart,
                    MONTH(tanggal_histori),
                    YEAR(tanggal_histori)
            )
            GROUP BY
                tipe_sparepart,
                MONTH(tanggal_histori),
                YEAR(tanggal_histori)', 
            ['barang' => $barang, 'tahun' => $tahun, 'barang1' => $barang]);

        return response()->json($data, 200);  
    }

    public function pendapatanTahunan() {
        $data = DB::select(
            'SELECT
            YEAR(tanggal_transaksi) "tahun",
            nama_cabang "cabang",
            SUM(total_transaksi) "total"
            FROM
                melayani
            JOIN pegawais USING(id_pegawai)
            JOIN penjualans USING(no_transaksi)
            JOIN cabangs USING(id_cabang)
            WHERE
                jabatan_pegawai = "Kasir" and keterangan_transaksi = "Lunas"
            GROUP BY
                nama_cabang,
                YEAR(tanggal_transaksi)
            ORDER BY tahun, cabang ASC', [1]);

            return response()->json($data, 200);
    }

    

    
}
