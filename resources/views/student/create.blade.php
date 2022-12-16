@extends('templates.base')

@section('title', 'Tambah Data')
@section('content')
<form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
    
    @csrf
    <label for="name" >Nama</label>
    <input type="text" name="name" required>
    <label for="birth_date">Tanggal Lahir</label>
    <input type="text" name="birth_date">
    <label for="gender">Jenis Kelamin</label>
    <input type="text" name="gender">
    <label for="biodata">Biodata</label>
    <input type="text" name="biodata">
    <label for="image">Gambar</label>
    <input type="file" name="image">
    <button type="submit">Simpan</button>

</form>
@endsection