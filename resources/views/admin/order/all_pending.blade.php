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
                    @foreach($fabrics as $fabric)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$fabric->quantity}}</td>
                            <td>{{$fabric->unique_code}}</td>
                            <td style="column-width: 50rem;">
                                <a target="_blank"
                                    href="{{$fabric->link_goggle_drive}}">Klik Link Desain Disini</a></td>
                            <td>{{$fabric->type_fabric}}</td>
                            <td style="column-width: auto;">{{$fabric->note}}</td>
                            <td>{{$fabric->name}}</td>
                            <td>{{$fabric->address}}</td>
                            <td>{{$fabric->phone_number}}</td>
                            <td>{{date('m-d', strtotime($fabric->created_at))}}</td>
                            <td>
                                <a href="{{route('fabric.order.edit',['order' => $fabric->id])}}" class="btn btn-primary">edit</a>
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

                    @foreach($masks as $mask)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$mask->quantity}}</td>
                            <td>{{$mask->unique_code}}</td>
                            <td>@if($mask->design_mask)
                                    <iframe src="{{asset('storage/' .$mask->design_mask)}}" ></iframe>
                                @endif</td>
                            <td>{{$mask->size}}</td>
                            <td>{{$mask->material}}</td>
                            <td>{{$mask->note}}</td>
                            <td>{{$mask->name}}</td>
                            <td>{{$mask->address}}</td>
                            <td>{{$mask->phone_number}}</td>
                            <td>{{date('m-d', strtotime($mask->created_at))}}</td>
                            <td>
                                <a href="{{route('mask.order.edit',['order' => $mask->id])}}" class="btn btn-primary">edit</a>
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
                    @foreach($mugs as $mug)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$mug->quantity}}
                            </td>
                            <td>{{$mug->unique_code}}</td>
                            <td>
                                @if($mug->design_front_mug)
                                    <iframe src="{{asset('storage/' .$mug->design_front_mug)}}" ></iframe>
                                @endif
                            </td>
                            <td>
                                @if($mug->design_back_mug)
                                    <iframe src="{{asset('storage/' .$mug->design_back_mug)}}" ></iframe>
                                @endif
                            </td>
                            <td>{{$mug->size}}</td>
                            <td>
                                {{$mug->material}}
                            </td>
                            <td>
                                {{$mug->note}}
                            </td>
                            <td>
                                {{$mug->name}}
                            </td>
                            <td>
                                {{$mug->address}}
                            </td>
                            <td>{{$mug->phone_number}}</td>

                            <td>
                                {{date('m-d', strtotime($mug->created_at))}}
                            </td>
                            <td>
                                <a href="{{route('mug.order.edit',['order' => $mug->id])}}" class="btn btn-primary">edit</a>
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
                    @foreach($totebags as $totebag)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$totebag->quantity}}</td>
                            <td>{{$totebag->unique_code}}</td>
                            <td>
                                @if($totebag->design_front_totebag)
                                    <iframe src="{{asset('storage/' .$totebag->design_front_totebag)}}" ></iframe>
                                @endif
                            </td>
                            <td>
                                @if($totebag->design_back_totebag)
                                    <iframe src="{{asset('storage/' .$totebag->design_back_totebag)}}" ></iframe>
                                @endif
                            </td>
                            <td>{{$totebag->size}}</td>
                            <td>{{$totebag->material}}</td>
                            <td>{{$totebag->note}}</td>
                            <td>{{$totebag->name}}</td>
                            <td>{{$totebag->address}}</td>
                            <td>{{$totebag->phone_number}}</td>
                            <td>{{date('m-d', strtotime($totebag->created_at))}}</td>
                            <td>
                                <a href="{{route('totebag.order.edit',['order' => $totebag->id])}}" class="btn btn-primary">edit</a>
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
                    @foreach($tshirts as $tshirt)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$tshirt->quantity}}</td>
                            <td>{{$tshirt->unique_code}}</td>
                            <td>
                                @if($tshirt->design_front_tshirt)
                                    <iframe src="{{asset('storage/' .$tshirt->design_front_tshirt)}}" ></iframe>
                                @endif
                            </td>
                            <td>
                                @if($tshirt->design_back_tshirt)
                                    <iframe src="{{asset('storage/' .$tshirt->design_back_tshirt)}}" ></iframe>
                                @endif
                            </td>
                            <td>{{$tshirt->size}}</td>
                            <td>
                                {{$tshirt->material}}
                            </td>
                            <td>
                                {{$tshirt->note}}
                            </td>
                            <td>
                                {{$tshirt->name}}
                            </td>
                            <td>
                                {{$tshirt->address}}
                            </td>
                            <td>{{$tshirt->phone_number}}</td>
                            <td>
                                {{date('m-d', strtotime($tshirt->created_at))}}
                            </td>
                            <td>
                                <a href="{{route('tshirt.order.edit',['order' => $tshirt->id])}}" class="btn btn-primary">edit</a>
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
                    @foreach($backpacks as $order)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$order->quantity}}
                            </td>
                            <td>{{$order->unique_code}}</td>
                            <td>
                                @if($order->design_backpack)
                                    <iframe src="{{asset('storage/' .$order->design_backpack)}}" ></iframe>
                                @endif
                            </td>
                            <td>{{$order->size}}</td>
                            <td>
                                {{$order->material}}
                            </td>
                            <td>
                                {{$order->note}}
                            </td>
                            <td>
                                {{$order->name}}
                            </td>
                            <td>
                                {{$order->address}}
                            </td>
                            <td>{{$order->phone_number}}</td>
                            <td>
                                {{date('m-d', strtotime($order->created_at))}}
                            </td>
                            <td>
                                <a href="{{route('bag.order.edit',['order' => $order->id])}}" class="btn btn-primary">edit</a>
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
