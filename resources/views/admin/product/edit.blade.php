@extends('admin.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Produk</h1>
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
            <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control"  name="title" value="{{$product->title}}">
                </div>

                <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" class="form-control" id="" name="description" value="{{$product->description}}">
                </div>

                <div class="form-group">
                    <label for="price">price</label>
                    <input type="text" class="form-control" id="" name="price" value="{{$product->price}}">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    @if($product->image)
                        <img
                            src="{{asset('public/img/product'.$product->image)}}"
                            width="120px"
                            height="70"
                            alt=""/>
                        <br>
                        <input
                            id="image"
                            type="file"
                            name="image"
                            class="form-control"
                            value="{{$product->image}}">
                        <span class="text-danger">{{$errors->first('image')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="material">bahan</label>
                    <input type="text" class="form-control" id="" name="material" value="{{$product->material}}">
                </div>

                <div class="form-group">
                    <label for="stock">stock</label>
                    <input type="text" class="form-control" id="" name="stock" value="{{$product->stock}}">
                </div>

                <div class="form-group">
                    <label for="size">size</label>
                    <input type="text" class="form-control" id="" name="size" value="{{$product->size}}">
                </div>

                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" class="form-control" id="" name="status" value="{{$product->status}}">
                </div>

                <div class="form-group">
                    <label for="category">category</label>
                    <input type="text" class="form-control" id="" name="category" value="{{$product->category}}">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>

            </form>
        </div>
    </div>
@endsection

