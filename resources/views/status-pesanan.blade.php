@extends('layouts.master')
@section('title','Status Pesanan')

@section('content')

    <!-- Blog Archive -->
    <section id="aa-blog-archive">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-blog-archive-area">
                        <h2> Status Pesananmu:
                           @foreach($status as $sts )
                                <b>*{{$sts->status}}*</b>
                                    @endforeach
                        </h2>


                        <h3>Berikut arti status pesananmu:</h3>
                      <ul>
                          <h3><b>Pending</b></h3>
                        <p>
                            Pesananmu sedang di verifikasi oleh tim kami, mohon menunggu
                        </p>
                        <h3><b>On Progress</b></h3>
                        <p>
                            Pesananmu sudah di verifikasi oleh tim kami dan sedang di proses
                        </p>
                        <h3><b>Berhasil</b></h3>
                        <p>
                            Pesananmu sedang dalam perjalanan
                        </p>
                      </ul>
                    </div>
                </div>

            </div>
        </div>


    </section>


@endsection
