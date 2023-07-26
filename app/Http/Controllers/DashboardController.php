<?php

namespace App\Http\Controllers;
use App\Models\Pemilih;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pemilih = Pemilih::latest()->where('status', 'pending');
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

        return view('dashboard', [
            'data' => $pemilih->paginate(6)
        ]);
    }
}
