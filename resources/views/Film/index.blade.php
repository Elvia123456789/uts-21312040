@extends('layout.master')

@section('judul')
Daftar film
@endsection

@push('script')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
    <script>
        $(function(){
            $('#example1').DataTable();
        });
    </script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush

@section('content')
<a class="btn btn-secondary mb-3" href="/film/create">Tambah Data</a>
<table class="table" id="example1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Film</th>
      <th scope="col">Cast</th>
      <th scope="col">Nama</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($film as $key => $item)
    <tr>
      <td>{{$key + 1}}</td>
      <td>{{$item->film}}</td>
      <td>{{$item->Cast}}</td>
      <td>{{$item->Nama}}</td>
      <td>
      <form action="/film/{{ $item->id }}" method="POST" id="deleteForm">
        <a href="/film/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Apakah anda yakin menghapus data ini ?')" class="btn btn-danger btn-sm">Hapus</button>
      </form>
      </td>
    </tr>
    @empty
    <h2>Data tidak ada</h2>
    @endforelse
  </tbody>
</table>
@endsection