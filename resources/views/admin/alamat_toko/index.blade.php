@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <p class="m-0 font-weight-bold text-primary">Alamat Toko</p>
                <hr>
                <a href="/alamat-toko">tambah Alamat Toko</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Detail Alamat Toko</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($address as $p)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$p->detail}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

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
                        $.ajax({
                            type:'GET',
                            url:url + '/getcity/' + id,
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
