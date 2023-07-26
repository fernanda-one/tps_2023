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
        $pemilih = Pemilih::latest();
        $search = \request('search') ?? '';
        if ($search != "") {
            $pemilih->where('name', 'like', '%' . $search . '%')
                ->orWhere('nik', 'like', '%' . $search . '%')
                ->orWhere('alamat', 'like', '%' . $search . '%')
                ->orWhere('phone_number', 'like', '%' . $search . '%')
                ->orWhere('kelurahan', 'like', '%' . $search . '%')
                ->orWhere('kecamatan', 'like', '%' . $search . '%')
                ->orWhere('lokasi_tps', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%');
        }

        return view('pemilih', [
            'voters' => $pemilih->paginate(6)
        ]);
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
            'name' => 'required|max:255',
            'nik' => 'required|max:17',
            'alamat' => 'required|max:255',
            'rt' => 'required|max:10',
            'rw' => 'required|max:10',
            'lokasi_tps' => 'required|string|max:255',
            'kelurahan' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'phone_number' => 'required|max:15',
            'keterangan' => 'required|max:255',
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $pemilih = Pemilih::findOrFail($id);
        if ($pemilih) {
            $request->validate([
                'name' => 'required|max:255',
                'nik' => 'required|max:17',
                'alamat' => 'required|max:255',
                'rt' => 'required|max:10',
                'rw' => 'required|max:10',
                'lokasi_tps' => 'required|string|max:255',
                'kelurahan' => 'required|max:255',
                'kecamatan' => 'required|max:255',
                'phone_number' => 'required|max:15',
                'keterangan' => 'required|max:255',
            ]);

            $pemilih->update($request->all());
            if ($pemilih) {
                return redirect('/pemilih')->with(['success' => 'Update new voter successfully']);
            } else {
                return redirect('/pemilih')->with(['error' => 'Failed to update voter']);
            }
        } else {
            return redirect('/pemilih')->with(['error' => 'Data not found']);
        }
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

    }
}
