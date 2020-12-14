<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center><h2>Nota Pembelian</h2></center>
            <table class="table">
                <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty </th>
                    <th>Harga Satuan</th>

                </tr>
                </thead>
                <tbody>
                @foreach($detail_order as $td)
                    <tr>
                        <td>{{$td->category}}</td>
                        <td>{{$td->quantity}}</td>
                        <td>{{number_format($td->price_totebag)}}</td>
                    </tr>
                </tbody>
                @endforeach
                <tfoot>
                <tr>
                    <th colspan="2">Kode Unik</th>
                    <td><b>{{$td->unique_code}}</b></td>
                </tr>
                <tr>
                    <th colspan="2">Ongkir</th>
                    <td>
                        Rp . {{ number_format($ongkir) }}
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Total</th>
                    <td>
                        Rp. {{number_format($td->total+$ongkir)}}
                    </td>
                </tr>
                <tr>
                    <th colspan="2">jenis kurir</th>
                    @foreach($getCourier as $gc)
                        <td>{{$gc->courier_code}}</td>
                    @endforeach

                </tr>
                </tfoot>
            </table>
            <div class="row">
                <table>
                    <thead>
                    <tr>
                        <th>Alamat Pengiriman</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detail_order as $td)
                        <tr>
                            <td>{{$td->address}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <br>

            <div class="row">
                <table>
                    <thead>
                    <tr>
                        <th><img src="{{public_path('img/Logo-Bank-BNI.png')}}" style="width: 250px; height: 100px;"></th>
                        <th><img src="{{public_path('img/whatsapp-w-number.png')}}" style="width: 250px; height: 100px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Silahkan transfer ke rekening di atas</td>
                        <td>Silahkan konfirmasi pembayaran dgn mengapload nota ke nomor diatas</td>
                    </tr>
                    </tbody>
                </table>
                </div>
        </div>
    </div>
</div>
<script type="text/php">
    if (isset($pdf)) {
        $text = "page {PAGE_NUM} / {PAGE_COUNT}";
        $size = 10;
        $font = $fontMetrics->getFont("Verdana");
        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
        $x = ($pdf->get_width() - $width) / 2;
        $y = $pdf->get_height() - 35;
        $pdf->page_text($x, $y, $text, $font, $size);
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
