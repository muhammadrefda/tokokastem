@extends('admin.master')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="m-0 font-weight-bold text-primary">Daftar Produk</p>
            <hr>
            <a href="{{route('products.create')}}">tambah produk</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                    <tr>
                        <th>id </th>
                        <th>Nama Produk</th>
                        <th>Deskripsi Produk</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Bahan</th>
                        <th>size</th>
                        <th>status</th>
                        <th>Kategori</th>
                        <th>created at</th>
                        <td colspan="2">Action</td>
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
                                @if($product->image)
                                    <img src="{{asset('storage/'.$product->image)}}" width="70px">
                                @endif
                            </td>
                            <td>{{$product->material}}</td>
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
                                {{date('m-d', strtotime($product->created_at))}}
                            </td>
                            <td>
                                <a href="{{route('products.edit',$product->id)}} " class="btn btn-primary">edit</a>
                            </td>
                            <td>
                                <form action="{{route('products.destroy',$product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">hapus</button>
                                </form>
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

