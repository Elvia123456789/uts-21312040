@extends('layout.master')

@section('judul')
Tambah Film
@endsection

@section('content')
<form method="post" action="/film">
    @csrf
    <div class="form-group">
        <label>judul</label>
        <input type="text" name="judul" value="" class="form-control">
    </div>
    @error('judul')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror

    <div class="form-group">
        <label>Ringkasan</label>
        <textarea class="form-control" name="ringkasan"></textarea>
    </div>
    @error('ringkasan')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror

    <div class="form-group">
        <label>Tahun</label>
        <textarea class="form-control" name="tahun"></textarea>
    </div>
    @error('tahun')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror

    <div class="form-group">
        <label>Poster</label>
        <textarea class="form-control" name="poster"></textarea>
    </div>
    @error('poster')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror

    <div class="form-group">
        <label>Genre</label>
        <select class="form-control" name="genre">
        <option value="">Pilih Genre</option>
        @forelse ($genre as $key => $item)
             <option value="{{ $item['id'] }}">{{ $item['nama']}}</option>
        @empty
        @endforelse
</select>
</div>
    @error('poster')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror


    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection