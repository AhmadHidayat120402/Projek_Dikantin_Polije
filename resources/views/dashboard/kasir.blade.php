@extends('main')
@section('content')
    <div class="container-fluid mt-0">
        <div class="row d-flex justify-content-between">
            <div class="col-md-8 m-0">
                <div class="row mt-2">
                    <div class="col-md-3">
                        <input type="text" placeholder="ID Customer" class="form-control" name="q"
                            style="border-radius: 10px;" id="id_customer">
                    </div>
                    <input type="hidden" id="inputid">
                    {{-- <div id="result"></div> --}}
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
            <div class="col-md-4 mt-2 pb-2 pt-2" style="background: white; border-radius:10px;">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="d-flex justify-content-between">
                            <h5 class="text-left fw-bold d-inline m-0">ORDER <span hidden id="orderid"></span></h5>
                            <p class="m-0">{{ date('Y-m-d') }}</p>
                            {{-- <hr style="height: 2px"> --}}
                        </div>
                        <hr style="height: 2px">
                        <div id="cart">
                            {{-- <div class="cart-menu row align-items-center mt-3">
                                <div class="col-md-4">
                                    <p class="m-0 text-dark">Nasi Goreng</p>
                                    <p class="m-0 text-secondary">Rp 12.000</p>
                                </div>
                                <div class="col-5">
                                    <div class="d-flex align-items-center justify-content-end gap-3">
                                        <p class="m-0">x1</p>
                                        <input type="number" class="form-control border-0 bg-white" placeholder="0%"
                                            required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="d-flex align-items-center justify-content-end gap-1">
                                    <button type="button" class="btn btn-light" style="border: 20px;">-</button>
                                        <button type="button" class="btn btn-light" style="border: 20px;">+</button>
                                        
                                        <button type="button" class="btn btn-danger" id="btn_hapus" style="border: 20px;">
                                            <i class="fa-solid fa-trash-can text-white"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr style="height: 2px">
                            </div> --}}

                        </div>
                        <input type="hidden" name="id_penjualan" id="id_penjualan">
                        <div class="input-group mb-3 mt-3 no_meja">
                            <span class="input-group-text" id="no_meja">No Meja</span>
                            <input type="number" class="form-control" placeholder="10" aria-label="Username"
                                aria-describedby="basic-addon1" name="no_meja" required>
                        </div>
                        <div class="mb-3">
                            <div class="metode-pembayaran mt-0">
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
                                <p class="fw-bold" id="nama_tampil"></p>
                            </div>
                            <div class="d-flex justify-content-between mt-0">
                                <p class="fw-bold">Subtotal</p>
                                <input type="number" name="subtotal" id="subtotal"
                                    class="form-control input-bayar bg-white text-black " readonly value="0" required>
                            </div>
                            <div class="d-flex justify-content-between mt-0">
                                <p class="fw-bold">Diskon</p>
                                <input type="number" name="diskon" id="diskon" onchange="allDiscount(this)"
                                    class="form-control input-bayar bg-white text-black" min="1" max="100"
                                    placeholder="0 %" required>
                            </div>
                            {{-- oninput="hitungTotal()" --}}
                            <div class="d-flex justify-content-between mt-0">
                                <p class="fw-bold">Total</p>
                                <input type="number" name="total" id="total"
                                    class="form-control input-bayar bg-white text-black" readonly
                                    value="{{ '0' }}" required>
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
                        <button type="submit" class="btn btn-simpan form-control text-white fw-bold" id="btn_save"
                            " onclick="simpanAll()">Simpan</button>
                        <a href="javascript:void(0);" id="linkhapussemua"
                            class="btn btn-clearall form-control mt-2  relative mt-0 text-white fw-bold" id="btn_clearAll"
                            onclick="location.reload()"
                            >Clear
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

        // function submitForm() {
        //     const idCustomerInput = document.getElementById("id_customer");

        //     if (idCustomerInput.value === "") {
        //         alert("ID Customer harus diisi!");
        //         return false;
        //     }

        //     // kode lain untuk mengirim formulir
        //     }

        function savePenjualan() {
            let customer_id = $('#inputid').val();
            // let cashier = $('#kantin').val();
            let cashier = '1';
            // console.log(customer_id);
            $.ajax({
                url: "{{ route('penjualan.save') }}",
                type: "POST",
                // method: "POST",
                data: {
                    id_customer: customer_id,
                    id_kasir: cashier,
                },
                success: function(response) {
                    $('#orderid').text(response.orderid);
                    $('#id_penjualan').val(response.orderid);
                    const linkhapussemua = document.getElementById('linkhapussemua');
                    linkhapussemua.href = '/kasir/hapussemua/' + response.orderid
                    $('#submitPenjualan').attr('disabled', true);
                    alert('Berhasil! Silahkan memilih makanan')
                }
            })
        }

        function addCart(id) {
            let id_menu = id;
            $.ajax({
                url: "/api/penjualan/save",
                type: "POST",
                method: "POST",
                data: {
                    id_menu: id_menu,
                    id_kantin: $('#id_kantin').val(),
                    id_customer: $('#inputid').val(),
                    id_kasir: '{{ Auth::user()->id }}',
                    // id_penjualan: $('#orderid').text()
                },
                success: function(response) {
                    showCart(response.orderid)
                }
            })
        }

        function showCart(element) {
            // $.ajax({
            //     url: "http://127.0.0.1:8000/api/cart/" + id,
            //     type: "GET",
            //     method: "GET",
            // }).then(function(response) {
            //     html = '';
            //     subtotal = 0
            //     response.forEach((item) => {
            //         console.log(item.harga);
            //         subtotal += item.harga;
            //         html +=
            //             `<div class="cart-menu row align-items-center mt-3">
        //                     <div class="col-md-4">
        //                         <p class="m-0 text-dark">${item.nama_menu}</p>
        //                         <p class="m-0 text-secondary">${iem.harga}</p>
        //                     </div>
        //                     <div class="col-5">
        //                         <div class="d-flex align-items-center justify-content-end gap-3">
        //                             <p class="m-0">1x</p>
        //                             <input type="number" class="form-control border-0 bg-white" placeholder="0%"
        //                                 required>
        //                         </div>
        //                     </div>
        //                     <div class="col-3">
        //                         <div class="d-flex align-items-center justify-content-end gap-1">
        //                             <button type="button" class="btn btn-light" style="border: 20px;">+</button>
        //                             <button type="button" class="btn btn-light" style="border: 20px;">-</button>
        //                             <button type="button" class="btn btn-danger" id="btn_hapus" style="border: 20px;">
        //                                 <i class="fa-solid fa-trash-can text-white"></i>
        //                             </button>
        //                         </div>
        //                     </div>
        //                     <hr style="height: 2px">
        //                 </div>`
            //     })
            //     $('#cart').html(html)
            //     $('#subtotal').val(subtotal)
            // });

            let id = $(element).data('id');
            let cart = $('.cart-menu');
            let isThere = false;
            for (let i = 0; i < cart.length; i++) {
                if (id == $(cart[i]).data('id')) {
                    isThere = true;
                }
            }

            if (!isThere) {
                let nama = $(element).data('nama')
                let harga = $(element).data('harga')
                let html = `<div class="cart-menu row align-items-center mt-3" data-id="${id}">
                                <div class="col-md-4">
                                    <p class="m-0 text-dark">${nama}</p>
                                    <p class="m-0 text-secondary subtotal-item">${harga}</p>
                                    <p class="d-none item-price">${harga}</p>
                                </div>
                                <div class="col-5">
                                    <div class="d-flex align-items-center justify-content-end gap-3">
                                        <p class="m-0">x<span class="qty">1</span></p>
                                        <input type="number" data-id="${id}" class="form-control border-0 bg-white" placeholder="0%" onchange="discountPerItem(this)">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="d-flex align-items-center justify-content-end gap-1">
                                        <button type="button" data-id="${id}" class="btn btn-light btn-kurang-qty" onclick="reduceQty(this)" style="border: 20px;">-</button>
                                        <button type="button" data-id="${id}" class="btn btn-light btn-tambah-qty" onclick="addQty(this)" style="border: 20px;">+</button>
                                        <button type="button" data-id="${id}" class="btn btn-danger btn-hapus-cart" onclick="deleteCartItem(this)" id="btn_hapus" style="border: 20px;">
                                            <i class="fa-solid fa-trash-can text-white"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr style="height: 2px">
                            </div>`

                $('#cart').append(html)
                total()
            } else {
                let qty = $(`.cart-menu[data-id="${id}"]`).find(`span.qty`).html()
                // console.log($(`.cart-menu[data-id="${id}"]`).find(`span.qty`).html());
                $(`.cart-menu[data-id="${id}"]`).find(`span.qty`).html(parseInt(qty) + 1)
                subtotalPerItem(element, parseInt(qty) + 1)
                discountPerItem(element)
                total()
            }
        }

        function addQty(element) {
            let id = $(element).data('id');
            let qty = $(`.cart-menu[data-id="${id}"]`).find(`span.qty`).html()
            $(`.cart-menu[data-id="${id}"]`).find(`span.qty`).html(parseInt(qty) + 1)
            subtotalPerItem(element, parseInt(qty) + 1)
            discountPerItem(element)
            total()
        }

        function reduceQty(element) {
            let id = $(element).data('id');
            let qty = $(`.cart-menu[data-id="${id}"]`).find(`span.qty`).html()

            if (parseInt(qty) - 1 <= 0) {
                deleteCartItem(element);
            } else {
                $(`.cart-menu[data-id="${id}"]`).find(`span.qty`).html(parseInt(qty) - 1)
                subtotalPerItem(element, parseInt(qty) - 1)
                discountPerItem(element)
                total()
            }
        }

        function deleteCartItem(element) {
            let id = $(element).data('id');

            $(`.cart-menu[data-id="${id}"]`).remove();
            total()
        }

        function subtotalPerItem(element, quantity) {
            let id = $(element).data('id');

            let harga = $(`.cart-menu[data-id="${id}"]`).find(`.item-price`).html()
            $(`.cart-menu[data-id="${id}"]`).find(`.subtotal-item`).html(parseInt(harga) * parseInt(quantity))
        }

        function discountPerItem(element) {
            let id = $(element).data('id');
            let discount = $(`.cart-menu[data-id="${id}"]`).find('input').val();
            if (discount == null || discount == NaN || !discount) {
                discount = 0
            }
            let qty = $(`.cart-menu[data-id="${id}"]`).find(`span.qty`).html()
            let harga = $(`.cart-menu[data-id="${id}"]`).find(`.item-price`).html()
            let subtotal = parseInt(harga) * parseInt(qty)

            let totalDiscount = Math.ceil((parseInt(discount) / 100) * parseInt(subtotal));

            $(`.cart-menu[data-id="${id}"]`).find(`.subtotal-item`).html(parseInt(subtotal) - parseInt(totalDiscount))
            total()
        }

        function total() {
            let cart = $('.cart-menu');
            let total = 0;
            for (let i = 0; i < cart.length; i++) {
                total += parseInt($(cart[i]).find('.subtotal-item').html())
            }

            $('input#subtotal').val(total)
        }

        function allDiscount(element) {
            let discount = $(element).val();
            let subtotal = $('input#subtotal').val()

            let totalDiscount = Math.ceil((discount / 100) * subtotal);
            $('input#total').val(subtotal - totalDiscount);
        }

        function hitungPembayaran(element) {
            let discount = $('#diskon').val();
            if (discount == null || discount == NaN || !discount) {
                bayar = $('#bayar').val();
                subtotal = $('input#subtotal').val();
                kembalian = bayar - subtotal;
                $('#kembali').val(kembalian);
            } else {
                bayar = $('#bayar').val();
                total = $('#total').val();
                kembalian = bayar - total;
                $('#kembali').val(kembalian);
            }
        }

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
                        html += `<div class="col-md-3 mt-2 pb-2">
                                    <div id="menu_luar" class="bungkus-menu bg-second bg-white" style="cursor: pointer; border-radius : 10px;" data-nama="${item.nama_menu}" data-harga="${item.harga}" data-id="${item.id}" onclick="showCart(this)">
                                    <img src="public/storage/${item.foto}" alt="" width="80px"
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


        $(document).ready(function() {
            // inisialisasi event onchange pada element dengan id id_custmer
            $('#id_customer').on('change', function() {
                const value = $(this).val();

                // tinggal buat request ajxnya disini
                // saran mending matiin aja fitur auto save bikin lemot
                $.ajax({
                    url: '/api/customer/get-by-id-customer?id_customer=' + value,
                    method: 'GET',
                    success: function(res) {
                        // respon disini sama dengan respon yang ada di postman
                        // jadi kalo mau akses data nama ya tinggal res.data.nama
                        // sebenere konsepe sama sih, tinggal alure mau gimana, kalo menu itu kan nambah berarti insert  data, ya tinggal buat backendnya dulu
                        const customer = res.data;
                        $('#inputid').val(customer.id);
                        $('#inputnama').val(
                            customer.nama);
                        // = $('inputnama').val(res.data.nama)
                        $('#inputalamat').val(customer.alamat);
                        $('#inputtelepon').val(customer.no_telepon);
                        $('#nama_tampil').html(customer.nama);
                    }
                })
            });

            // $('.bungkus-menu').on('click', function(e) {
            //     alert("oi")
            // })

        });





        function simpanAll() {
            let details = [];

            let cart = $('.cart-menu');
            for (let i = 0; i < cart.length; i++) {
                details.push({
                    id_menu: $(cart[i]).data('id'),
                    jumlah: parseInt($(cart[i]).find(`span.qty`).html()),
                    harga: parseInt($(cart[i]).find(`.item-price`).html()),
                    diskon: $(cart[i]).find(`input`).val(),
                })
            }

            // console.log({
            //     id_customer: $('#inputid').val(),
            //     id_kasir: '{{ Auth::user()->id }}',
            //     subtotal: $('#subtotal').val(),
            //     diskon: $('#diskon').val(),
            //     total: $('#total').val(),
            //     bayar: $('#bayar').val(),
            //     model_pembayaran: $('select[name="model_pembayaran"] option:selected').val(),
            //     no_meja: $('input[name="no_meja"]').val(),
            //     details: details
            // });

            $.ajax({
                url: "/api/penjualan/save",
                type: "POST",
                method: "POST",
                data: {
                    id_customer: $('#inputid').val(),
                    id_kasir: '{{ Auth::user()->id }}',
                    subtotal: $('#subtotal').val(),
                    diskon: $('#diskon').val(),
                    total: $('#total').val(),
                    bayar: $('#bayar').val(),
                    model_pembayaran: $('select[name="model_pembayaran"] option:selected').val(),
                    no_meja: $('input[name="no_meja"]').val(),
                    details: details
                },
                success: function(response) {
                    if (response.status == true) {
                        alert(response.message);
                        location.reload();
                    }
                }
            })
        }
    </script>
@endpush
