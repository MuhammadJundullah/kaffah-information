<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kaffah;

class KaffahController extends Controller
{
    public function index()
    {
        $data = kaffah::all();
        $tahunList = Kaffah::distinct()->pluck('tahun');
        return view('home', compact('data', 'tahunList'));
    }

    public function filter($tahun)
    {
        $data = kaffah::where('tahun', $tahun)->get();
        $tahunList = Kaffah::distinct()->pluck('tahun');
        return view('home', compact('data', 'tahunList'));
    }

    public function update(Request $request)
    {
        $updatedData = $request->input('data', []);

        foreach ($updatedData as $id => $bulanData) {
            \DB::table('kaffah')->where('id', $id)->update($bulanData);
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }


    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        try {
            // Membuat data baru
            Kaffah::create([
                'name' => $validated['name'],
                'tahun' => $validated['tahun'],

                // Pastikan kolom bulan diisi default, misalnya 0
                'januari' => "-",
                'februari' => "-",
                'maret' => "-",
                'april' => "-",
                'mei' => "-",
                'juni' => "-",
                'juli' => "-",
                'agustus' => "-",
                'september' => "-",
                'oktober' => "-",
                'november' => "-",
                'desember' => "-",
            ]);

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Jika ada error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan data!');
        }
    }

    /**
     * Menghapus data Kaffah berdasarkan ID.
     */
    public function destroy($id)
    {
        try {
            // Mencari data berdasarkan ID
            $kaffah = Kaffah::findOrFail($id);

            // Menghapus data
            $kaffah->delete();

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data!');
        }
    }

}
