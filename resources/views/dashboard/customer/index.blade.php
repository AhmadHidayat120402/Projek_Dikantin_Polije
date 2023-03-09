@extends('main')
@section('content')
    <div class="container-fluid mt-2">
        <a href="/customer/create" class="btn text-white" style="padding: 7px; border-radius:10px; background: #51AADD"> +
            Create New Customer
        </a>
        {{-- <button class="btn text-white" style="background: #51AADD" onClick="create()">+ create new customer</button> --}}
        {{-- <div id="read" class="mt-3"></div> --}}
        <!-- Modal -->
        {{-- <div class="modal fade" id="exampleModal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="page" class="p-2"></div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="table-responsive mt-3 bg-white p-4" style="border-radius: 20px; height:76%; !important;">
            <table class="table table-striped table-hover w-100 nowrap" width="100%" id="table-customer">
                <thead>
                    <tr>
                        @php
                            $no = 1;
                        @endphp
                        <th>No</th>
                        <th>ID Customer</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $c)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $c->id_customer }}</td>
                            <td>{{ $c->nama }}</td>
                            <td>{{ $c->alamat }}</td>
                            <td>

                                <div class="d-flex align-items-center gap-2">
                                    <a href="/customer/{{ $c->id }}/edit"
                                        class="btn btn-warning text-white m-0">Edit</a>
                                    {{-- <button class="btn btn-warning" onclick="show({{ url('/customer/show/{{ $c->id }}') }})">Edit</button> --}}
                                    {{-- <button class="btn btn-warning" onclick="show({{ $c->id }})">Edit</button> --}}
                                    {{-- <button class="btn btn-danger" onclick="destroy({{ $c->id }})">Hapus</button> --}}
                                    <form action="/customer/{{ $c->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Hapus" class="btn btn-danger text-white m-0">
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
            $('#table-customer').DataTable()
        });

        // $(document).ready(function() {
        //     read();
        // });
        // read database
        // function read() {
        //     $.get("{{ url('read') }}", {}, function(data, status) {
        //         $("#read").html(data);
        //     });
        // }

        // untuk modal halaman create
        // function create() {
        //     $.get("{{ url('customer/create') }}", {}, function(data, status) {
        //         $('#exampleModalLabel').html('Add Customer');
        //         $('#page').html(data)
        //         $('#exampleModal').modal('show');
        //     });
        // }

        // untuk halaman edit show
        // function show(id) {
        //     $.get("{{ url('customer/show') }}/" + id, {}, function(data, status) {
        //         $('#exampleModalLabel').html('Edit Customer');
        //         $('#page').html(data)
        //         $('#exampleModal').modal('show');
        //     });
        // }

        // untuk proses simpan data
        // function store() {
        //     var id_customer = $('#id_customer').val();
        //     var nama = $('#nama').val();
        //     var alamat = $('#alamat').val();
        //     var no_telepon = $('#no_telepon').val();

        //     $.ajax({
        //         type: "get",
        //         url: "{{ url('/customer/store') }}",
        //         data: {
        //             id_customer: id_customer,
        //             nama: nama,
        //             alamat: alamat,
        //             no_telepon: no_telepon,
        //         },

        //         success: function(data) {
        //             $('.btn-close').click();

        //         }
        //     })
        // }
        // untuk proses update data
        function update(id) {
            var id_customer = $('#id_customer').val();
            var nama = $('#nama').val();
            var alamat = $('#alamat').val();
            var no_telepon = $('#no_telepon').val();

            $.ajax({
                type: "get",
                url: "{{ url('/customer/update') }}/" + id,
                data: {
                    id_customer: id_customer,
                    nama: nama,
                    alamat: alamat,
                    no_telepon: no_telepon,
                },

                success: function(data) {
                    $('.btn-close').click();
                }
            })
        }

        // function destroy(id) {
        //     var id_customer = $('#id_customer').val();
        //     var nama = $('#nama').val();
        //     var alamat = $('#alamat').val();
        //     var no_telepon = $('#no_telepon').val();
        //     $.ajax({
        //         type: "get",
        //         url: "{{ url('/customer/destroy') }}/" + id,
        //         data: {
        //             id_customer: id_customer,
        //             nama: nama,
        //             alamat: alamat,
        //             no_telepon: no_telepon,
        //         },

        //         success: function(data) {
        //             $('.btn-close').click();
        //         }
        //     })
        // }
    </script>
@endpush
