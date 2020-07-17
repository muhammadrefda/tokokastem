@extends('admin.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Approach -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="" name="title">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <textarea type="text" class="form-control" id="" name="description"> </textarea>
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="text" class="form-control" id="" name="price">
                </div>

                <div class="form-group">
                <label id="">Image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" id="customFile">Select image</label>
                </div>
                </div>

                <div class="form-group">
                    <label for="stock">stock</label>
                    <input type="text" class="form-control" id="" name="stock">
                </div>
                <br>
                <div class="form-check">
                    <label for="">Pilih Size</label> <br>
                    <input type="checkbox" name="size1" id="size1" class="form-check-input">
                    <label for="size1" class="form-check-label">S</label><br>
                    <input type="checkbox" name="size2" id="size2" class="form-check-input">
                    <label for="size2" class="form-check-label">L</label><br>
                    <input type="checkbox" name="size3" id="size3" class="form-check-input">
                    <label for="size3" class="form-check-label">M</label><br>
                    <input type="checkbox" name="size4" id="size4" class="form-check-input">
                    <label for="size4" class="form-check-label">XL</label><br>
                </div>
                <br>
                <div class="form-check">
                    <label for="">Pilih Status</label> <br>
                    <input type="checkbox" name="size1" id="size1" class="form-check-input">
                    <label for="size1" class="form-check-label">Available</label><br>
                    <input type="checkbox" name="size2" id="size2" class="form-check-input">
                    <label for="size2" class="form-check-label">Unavailable</label><br>
                </div>
                <br>
                <div class="form-check">
                    <label for="">Pilih Kategory</label> <br>
                    <input type="checkbox" name="size1" id="size1" class="form-check-input">
                    <label for="size1" class="form-check-label">Mug</label><br>
                    <input type="checkbox" name="size2" id="size2" class="form-check-input">
                    <label for="size2" class="form-check-label">Tas</label><br>
                    <input type="checkbox" name="size3" id="size3" class="form-check-input">
                    <label for="size3" class="form-check-label">Kain</label><br>
                    <input type="checkbox" name="size4" id="size4" class="form-check-input">
                    <label for="size4" class="form-check-label">Totebag</label><br>
                    <input type="checkbox" name="size4" id="size4" class="form-check-input">
                    <label for="size4" class="form-check-label">Masker</label><br>
                </div>
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
