<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kaffah;

class KaffahController extends Controller
{
    public function index()
    {
        $data = kaffah::all();
        return view('home', compact('data'));
    }

    public function update(Request $request)
    {
        $updatedData = $request->input('data', []);

        foreach ($updatedData as $id => $bulanData) {
            $updateFields = [];

            foreach ($bulanData as $bulan => $value) {
                $updateFields[$bulan] = $value === '1' ? 1 : 0;
            }

            // Update database berdasarkan ID
            \DB::table('kaffah')->where('id', $id)->update($updateFields);
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
                'januari' => 0,
                'februari' => 0,
                'maret' => 0,
                'april' => 0,
                'mei' => 0,
                'juni' => 0,
                'juli' => 0,
                'agustus' => 0,
                'september' => 0,
                'oktober' => 0,
                'november' => 0,
                'desember' => 0,
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
