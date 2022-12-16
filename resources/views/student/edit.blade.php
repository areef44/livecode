@extends('templates.base')

@section('title', 'Tambah Data')
@section('content')
<form action="{{ route('student.update', ['student' => $student]) }}" method="post" enctype="multipart/form-data">
    
    @csrf
    @method('put')
    <label for="name" >Nama</label>
    <input type="text" name="name" required value="{{ old('name', $student->name) }}">
    <label for="birth_date">Tanggal Lahir</label>
    <input type="text" name="birth_date" value="{{ old('birth_date', $student->birth_date) }}">
    <label for="gender">Jenis Kelamin</label>
    <input type="text" name="gender" value="{{ old('gender', $student->gender) }}">
    <label for="biodata">Biodata</label>
    <input type="text" name="biodata" value="{{ old('biodata', $student->biodata) }}">
    <label for="image">Gambar</label>
    <input type="file" name="image">
    <button type="submit">Update</button>

</form>
@endsection