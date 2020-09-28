@extends('admin.master')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2 class="m-0 font-weight-bold text-primary">Daftar Orderan Masker</h2>
                <br>
                <h3 class="m-0 font-weight-bold text-primary">Status: Berhasil</h3>
            </div>
            <div class="card-body">
                <p>Untuk mendownload gambar desain, silahkan klik kanan pada kolom desain</p>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jumlah Pembelian</th>
                            <th>Kode Pembayaran</th>

                            <th>Desain Kiri Masker</th>
                            <th>Desain Kanan Masker</th>
                            <th>Ukuran Masker</th>
                            <th>Bahan Masker</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th>Nama Pembeli</th>
                            <th>Alamat Pengiriman</th>
                            <th>No. Hp Pembeli</th>

                            <th>Tanggal Transaksi</th>
                            <td colspan="2">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$order->quantity}}
                                </td>
                                <td>{{$order->unique_code}}</td>

                                <td>
                                    @if($order->design_left_mask)
                                        <iframe src="{{asset('storage/' .$order->design_left_mask)}}" ></iframe>
                                    @endif
                                </td>
                                <td>
                                    @if($order->design_right_mask)
                                        <iframe src="{{asset('storage/' .$order->design_right_mask)}}"></iframe>
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
                                    {{$order->status}}
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
                                    <a href="{{route('mask.order.edit',['order' => $order->id])}}" class="btn btn-primary">edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

