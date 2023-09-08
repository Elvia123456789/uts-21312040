@extends('layout.master')

@section('judul')
Edit peran
@endsection

@section('content')
<form method="post" action="/peran/{{ $peran->id }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Film</label>
        <input type="text" name="film" value="{{ $peran->film }}" class="form-control">
    </div>
    @error('film')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Cast</label>
        <textarea class="form-control" name="cast"> {{ $peran->cast}} </textarea>
    </div>
    @error('cast')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  
   <div class="form-group">
        <label>Nama</label>
        <textarea class="form-control" name="nama"> {{ $peran->nama }} </textarea>
    </div>
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endsection