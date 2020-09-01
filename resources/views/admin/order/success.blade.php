@extends('admin.master')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <p class="m-0 font-weight-bold text-primary">Daftar Transaksi</p>
                <hr>
{{--                <a href="{{route('products.create')}}">tambah produk</a>--}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jumlah Pembelian</th>
                            <th>Total</th>
                            <th>Status Transaksi</th>
                            <th>Telepon Customer</th>
                            <th>Provinsi Customer</th>
                            <th>Kota Customer</th>
                            <th>Kabupaten Customer</th>
                            <th>Alamat Customer</th>
                            <th>Kode Pos Customer</th>
                            <th>Bukti Transaksi</th>
                            <th>Product yg di pilih</th>
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
                                <td>
                                    {{$order->total}}
                                </td>
                                <td>
                                    {{$order->status}}
                                </td>
                                <td>{{$order->customer_phone}}</td>
                                <td>
                                    {{$order->customer_province}}
                                </td>
                                <td>
                                    {{$order->customer_city}}
                                </td>
                                <td>
                                    {{$order->customer_district}}
                                </td>
                                <td>
                                    {{$order->customer_address}}
                                </td>
                                <td>
                                    {{$order->customer_postal_code}}
                                </td>
                                <td>
                                    {{$order->proof_of_transaction}}
                                </td>
                                <td>
                                    {{date('m-d', strtotime($product->created_at))}}
                                </td>
                                <td>
{{--                                    <a href="{{route('products.edit',$product->id)}} " class="btn btn-primary">edit</a>--}}
                                </td>
{{--                                <td>--}}
{{--                                    <form action="{{route('products.destroy',$product->id)}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button class="btn btn-danger" type="submit">hapus</button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
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

