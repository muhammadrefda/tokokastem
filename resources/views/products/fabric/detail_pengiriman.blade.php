@extends('layouts.master')
@section('title','Payment')
@section('content')

    <!-- Cart view section -->
    <section id="checkout" >
{{--        <div class="container">--}}
{{--            <div class="row">--}}

{{--                <div class="col-md-12">--}}
{{--                    <div class="checkout-area">--}}
{{--                        <div class="aa-order-summary-area">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h2 class="my-0 font-weight-normal">Rincian Pengiriman--}}
{{--                                    </h2>--}}
{{--                                </div>--}}
{{--                                <br>--}}
{{--                                <div class="card-body">--}}
{{--                                    <form action="" method="">--}}

{{--                                        <div class="form-row">--}}
{{--                                            <div class="col">--}}
{{--                                                <div class="card">--}}
{{--                                                    <div class="card-body">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label class="font-weight-bold">PROVINSI TUJUAN</label>--}}
{{--                                                            <select class="form-control provinsi-tujuan" name="province_destination">--}}
{{--                                                                <option value="0">-- pilih provinsi tujuan --</option>--}}
{{--                                                                @foreach ($provinces as $province => $value)--}}
{{--                                                                    <option value="{{ $province  }}">{{ $value }}</option>--}}
{{--                                                                @endforeach--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label class="font-weight-bold">KOTA / KABUPATEN TUJUAN</label>--}}
{{--                                                            <select class="form-control kota-tujuan" name="city_destination">--}}
{{--                                                                <option value="">-- pilih kota tujuan --</option>--}}
{{--                                                            </select>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="">ALAMAT LENGKAP</label>--}}
{{--                                                            <textarea class="form-control" name="" id="" rows="10"--}}
{{--                                                                      placeholder="EX: Jl. Moh Kahfi 2 No. 99">--}}
{{--                                                            </textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label>PILIH KURIR</label>--}}
{{--                                                        <select class="form-control kurir" name="courier">--}}
{{--                                                            <option value="0">-- pilih kurir --</option>--}}
{{--                                                            <option value="jne">JNE</option>--}}
{{--                                                            <option value="pos">POS</option>--}}
{{--                                                            <option value="tiki">TIKI</option>--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label class="font-weight-bold">BERAT (GRAM)</label>--}}
{{--                                                        <input type="number" class="form-control" name="weight" id="weight" placeholder="Masukkan Berat (GRAM)" value="5000" disabled>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="checkout-area">--}}
{{--                                            <button class="btn btn-md btn-primary btn-block btn-check">PROSES PESANAN</button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        </div>--}}
        <div class="checkout-area">
{{--            <div class="card-header">--}}
{{--                <h4 class="my-0 font-weight-normal">Formulir Cek Ongkir</h4>--}}
{{--            </div>--}}
{{--            <div class="">--}}
{{--                <form action="{{route('store.detail.pengiriman')}}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <div class="form-row">--}}
{{--                        <div class="col">--}}
{{--                            <h2 class="font-weight-bolder">Tujuan Pengiriman:</h2>--}}

{{--                            <div class="form-group">--}}
{{--                                <label>Provinsi</label>--}}
{{--                                <label for="province_id"></label><select required name="province_id" id="province_id" class="form-control">--}}
{{--                                    @foreach($province as $provinc)--}}
{{--                                        <option value="{{ $provinc->province_id }}">{{ $provinc->title }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-grup">--}}
{{--                                <label for="">Kota/Kabupaten</label>--}}
{{--                                <select name="cities_id" id="cities_id" class="form-control" required>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group mt-3">--}}
{{--                                <label>Detail Alamat</label>--}}
{{--                                <input type="text" class="form-control" name="detail" required>--}}
{{--                            </div>--}}
{{--                            <div class="text-right">--}}
{{--                                <button type="submit" class="btn btn-success text-right">Simpan</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}


            <div class="site-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Pilih Provinsi</label>
                                            <select name="province_id" id="province_id" class="form-control">
                                                <option value="">Pilih Provinsi</option>
                                                @foreach($province as $provinsi)
                                                    <option value="{{ $provinsi->province_id }}">{{ $provinsi->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-grup">
                                            <label for="cities_id">Pilih Kota/Kabupaten</label>
                                            <select name="cities_id" id="cities_id" class="form-control">
                                            </select>
                                        </div>
                                        <div class="form-grup">
                                            <label for="">Alamat Lengkap</label>
                                            <input type="text" name="detail" id="" placeholde="Kecamatan/Desa/Nama Jalan" class="form-control">
                                            </select>
                                        </div>
                                        <br>
                                        <div class="mt-4 text-right">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- / Cart view section -->
@endsection
@section('js')
    <script type="text/javascript">
        var toHtml = (tag, value) => {
            $(tag).html(value);
        }
        $(document).ready(function() {
            //  $('#province_id').select2();
            //  $('#cities_id').select2();
            $('#province_id').on('change',function(){
                var id = $('#province_id').val();
                var url = window.location.href;
                var urlNya = url.substring(0, url.lastIndexOf('/alamat/'));
                $.ajax({
                    type:'GET',
                    url:urlNya + '/getcity/' + id,
                    dataType:'json',
                    success:function(data){
                        var op = '<option value="">Pilih Kota</option>';
                        if(data.length > 0) {
                            var i = 0;
                            for(i = 0; i < data.length; i++) {
                                op += `<option value="${data[i].city_id}">${data[i].title}</option>`
                            }
                        }
                        toHtml('[name="cities_id"]', op);
                    }
                })
            })
        });
    </script>
@endsection
