@extends('main')
@section('content')
    <div class="container-fluid mt-2">
        <div class="table-responsive mt-3 bg-white p-4" style="border-radius: 20px; height:76% !important;">
            <table class="table table-striped table-hover w-100 nowrap" width="100%" id="table-menu"
                style="height: 10% !important">
                <thead>
                    <tr>
                        @php
                            $no = 1;
                        @endphp
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nomer Penjualan</th>
                        <th>Pembeli</th>
                        <th>No Telp Pembeli</th>
                        <th>Kasir</th>
                        <th>Model Pembayaran</th>
                        <th>No Meja</th>
                        <th>Kantin</th>
                        <th>Pesanan</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Diskon</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $d->tanggal_penjualan }}</td>
                            <td>{{ $d->nomer_penjualan }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->no_telepon }}</td>
                            <td>{{ $d->username }}</td>
                            <td>{{ $d->model_pembayaran }}</td>
                            <td>{{ $d->no_meja }}</td>
                            <td>{{ $d->nama_kantin }}</td>
                            <td>{{ $d->nama_menu }}</td>
                            <td>{{ $d->harga }}</td>
                            <td>{{ $d->jumlah }}</td>
                            <td>{{ $d->diskon }}</td>
                            <td>{{ $d->status }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    {{-- <a href="/menu/{{ $d->id }}/edit"
                                        class="btn btn-warning text-white btn-sm">Edit</a> --}}
                                    <form action="/menu/{{ $d->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="confirm('Yakin ingin menghapus data ini ? ')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-menu').DataTable();
        });
    </script>
@endpush
