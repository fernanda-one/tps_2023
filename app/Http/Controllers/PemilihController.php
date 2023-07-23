<?php

namespace App\Http\Controllers;

use App\Models\Pemilih;
use Illuminate\Http\Request;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pemilih');
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
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|integer|max:11',
            'alamat' => 'required|string',
            'rt' => 'required|integer|max:11',
            'rw' => 'required|integer|max:11',
            'lokasi_tps' => 'required|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'keterangan' => 'required|string',
            'phone_number' => 'required|integer|max:12',
        ]);

        $pemilih = new Pemilih([
            'name' => $request->name,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'phone_number' => $request->phone_number,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'lokasi_tps' => $request->lokasi_tps,
            'keterangan' => $request->keterangan,
        ]);

        if ($pemilih->save()) {
            return redirect('/pemilih')->with(['success' => 'add new voter successfully']);
        } else {
            return redirect('/pemilih')->with(['error' => 'Failed to add new voter']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function show(Pemilih $pemilih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemilih $pemilih)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemilih $pemilih)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemilih $pemilih)
    {
        //
    }
}
