@extends('main')
@section('content')
    <div class="container">
        <form class="bg-white p-4" method="POST" action="/customer"  style="border-radius: 20px;">
            @csrf
            <div class="mb-3">
                <label for="id_customer" class="form-label">ID Customer</label>
                <input type="text" class="form-control" id="id_customer" name="id_customer" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
            </div>
            <button type="submit" class="btn text-white" style="background: #51AADD; " onClick="store()">Simpan</button>
            <a href="/customer" class="btn btn-light px-3">Kembali</a>
        </formmethod=>
    </div>
@endsection
