<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
    // ambil Auto Increment langsung dari database
    $nextId = \DB::select("SHOW TABLE STATUS LIKE 'kategoris'")[0]->Auto_increment;

    return view('kategori.form', [
        'nextId' => $nextId
    ]);
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kategori'=>'required']);
        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success','Kategori ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.form', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate(['nama_kategori'=>'required']);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success','Kategori diupdate');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success','Kategori dihapus');
    }
}