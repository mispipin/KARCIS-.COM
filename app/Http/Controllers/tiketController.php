<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tiket;

class tiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = tiket::all();
        return $tiket;
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
        $table = tiket::create([
            "kode_tiket" => $request->kode_tiket,
            "nama_konser" => $request->nama_konser,
            "jadwal_konser" => $request->jadwal_konser,
            "deskripsi" => $request->deskripsi,
            "lokasi" => $request->lokasi
        ]);
        
        return response()->json([
            'success' => 201,
            'message' => "Data tiket berhasil disimpan",
            'data' => $table
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
        $tiket = tiket::find($id);
        if ($tiket){
            return response()->json([
                'status' => 200,
                'data' => $tiket
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
        $tiket = tiket::find($id);
        if($tiket){
            $tiket->kode_tiket = $request->kode_tiket ? $request->kode_tiket : $tiket->kode_tiket;
            $tiket->nama_konser = $request->nama_konser ? $request->nama_konser : $tiket->nama_konser;
            $tiket->jadwal_konser = $request->jadwal_konser ? $request->jadwal_konser : $tiket->jadwal_konser;
            $tiket->deskripsi = $request->deskripsi ? $request->deskripsi : $tiket->deskripsi;
            $tiket->lokasi = $request->lokasi ? $request->lokasi : $tiket->lokasi;
            $tiket->save();
            return response()->json([
                'status' => 200,
                'data' => $tiket
            ], 200);

        }else{
            return response() -> json([
                'status' => 200,
                'message' => $id .' tidak ditemukan'
            ],404);
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
        $tiket = tiket::where('id',$id)->first();
        if ($tiket){
            $tiket->delete();
            return response()->json([
                'status' => 200,
                'message' => "tiket berhasil dihapus",
                'data' => $tiket
            ], 200);

        }else{
            return response() -> json([
                'status' => 200,
                'message' => 'id ' . $id .' tidak ditemukan'
            ],404);
        }
    }
}
