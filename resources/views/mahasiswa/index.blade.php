<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
@extends('layouts.app')
@section('content')

<body>

    <div class="container">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <h1>Data Mahasiswa</h1>
            </div>
            <div class="col-md-7">
                <!--Button trigger modal-->
                <button type="button" class="btn btn-primary my-2 my-sm-0 float-right" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                </button>
                <form class="form-inline my-2 my-lg-0" method="GET" action="/mahasiswa">
                    <input name="cari" class="form-control w-75 mr-sm-2" id="search" placeholder="Cari">
                    <button type="submit" class="btn btn-outline-secondary my-2 my-sm-0">Cari</button>
                </form>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>NAMA</th>
                    <th>NIM</th>
                    <th>ALAMAT</th>
                    <th>AKSI</th>
                </tr>
                @foreach($data_mahasiswa as $mahasiswa)
                <tr>
                    <td>{{$mahasiswa->nama}}</td>
                    <td>{{$mahasiswa->nim}}</td>
                    <td>{{$mahasiswa->alamat}}</td>
                    <td>
                        <a href="/mahasiswa/{{$mahasiswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/mahasiswa/delete/{{$mahasiswa->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau Dihapus?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{-- {{$data_mahasiswa->links('pagination::bootstrap-4')}} --}}
        </div>
        <a href="/mahasiswa/exportpdf" class="btn btn-sm btn-success">Export PDF</a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" arialabelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/mahasiswa/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIM</label>
                            <input name="nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" cross origin="anonymous">
    </script>
</body>
@endsection

</html>