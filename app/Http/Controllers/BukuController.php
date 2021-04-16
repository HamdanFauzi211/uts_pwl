<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $cari = $request->get('cari');
        if ($cari) {
            $bukuu  = Buku::where("Judul", "LIKE", "%$cari%")->paginate(5);
        } else {
            $bukuu = Buku::paginate(5);
        } 
        //fungsi eloquent menampilkan data menggunakan pagination
        $posts = Buku::orderBy('Id_buku', 'desc')->paginate(6);
        return view('bukuu.index', compact('bukuu'));
        with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
      return view('bukuu.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Id_buku' => 'required',
            'Judul' => 'required',
            'Kategori' => 'required',
            'Penerbit' => 'required',
            'Pengarang' => 'required',
            'Jumlah' => 'required',
            'Status' => 'required',
        ]);  
        //fungsi eloquent untuk menambah data
        Buku::create($request->all());
         
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('bukuu.index')
        ->with('success', 'Buku Berhasil Ditambahkan');
    }

    public function show($Id_buku)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Buku = Buku::find($Id_buku);
        return view('bukuu.detail', compact('Buku'));
    }

    public function edit($Id_buku)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Buku = Buku::find($Id_buku); 
        return view('bukuu.edit', compact('Buku'));
    }

    public function update(Request $request, $Id_buku)
    {
        //melakukan validasi data
        $request->validate([
            'Id_buku' => 'required',
            'Judul' => 'required',
            'Kategori' => 'required',
            'Penerbit' => 'required',
            'Pengarang' => 'required',
            'Jumlah' => 'required',
            'Status' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
        Buku::find($Id_buku)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama 
        return redirect()->route('bukuu.index')
        ->with('success', 'Buku Berhasil Diupdate'); 
        }

    public function destroy($Id_buku)
    {
        //fungsi eloquent untuk menghapus data
        Buku::find($Id_buku)->delete(); 
        return redirect()->route('bukuu.index') 
        -> with('success', 'Buku Berhasil Dihapus');
    }
};