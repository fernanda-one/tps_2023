<?php

namespace App\Http\Controllers;

use App\Models\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('enumerator');
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

    public function store(Request $request)
    {
        $this->authorize('enumerator');
        $request->validate([
            'name' => 'required|max:255',
            'nik' => 'required|max:16|min:16',
            'alamat' => 'required|max:255',
            'rt' => 'required|max:11',
            'rw' => 'required|max:11',
            'lokasi_tps' => 'required|string|max:255',
            'kelurahan' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'phone_number' => 'required|max:15|min:11',
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
            'status' => 'pending',
            'created_by' => Auth::user()->getAuthIdentifier()
        ]);

        if ($pemilih->save()) {
            return redirect('/pemilih')->with(['success' => 'add new voter successfully']);
        } else {
            return redirect('/pemilih')->with(['error' => 'Failed to add new voter']);
        }
    }

    public function edit(Request $request, $id)
    {
        $this->authorize('enumerator');
        $pemilih = Pemilih::findOrFail($id);
        if ($pemilih) {
            $request->validate([
                'name' => 'required|max:255',
                'nik' => 'required|max:16|min:16',
                'alamat' => 'required|max:255',
                'rt' => 'required|max:11',
                'rw' => 'required|max:11',
                'lokasi_tps' => 'required|string|max:255',
                'kelurahan' => 'required|max:255',
                'kecamatan' => 'required|max:255',
                'phone_number' => 'required|max:15|min:11',
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
}
