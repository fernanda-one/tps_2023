<?php

namespace App\Http\Controllers;
use App\Models\Pemilih;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $this->authorize('admin');
        $pemilih = Pemilih::with('users');
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

        $pemilih = $pemilih->orderByRaw("CASE
            WHEN status = 'pending' THEN 1
            WHEN status = 'approved' THEN 2
            WHEN status = 'rejected' THEN 3
            ELSE 4
        END")->orderByDesc('created_at');

        return view('dashboard', [
            'data' => $pemilih->paginate(6)
        ]);
    }

    public function updateStatus(Request $request, $id) {
        $this->authorize('admin');
        $pemilih = Pemilih::find($id);
        if (!$pemilih) {
            return redirect('/dashboard')->with(['error' => 'Data not found']);
        }

        $pemilih->update([
            'status' => $request->input('status'),
        ]);

        if ($pemilih) {
            return redirect('/dashboard')->with(['success' => 'Data update successfully']);
        } else {
            return redirect('/dashboard')->with(['error' => 'Failed to update']);
        }
    }
}
