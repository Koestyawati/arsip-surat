<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $surats = Surat::with('kategori')
        ->when($search, function($query) use ($search) {
            $query->where('judul', 'like', "%$search%")
                  ->orWhere('nomor', 'like', "%$search%");
        })
        ->orderBy('created_at','desc')
        ->get();

    return view('surat.index', compact('surats','search'));
}


    public function create()
    {
        $kategoris = Kategori::all();
        return view('surat.create', compact('kategoris'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nomor'=>'required',
        'judul'=>'required',
        'kategori_id'=>'required',
        'file_pdf'=>'required|mimes:pdf|max:2048'
    ]);

    $path = $request->file('file_pdf')->store('surat','public');

    Surat::create([
        'nomor'=>$request->nomor,
        'judul'=>$request->judul,
        'kategori_id'=>$request->kategori_id,
        'tanggal'=>now(),
        'file_pdf'=>$path
    ]);

    return redirect()->route('surat.index')->with('success','Data berhasil disimpan');
}


    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    public function destroy(Surat $surat)
    {
        Storage::disk('public')->delete($surat->file_pdf);
        $surat->delete();
        return redirect()->route('surat.index')->with('success','Data berhasil dihapus');
    }

    public function download(Surat $surat)
    {
        return Storage::disk('public')->download($surat->file_pdf);
    }

    public function edit(Surat $surat)
    {
    $kategori = \App\Models\Kategori::all();
    return view('surat.edit', compact('surat', 'kategori'));
    }

    public function update(Request $request, Surat $surat)
    {
    $request->validate([
        'nomor' => 'required',
        'judul' => 'required',
        'kategori_id' => 'required',
        'tanggal' => 'required|date',
        'file_pdf' => 'nullable|mimes:pdf|max:2048'
    ]);

    // update data biasa
    $surat->nomor = $request->nomor;
    $surat->judul = $request->judul;
    $surat->kategori_id = $request->kategori_id;
    $surat->tanggal = $request->tanggal;

    // kalau ada file baru
    if ($request->hasFile('file_pdf')) {
        $path = $request->file('file_pdf')->store('surat', 'public');
        $surat->file_pdf = $path;
    }

    $surat->save();

    return redirect()->route('surat.index')->with('success', 'Surat berhasil diupdate');
    }
}