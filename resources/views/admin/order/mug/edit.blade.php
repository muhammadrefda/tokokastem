@extends('admin.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Status</h1>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Approach -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <form action="{{route('mug.order.update', $order->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
{{--                <div class="form-group">--}}
{{--                    <label for="title">Jumlah Pembelian</label>--}}
{{--                    <input type="text" class="form-control"  name="title" value="">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="description">link desain</label>--}}
{{--                    <input type="text" class="form-control" id="" name="description" value="">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="price">jenis kain</label>--}}
{{--                    <input type="text" class="form-control" id="" name="price" value="">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="material">Panjang Kain</label>--}}
{{--                    <input type="text" class="form-control" id="" name="material" value="">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="stock">Lebar Kain</label>--}}
{{--                    <input type="text" class="form-control" id="" name="stock" value="">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="size">Catatan</label>--}}
{{--                    <input type="text" class="form-control" id="" name="size" value="">--}}
{{--                </div>--}}

                <div class="form-group">
                    <label>Ubah Status Orderan</label>
                    <span class="aa-product-view-price"></span>
                    <select class="form-control" name="status">
                        <option value="{{$order->status}}">pending</option>
                        <option value="Berhasil">Berhasil</option>
                    </select>
                </div>

                <div class="form-group">
{{--                    <label for="category">category</label>--}}
                    <input type="text" hidden class="form-control" id="" name="category" value="{{$order->category}}">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Ubah Status</button>

            </form>
        </div>
    </div>
@endsection

