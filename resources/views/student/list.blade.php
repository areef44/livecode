@extends('templates.base')


@section('title', 'List Siswa')

@section('content')

<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Gambar</th>
            <th>JK</th>
            <th>Bio</th>
            <th>Opsi</th>
        </tr>
    </thead>

    {{-- TODO: loop all student data --}}
    <tbody>
       @foreach($students as $student)
       <tr>
        <td>
            {{ $loop->iteration }}
        </td>
           <td>
               {{ $student->name }}
       </td>
       <td>
           {{ $student->birth_date }}
        </td>
        <td>
            <img src="{{ asset('storage/' . $student->image) }}">
        </td>
        <td>
            {{ $student->gender }}
        </td>
        <td>
            {{ $student->biodata }}
        </td>
        <td>
            <a href="{{ route('student.edit', ['student' => $student]) }}">Edit</a>
      
            <form action="{{ route('student.destroy', ['student' => $student]) }}" method="post">
            @csrf
            @method('delete')
            <button onclick="return confirm('Apakah anda yakin???')">delete</button>
            </form>
        </td>
    </tr>
       @endforeach
    </tbody>
</table>

{{-- table>thead>tr>th*6 --}}

@endsection