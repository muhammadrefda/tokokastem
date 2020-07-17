@extends('admin.master')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="m-0 font-weight-bold text-primary">manage product</p>
            <hr>
            <a href="{{route('product.create')}}">tambah produk</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id </th>
                        <th>title</th>
                        <th>description</th>
                        <th>price</th>
                        <th>image</th>
                        <th>size</th>
                        <th>status</th>
                        <th>category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                {{$product->id}}
                            </td>
                            <td>
                                {{$product->title}}
                            </td>
                            <td>
                                {{$product->description}}
                            </td>
                            <td>
                            Rp{{$product->price}},-
                            </td>
                            <td>
                                {{$product->image}}
                            </td>
                            <td>
                                {{$product->size}}
                            </td>
                            <td>
                                {{$product->status}}
                            </td>
                            <td>
                                {{$product->category}}
                            </td>
                            <td>
                                <button class="btn btn-outline-success">
                                    Ubah
                                </button>
                                <hr>
                                <button class="btn btn-outline-danger">
                                    <a href="{{route('product.destroy', $product->id)}}">Hapus</a>

                                </button>
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
