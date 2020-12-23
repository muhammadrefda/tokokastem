@extends('admin.master')

@section('content')
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h2 class="coloring">Edit Status</h2>
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
                    <div class="form-group">
                        <label>Ubah Status Orderan</label>
                        <span class="aa-product-view-price"></span>
                        <select class="form-control" name="status">
                            <option value="Pending">pending</option>
                            <option value="On Progress">On Progress</option>
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

    </div>
@endsection

