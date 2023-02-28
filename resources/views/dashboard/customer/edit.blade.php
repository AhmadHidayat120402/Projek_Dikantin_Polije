@extends('main')
@section('content')
    <div class="container">
        <form class="bg-white p-4" style="border-radius: 20px;" method="POST" action="/customer/{{ $customer->id }}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="id_customer" class="form-label">ID Customer</label>
                <input type="text" class="form-control" id="id_customer" name="id_customer" required
                    value="{{ $customer->id_customer }}">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required
                    value="{{ $customer->nama }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required
                    value="{{ $customer->alamat }}">
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required
                    value="{{ $customer->no_telepon }}">
            </div>
            <button type="submit" class="btn text-white btn-warning" onClick="update({{ $customer->id }})">Update</button>
            <a href="/customer" class="btn btn-light px-3">Kembali</a>
        </form>
    </div>
@endsection
