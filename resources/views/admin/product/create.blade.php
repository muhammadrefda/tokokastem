@extends('admin.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Approach -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">

            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label>deskripsi produk</label>
                    <textarea type="text" class="form-control" name="description" required> </textarea>
                </div>
                <div class="form-group">
                    <label>harga</label>
                    <input type="text" class="form-control" name="price" placeholder="Contoh: 20000" required>
                </div>

                <div class="form-group">
                    <label>Gambar Produk</label>
                    <input
                        required
                        type="file"
                        class="form-control"
                        name="image"/>
                </div>

                <div class="form-group">
                    <label>Bahan Produk</label>
                    <input type="text" class="form-control" name="material" required>
                </div>

                <br>
                <div class="form-group">
                    <label>Pilih Size</label>
                    <label>
                        <select class="form-control" name="size">
                            <option value="All Size">All Size</option>
                            <option value="S">S</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="XL">XL</option>
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label>Pilih Status</label>
                    <label>
                        <select class="form-control" name="status">
                            <option value="Available">Tersedia</option>
                            <option value="Unavailable">Belum Tersedia</option>
                        </select>
                    </label>
                    <div class="form-group">
                        <label>Pilih Kategori</label>
                        <label>
                            <select class="form-control" name="category">
                                <option value="mug">Mug</option>
                                <option value="tas">Tas</option>
                                <option value="kain">Kain</option>
                                <option value="totebag">Tote bag</option>
                                <option value="masker">Masker</option>
                                <option value="tshirt">T-shirt</option>
                            </select>
                        </label>
                    </div>
                <input type="submit" name="submit" class="btn btn-primary" value="save">
                </div>
            </form>
        </div>
    </div>
@endsection

