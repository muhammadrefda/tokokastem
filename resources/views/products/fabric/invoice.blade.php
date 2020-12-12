<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        table{
            border: 1px solid #ffd369;
            width: 100%;
        }
        thead {
            background-color: #ffd369;
            border: 1px solid #ffd369;

        }
        tbody{
            background-color: #eeeeee;
            border: 1px solid #eeeeee;
        }
        tfoot{
            background-color: #ffd369;
            border: 1px solid #ffd369;

        }
        td{
            background-color: #eeeeee;
            border: 1px solid #eeeeee;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="checkout-left">
                <div class="aa-order-summary-area">
                    <br>
                    <h2>Rincian Pesanan</h2>
                    <table class="table table-responsive" id="customTable">
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
                                <td>{{number_format($td->price_fabric)}}</td>
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
                        </tfoot>
                    </table>
                </div>
                <h4>Setelah melakukan transfer, silahkan mengirim bukti pembayaran ke nomor</h4>
                <i class="fa fa-whatsapp " aria-hidden="true" style="color:#71EA68">WhatsApp</i>: 081411165221
            </div>
        </div>
    </div>
</div>

</body>
</html>
