@extends('main')
@section('content')
    <div class="container-fluid mt-2">
        <a href="/menu/create" class="btn text-white" style="padding: 7px; border-radius:10px; background: #51AADD">
            + create new menu
        </a>
        <div class="table-responsive mt-3 bg-white p-4" style="border-radius: 20px; height:76% !important;">
            <table class="table table-striped table-hover w-100 nowrap" width="100%" id="table-menu"
                style="height: 10% !important">
                <thead>
                    <tr>
                        @php
                            $no = 1;
                        @endphp
                        <th>No</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Stok</th>
                        <th>Kantin</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menu as $m)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $m->nama_menu }}</td>
                            <td>Rp {{ number_format($m->harga) }}</td>
                            <td>
                                <img src="{{ url('storage/' . $m->foto) }}"
                                    style="width: 70px; height: 70px;  object-fit: cover;" alt=""
                                    class="rounded-circle">
                            </td>
                            <td>{{ $m->status_stok }}</td>
                            <td>{{ $m->id_kantin }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="/menu/{{ $m->id }}/edit"
                                        class="btn btn-warning text-white btn-sm">Edit</a>
                                    <form action="/menu/{{ $m->id }}" method="post">
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
