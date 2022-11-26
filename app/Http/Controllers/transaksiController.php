<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transkasi;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transkasi::all();
        return $transaksi;
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
        $transaksi = transkasi::create([
            "tgl_pembelian" => $request->tgl_pembelian,
            "nama_pembeli" => $request->nama_pembeli,
            "nama_konser" => $request->nama_konser,
            "jadwal_konser" => $request->jadwal_konser,
            "waktu_transaksi" => $request->waktu_transaksi,
            "jumlah" => $request->jumlah,
        ]);
        
        return response()->json([
            'success' => 201,
            'message' => "Data tiket berhasil disimpan",
            'data' => $transaksi
        ],
        201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = transkasi::find($id);
        if ($transaksi){
            return response()->json([
                'status' => 200,
                'data' => $transaksi
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . ' tidak ditemukan'
            ],404);
        }
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
