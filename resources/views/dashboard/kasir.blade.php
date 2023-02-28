@extends('main')
@section('content')
    <div class="container-fluid mt-0">
        <div class="row d-flex justify-content-between">
            <div class="col-md-8 m-0">
                <div class="row mt-2">
                    <div class="col-md-3"><input type="text" placeholder="ID Customer" class="form-control"
                            style="border-radius: 10px;"></div>
                    <div class="col-md-3"><input type="text" placeholder="Nama" class="form-control" id="inputnama"
                            class="form-control bg-lingkaran" readonly style="border-radius: 10px;"></div>
                    <div class="col-md-3"><input type="text" placeholder="No Telepon" class="form-control"
                            id="inputalamat" class="form-control bg-lingkaran" readonly style="border-radius: 10px;"></div>
                    <div class="col-md-3"><input type="text" placeholder="Alamat" class="form-control" id="inputtelepon"
                            class="form-control bg-lingkaran" readonly style="border-radius: 10px;"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <input type="text" autocomplete="off" class="form-control d-inline" onkeyup="getMenu()"
                            placeholder="Cari Menu" name="q" id="search-input" style="border-radius: 10px;">
                    </div>
                    {{-- @foreach ($menu as $m)
                        <div class="col-md-3">
                            <div class="bungkus-menu bg-second" id="menu_luar" onclick="addCart(${item.id})"
                                style="cursor: pointer">
                                <img src="{{ url('storage/' . $m->foto) }}" alt="" width="80px"
                                    class="justify-content-center align-items-center mx-auto d-block p-2" id="menu_dalam">
                                <p class="m-0 text-center text-primary fw-bold" id="harga_menu">Rp
                                    {{ $m->harga }}</p>
                                <p class="m-0 text-center" id="nama_menu" onclick="namamakanan(this.value)">
                                    {{ $m->nama_menu }}</p>
                                <p class="text-primary fw-bold m-0 text-center" id="id_kantin"><small> <i>Kantin
                                            {{ $m->id_kantin }} </i>
                                    </small></p>

                            </div>
                        </div>
                    @endforeach --}}
                </div>
                <div class="row mt-2 m-0" id="data-menu"
                    style="background: rgba(255, 255, 255, 0.5); border-radius : 10px;">
                    {{-- @foreach ($menu as $m)
                        <div class="col-md-3">
                            <div class="bungkus-menu bg-second" id="menu_luar" onclick="addCart(${item.id})"
                                style="cursor: pointer">
                                <img src="{{ url('storage/' . $m->foto) }}" alt="" width="80px"
                                    class="justify-content-center align-items-center mx-auto d-block p-2" id="menu_dalam">
                                <p class="m-0 text-center text-primary fw-bold" id="harga_menu">Rp
                                    {{ $m->harga }}</p>
                                <p class="m-0 text-center" id="nama_menu" onclick="namamakanan(this.value)">
                                    {{ $m->nama_menu }}</p>
                                <p class="text-primary fw-bold m-0 text-center" id="id_kantin"><small> <i>Kantin
                                            {{ $m->id_kantin }} </i>
                                    </small></p>

                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
            <div class="col-md-4 mt-2 pt-2" style="background: white; border-radius:10px;">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold d-inline m-0">Order <span hidden id="orderid"></span></h5>
                            <p class="m-0">{{ date('Y-m-d') }}</p>
                            {{-- <hr style="height: 2px"> --}}
                        </div>
                        <div id="cart">
                            <div class="cart-menu row align-items-center mt-3">
                                <div class="col-md-4">
                                    <p class="m-0 text-dark">Nasi Goreng</p>
                                    <p class="m-0 text-secondary">Rp 12.000</p>
                                </div>
                                <div class="col-5">
                                    <div class="d-flex align-items-center justify-content-end gap-3">
                                        <p class="m-0">1x</p>
                                        <input type="number" class="form-control border-0 bg-white" placeholder="0%">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="d-flex align-items-center justify-content-end gap-1">
                                        <button type="button" class="btn btn-light" style="border: 20px;">+</button>
                                        <button type="button" class="btn btn-light" style="border: 20px;">-</button>
                                        <button type="button" class="btn btn-danger" id="btn_hapus" style="border: 20px;">
                                            <i class="fa-solid fa-trash-can text-white"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr style="height: 2px">
                            </div>

                        </div>
                        <input type="hidden" name="id_penjualan" id="id_penjualan">

                        <div class=" d-flex justify-content-between mt-3">
                            <p class="fw-bold">No Meja : </p>
                            <input type="number" class="form-control mr-2 number-meja" placeholder="17" name="no_meja"
                                required>
                        </div>
                        <div class="mb-3">
                            <div class="metode-pembayaran mt-3">
                                <select class="form-select" aria-label="Default select example" name="model_pembayaran"
                                    required>
                                    <option selected>Pilih Pembayaran</option>
                                    <option value="cash">Cash</option>
                                    <option value="polijepay">PolijePay</option>
                                    <option value="gopay">Gopay</option>
                                    <option value="qris">Qris</option>
                                    <option value="transfer bank">Transfer Bank</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mt-0">
                                <p class="fw-bold">Nama Customer</p>
                                <p class="fw-bold" id="nama"></p>
                            </div>
                            <div class="d-flex justify-content-between mt-0">
                                <p class="fw-bold">Subtotal</p>
                                <input type="number" name="subtotal" id="subtotal"
                                    class="form-control input-bayar bg-white text-black " readonly value="0">
                            </div>
                            <div class="d-flex justify-content-between mt-0">
                                <p class="fw-bold">Diskon</p>
                                <input type="number" name="diskon" id="diskon"
                                    class="form-control input-bayar bg-white text-black" min="1" max="100"
                                    oninput="hitungTotal()" placeholder="0 %">
                            </div>
                            <div class="d-flex justify-content-between mt-0">
                                <p class="fw-bold">Total</p>
                                <input type="number" name="total" id="total"
                                    class="form-control input-bayar bg-white text-black" readonly
                                    value="{{ '0' }}">
                            </div>
                            <div class="d-flex
                                    justify-content-between mt-0">
                                <p class="fw-bold">Bayar</p>
                                <input type="number" name="bayar" id="bayar" oninput="hitungPembayaran()"
                                    class="form-control input-bayar" min="1" placeholder="Rp.0" required>
                            </div>
                            <div class="d-flex justify-content-between mt-0">
                                <p class="fw-bold">Kembali</p>
                                <input type="number" name="kembali" id="kembali"
                                    class="form-control input-bayar text-black bg-white" readonly placeholder="Rp.0">
                            </div>
                        </div>
                        <button type="submit" class="btn form-control text-white fw-bold" id="btn_save"
                            style="background: #51AADD; border-radius:10px">Simpan</button>
                        <a href="/kasir/hapussemua" id="linkhapussemua"
                            class="btn form-control mt-3  relative mt-0 text-white fw-bold" id="btn_clearAll"
                            style="background: #FF4A4F; border-radius:10px
                            ">Clear
                            All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function getMenu() {
            searching = $('#search-input').val();
            $.ajax({
                url: '/api/menus?q=' + searching,
                method: 'GET',
                // type: "POST",
                success: function(response) {
                    // response.preventDefault();
                    html = ''
                    response.data.forEach((item) => {
                        // console.log(data.item)
                        html += `<div class="col-md-3 mt-2">
                                            <div class="bungkus-menu bg-second bg-white"
                                            id="menu_luar"
                                                onclick="addCart(${item.id})" style="cursor: pointer; border-radius : 10px;">
                                                <img src="storage/${item.foto}" alt="" width="80px"
                                                    class="justify-content-center align-items-center mx-auto d-block p-2"
                                                    id="menu_dalam">
                                                <p class="m-0 text-center text-primary fw-bold" id="harga_menu">Rp
                                                    ${item.harga}</p>
                                                <p class="m-0 text-center" id="nama_menu" onclick="namamakanan(this.value)">
                                                    ${item.nama_menu}</p>
                                                <p class="text-primary fw-bold m-0 text-center" id="id_kantin"><small> <i>Kantin ${item.id_kantin} </i>
                                                    </small></p>
                                            </div>
                                        </div>`;
                    });

                    $('#data-menu').html(html);
                }
            });
        }
        getMenu();
    </script>
@endpush
