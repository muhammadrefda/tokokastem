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
            <form action="{{route('totebag.order.update', $order->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Ubah Status Orderan</label>
                    <span class="aa-product-view-price"></span>
                    <select class="form-control" name="status">
                        <option value="{{$order->status}}">{{$order->status}}</option>
                        <option value="Pending">Pending</option>
                        <option value="On Progress">On Progress</option>
                        <option value="Berhasil">Berhasil</option>
                    </select>
                </div>
                <input type="text" hidden class="form-control" id="" name="category" value="{{$order->category}}">

                <button type="submit" name="submit" class="btn btn-primary">Ubah Status</button>

            </form>
        </div>
    </div>
@endsection

