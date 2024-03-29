<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Peran;
use RealRashid\SweetAlert\Facades\Alert;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = Film::all();
        return view('film.index', compact('film'));

        $peran = Peran::all();
        return view('peran.index', compact('peran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $genre = Genre::all();
        return view('film.create', compact('genre'));

        $peran = Peran::all();
        return view('peran.create', compact('peran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $film = new Film;

        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required',
            'genre' => 'required',
            ]);

        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->poster = $request->poster;
        $film->genre_id = $request->genre;

        $simpan = $film->save();
        
        if($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/film');
        }else{
            Alert::error('Failed', 'Data Gagal ditambah');
        }
        
        return redirect('/film');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $film = Film::find($id);

        // Assuming you have a relationship between Film and Genre (e.g., genre() method in Film model)
        $genre = Genre::all();
    
        return view('film.edit', compact('film', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required',
            'genre' => 'required',
            ]);
        
        $film = Film::find($id);
        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->poster = $request->poster;
        $film->genre_id = $request->genre;
        
        $ubah = $film->save();

        if($ubah) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/film');
        }else{
            Alert::error('Failed', 'Data Gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        $hapus = $film->delete();

        if($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/film');
        }else{
            Alert::error('Failed', 'Data Gagal dihapus');
        }
        return redirect('/film');
    }
}