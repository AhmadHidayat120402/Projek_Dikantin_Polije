@extends('main')
@section('content')
    <div class="container">
        <form method="POST" action="/user" class="bg-white p-3" style="border-radius: 20px;" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Level</label>
                <select class="form-select" aria-label="Default select example" name="type" required>
                    <option selected>Level</option>
                    <option value="0">admin</option>
                    <option value="1">kasir</option>
                    <option value="2">kantin</option>
                    <option value="3">tefa</option>
                    <option value="4">dharmawanita</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_kantin" class="form-label">Kantin</label>
                <select class="form-select" aria-label="Default select example" name="id_kantin" id="id_kantin">
                    <option selected>Pilih Kantin</option>
                    <option value="">Null</option>
                    <option value="1">Kantin 1</option>
                    <option value="2">Kantin 2</option>
                    <option value="3">Kantin 3</option>
                    <option value="4">Kantin 4</option>
                    <option value="5">Kantin 5</option>
                    <option value="6">Kantin 6</option>
                    <option value="7">Kantin 7</option>
                    <option value="8">Kantin 8</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn text-white" style="background: #51AADD">Simpan</button>
                <a href="/home" class="btn btn-light px-3">Kembali</a>
            </div>
        </form>
    </div>
@endsection
