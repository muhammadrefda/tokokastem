@extends('admin.master')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="text-primary">Daftar Orderan Kain</h2>
            <h4 class="m-0 font-weight-bold text-primary">Status: <b> Pending</b></h4>
        </div>
        <div class="card-body">
            <p>Untuk mendownload gambar desain, silahkan klik kanan pada kolom desain</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr class="table-success">
                        <th scope="col">No</th>
                        <th>Jumlah Pembelian</th>
                        <th>Kode Pembayaran</th>
                        <th>Link Desain</th>
                        <th>Jenis Kain</th>
                        <th>Catatan</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat Pengiriman</th>
                        <th>No. Hp Pembeli</th>
                        <th>Tanggal Transaksi</th>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fabrics as $product)
                        <tr>
{{--                            {{$loop->iteration}}--}}
                        <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->unique_code}}</td>
                            <td style="column-width: 50rem;">
                                <a target="_blank"
                                    href="{{$product->link_goggle_drive}}">Klik Link Desain Disini</a></td>
                            <td>{{$product->type_fabric}}</td>
                            <td style="column-width: auto;">{{$product->note}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->address}}</td>
                            <td>{{$product->phone_number}}</td>
                            <td>{{date('m-d', strtotime($product->created_at))}}</td>
                            <td>
                                <a href="{{route('fabric.order.edit',$product->id)}}" class="btn btn-primary">edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $fabrics->links() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="text-primary">Daftar Orderan Masker</h2>
            <h4 class="m-0 font-weight-bold text-primary">Status: <b> Pending</b></h4>
        </div>
        <div class="card-body">
            <p>Untuk mendownload gambar desain, silahkan klik kanan pada kolom desain</p>
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Jumlah Pembelian</th>
                        <th>Kode Pembayaran</th>
                        <th>Desain Masker</th>
                        <th>Ukuran Masker</th>
                        <th>Bahan Masker</th>
                        <th>Catatan</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat Pengiriman</th>
                        <th>No. Hp Pembeli</th>
                        <th>Tanggal Transaksi</th>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($masks as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->unique_code}}</td>
                            <td>@if($product->design_mask)
                                    <iframe src="{{asset('storage/' .$product->design_mask)}}" ></iframe>
                                @endif</td>
                            <td>{{$product->size}}</td>
                            <td>{{$product->material}}</td>
                            <td>{{$product->note}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->address}}</td>
                            <td>{{$product->phone_number}}</td>
                            <td>{{date('m-d', strtotime($product->created_at))}}</td>
                            <td>
                                <a href="{{route('mask.order.edit',$product->id)}}" class="btn btn-primary">edit</a>
                            </td>
</tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$masks->links()}}
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="text-primary">Daftar Orderan Mug</h2>
            <h4 class="m-0 font-weight-bold text-primary">Status: <b> Pending</b></h4>
        </div>
        <div class="card-body">
            <p>Untuk mendownload gambar desain, silahkan klik kanan pada kolom desain</p>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead class="table-primary">
                    <tr>
                        <th>No.</th>
                        <th>Jumlah Pembelian</th>
                        <th>Kode Pembayaran</th>
                        <th>Desain Depan Mug</th>
                        <th>Desain Belakang Mug</th>
                        <th>Ukuran Mug</th>
                        <th>Bahan Mug</th>
                        <th>Catatan</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat Pengiriman</th>
                        <th>No. Hp Pembeli</th>
                        <th>Tanggal Transaksi</th>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mugs as $product)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$product->quantity}}
                            </td>
                            <td>{{$product->unique_code}}</td>
                            <td>
                                @if($product->design_front_mug)
                                    <iframe src="{{asset('storage/' .$product->design_front_mug)}}" ></iframe>
                                @endif
                            </td>
                            <td>
                                @if($product->design_back_mug)
                                    <iframe src="{{asset('storage/' .$product->design_back_mug)}}" ></iframe>
                                @endif
                            </td>
                            <td>{{$product->size}}</td>
                            <td>
                                {{$product->material}}
                            </td>
                            <td>
                                {{$product->note}}
                            </td>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                {{$product->address}}
                            </td>
                            <td>{{$product->phone_number}}</td>

                            <td>
                                {{date('m-d', strtotime($product->created_at))}}
                            </td>
                            <td>
                                <a href="{{route('mug.order.edit', $product->id)}}" class="btn btn-primary">edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$mugs->links()}}
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="text-primary">Daftar Orderan Totebag</h2>
            <h4 class="m-0 font-weight-bold text-primary">Status: <b> Pending</b></h4>
        </div>
        <div class="card-body">
            <p>Untuk mendownload gambar desain, silahkan klik kanan pada kolom desain</p>
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead style="background-color: cyan">
                    <tr>
                        <th>No.</th>
                        <th>Jumlah Pembelian</th>
                        <th>Kode Pembayaran</th>
                        <th>Desain Depan Totebag</th>
                        <th>Desain Belakang Totebag</th>
                        <th>Ukuran Totebag</th>
                        <th>Jenis Bahan</th>
                        <th>Catatan</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat Pengiriman</th>
                        <th>No. Hp Pembeli</th>
                        <th>Tanggal Transaksi</th>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($totebags as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->unique_code}}</td>
                            <td>
                                @if($product->design_front_totebag)
                                    <iframe src="{{asset('storage/' .$product->design_front_totebag)}}" ></iframe>
                                @endif
                            </td>
                            <td>
                                @if($product->design_back_totebag)
                                    <iframe src="{{asset('storage/' .$product->design_back_totebag)}}" ></iframe>
                                @endif
                            </td>
                            <td>{{$product->size}}</td>
                            <td>{{$product->material}}</td>
                            <td>{{$product->note}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->address}}</td>
                            <td>{{$product->phone_number}}</td>
                            <td>{{date('m-d', strtotime($product->created_at))}}</td>
                            <td>
                                <a href="{{route('totebag.order.edit', $product->id)}}" class="btn btn-primary">edit</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$totebags->links()}}
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="text-primary">Daftar Orderan T-Shirt</h2>
            <h4 class="m-0 font-weight-bold text-primary">Status: <b> Pending</b></h4>
        </div>
        <div class="card-body">
            <p>Untuk mendownload gambar desain, silahkan klik kanan pada kolom desain</p>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead style="background-color: #fffe3f">
                    <tr>
                        <th>No.</th>
                        <th>Jumlah Pembelian</th>
                        <th>Kode Pembayaran</th>
                        <th>Desain Depan Kaos</th>
                        <th>Desain Belakang Kaos</th>
                        <th>Ukuran Kaos</th>
                        <th>Jenis Bahan</th>
                        <th>Catatan</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat Pengiriman</th>
                        <th>No. Hp Pembeli</th>
                        <th>Tanggal Transaksi</th>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tshirts as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->unique_code}}</td>
                            <td>
                                @if($product->design_front_tshirt)
                                    <iframe src="{{asset('storage/' .$product->design_front_tshirt)}}" ></iframe>
                                @endif
                            </td>
                            <td>
                                @if($product->design_back_tshirt)
                                    <iframe src="{{asset('storage/' .$product->design_back_tshirt)}}" ></iframe>
                                @endif
                            </td>
                            <td>{{$product->size}}</td>
                            <td>{{$product->material}}</td>
                            <td>{{$product->note}}
                            </td>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                {{$product->address}}
                            </td>
                            <td>{{$product->phone_number}}</td>
                            <td>
                                {{date('m-d', strtotime($product->created_at))}}
                            </td>
                            <td>
                                <a href="{{route('tshirt.order.edit', $product->id)}}" class="btn btn-primary">edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$tshirts->links()}}
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="text-primary">Daftar Orderan Tas</h2>
            <h4 class="m-0 font-weight-bold text-primary">Status: <b> Pending</b></h4>
        </div>
        <div class="card-body">
            <p>Untuk mendownload gambar desain, silahkan klik kanan pada kolom desain</p>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead style="background-color: #35ff2f">
                    <tr>
                        <th>No.</th>
                        <th>Jumlah Pembelian</th>
                        <th>Kode Pembayaran</th>
                        <th>Desain Tas</th>
                        <th>Ukuran Tas</th>
                        <th>Bahan Tas</th>
                        <th>Catatan</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat Pengiriman</th>
                        <th>No. Hp Pembeli</th>
                        <th>Tanggal Transaksi</th>
                        <td colspan="2">Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($backpacks as $product)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$product->quantity}}
                            </td>
                            <td>{{$product->unique_code}}</td>
                            <td>
                                @if($product->design_backpack)
                                    <iframe src="{{asset('storage/' .$product->design_backpack)}}" ></iframe>
                                @endif
                            </td>
                            <td>{{$product->size}}</td>
                            <td>
                                {{$product->material}}
                            </td>
                            <td>
                                {{$product->note}}
                            </td>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                {{$product->address}}
                            </td>
                            <td>{{$product->phone_number}}</td>
                            <td>
                                {{date('m-d', strtotime($product->created_at))}}
                            </td>
                            <td>
                                <a href="{{route('bag.order.edit', $product->id)}}" class="btn btn-primary">edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{$backpacks->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
