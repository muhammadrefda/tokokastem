<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desain Masker | Toko Kastem</title>

    <script type="text/javascript" src="{{ asset('js/excanvas.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/fabric.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/tshirtEditor.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.miniColors.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/html5.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/loading.js')}}"></script>
    <script type="text/javascript"
            src="https://cdn.rawgit.com/eligrey/FileSaver.js/5733e40e5af936eb3f48554cf6a8a7075d71d18a/FileSaver.js"></script>

    <link type="text/css" rel="stylesheet" href="{{ asset('css/jquery.miniColors.css')}}"/>
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href=" {{ asset('css/loader.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link id="switcher" href="{{asset('css/theme-color/default-theme.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">

    <style type="text/css">

        .color-preview {
            border: 1px solid #CCC;
            margin: 1px;
            zoom: 1;
            display: inline-block;
            cursor: pointer;
            overflow: hidden;
            width: 150px;
            height: 20px;
            position: relative;
        }

        .rotate {
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            /* filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1.5); */
            -ms-transform: rotate(90deg);
        }

        .Arial {
            font-family: "Arial";
        }

        .Helvetica {
            font-family: "Helvetica";
        }

        .MyriadPro {
            font-family: "Myriad Pro";
        }

        .Delicious {
            font-family: "Delicious";
        }

        .Verdana {
            font-family: "Verdana";
        }

        .Georgia {
            font-family: "Georgia";
        }

        .Courier {
            font-family: "Courier";
        }

        .ComicSansMS {
            font-family: "Comic Sans MS";
        }

        .Impact {
            font-family: "Impact";
        }

        .Monaco {
            font-family: "Monaco";
        }

        .Optima {
            font-family: "Optima";
        }

        .Plaster {
            font-family: "Plaster";
        }

        .Engagement {
            font-family: "Engagement";
        }

        .img-polaroid {
            padding: 0;
            margin: 0;
            border: 2px solid transparent;
            max-height: 92px;
            max-width: 92px;
            min-height: 92px;
            min-width: 92px;

        }

        .img-polaroid:hover {
            cursor: pointer;
            border-color: #F36365;
        }

        .tt {
            margin-right: 4px;
        }
    </style>

</head>
<header id="aa-header">
    <div class="aa-header-top">
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-top-area">
                        <div class="aa-header-top-left">
                            <div class="cellphone hidden-xs">
                                <p><span class="fa fa-phone"></span>00-62-658-658</p>
                            </div>
                        </div>
                        <div class="aa-header-top-right" >
                            <ul class="aa-head-top-nav-right">
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <div class="aa-logo">
                            <a href="/">
                                <span class="fa fa-shopping-cart"></span>
                                <p>toko<strong>Kastem</strong> <span>Custom your own</span></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section id="menu">
    <div class="container">
        <div class="menu-area">
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/cara-pesan">Cara Pesan</a>
                        <li><a href="/kontak-kami">Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<body>
<div class="container">
    <section id="typography">
        <div class="row">
            <div class="col-md-3">
                <h3>Desain Masker</h3>
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Atur File </a></li>
                        <li><a href="#tab2" data-toggle="tab">tulisan/gambar</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="well">
                                <button id="imgsavepdf" class="aa-add-to-cart-btn">Simpan Gambar</button>
                                <button class="aa-add-to-cart-btn" onclick="location.reload();" title="Reset Desain">
                                    Reset Desain
                                </button>
                            </div>
                        </div>
                        <div>
                            <h3>Pastikan Kamu sudah mendownload file desain kamu</h3>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="well">
                                <h4>Text</h4>
                                <div class="input-append">
                                    <input class="span2" id="text-string" type="text"
                                           placeholder="Add text here ...">
                                    <button id="add-text" class="btn" title="Add"><i class="icon-share-alt"></i>
                                    </button>
                                    <hr>
                                </div>
                                <h4>Sisipkan Gambar
                                    <form hidden id="form1" runat="server">
                                        <input hidden type='file' id="imgInp" accept="image/png, image/jpg" />
                                    </form>
                                    <button id="addimg" class="btn btn-primary"><i style="font-size: 15px;" class="fa fa-plus"
                                                                                   aria-hidden="true"></i></button>
                                </h4>
                                <div id="avatarlist" style="max-height: 500px; overflow: scroll;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div align="center" style="min-height: 32px;">
                    <div class="clearfix">
                        <div class="btn-group inline pull-left" id="texteditor" style="display:none">
                            <button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown"
                                    title="Font Style"><i class="icon-font" style="width:19px;height:19px;"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
                                <li><a tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial">Arial</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad Pro</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Delicious');" class="Delicious">Delicious</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Verdana');" class="Verdana">Verdana</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Georgia');" class="Georgia">Georgia</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Courier');" class="Courier">Courier</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic Sans MS</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Impact');" class="Impact">Impact</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Monaco');" class="Monaco">Monaco</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Optima');" class="Optima">Optima</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler Text</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Plaster');" class="Plaster">Plaster</a></li>
                                <li><a tabindex="-1" href="#" onclick="setFont('Engagement');" class="Engagement">Engagement</a>
                                </li>
                            </ul>
                            <button id="text-bold" class="btn" data-original-title="Bold"><img src="/img/font_bold.png"
                                                                                               height="" width="">
                            </button>
                            <button id="text-italic" class="btn" data-original-title="Italic"><img
                                    src="/img/font_italic.png" height="" width=""></button>
                            <button id="text-strike" class="btn" title="Strike" style=""><img
                                    src="/img/font_strikethrough.png" height="" width=""></button>
                            <button id="text-underline" class="btn" title="Underline" style=""><img
                                    src="/img/font_underline.png"></button>
                            <a class="btn" href="#" rel="tooltip" data-placement="top" data-original-title="Font Color"><input
                                    type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000"></a>
                            <a class="btn" href="#" rel="tooltip" data-placement="top"
                               data-original-title="Font Border Color"><input type="hidden" id="text-strokecolor"
                                                                              class="color-picker" size="7"
                                                                              value="#000000"></a>
                        </div>
                        <div class="pull-right" align="" id="imageeditor" style="display:none">
                            <div class="btn-group">
                                <button class="btn" id="bring-to-front" title="Bring to Front"><i
                                        class="icon-fast-backward rotate" style="height:19px;"></i></button>
                                <button class="btn" id="send-to-back" title="Send to Back"><i
                                        class="icon-fast-forward rotate" style="height:19px;"></i></button>
                                <button id="flip" type="button" class="btn" title="Show Back View"><i
                                        class="icon-retweet" style="height:19px;"></i></button>
                                <button id="remove-selected" class="btn" title="Delete selected item"><i
                                        class="icon-trash" style="height:19px;"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shirtDiv" class="page"
                     style="
                     z-index: 11;
                     width: 530px;
                     height: 630px;
                     position: relative;
                     background-color: rgb(255, 255, 255);">
                    <img id="tshirtFacing" src="{{asset('img/masker_right.png')}}" alt="">

                    <div id="drawingArea"
                         style="position: absolute;
                                top: 0px;
                                left: 0px;
                                z-index: 10;
                                width: 530px;
                                height: 630px;
                                opacity: 0.7">
                        <canvas id="tcanvas" width=530 height="630" class="hover"
                                style="-webkit-user-select: none;"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <h3>Pilih Warna Masker</h3>
                <div class="well">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                    <ul class="nav">
                                        <li class="color-preview" title="White" style="background-color:#ffffff;"></li>
                                        <li class="color-preview"  title="Dark Heather" style="background-color:#616161;"></li>
                                        <li class="color-preview" title="Gray" style="background-color:#f0f0f0;"></li>
                                        <li class="color-preview" title="Charcoal" style="background-color:#5b5b5b;"></li>
                                        <li class="color-preview" title="Black" style="background-color:#222222;"></li>
                                        <li class="color-preview" title="Heather Orange" style="background-color:#fc8d74;"></li>
                                        <li class="color-preview" title="Heather Dark Chocolate" style="background-color:#432d26;"></li>
                                        <li class="color-preview" title="Salmon" style="background-color:#eead91;"></li>
                                        <li class="color-preview" title="Chesnut" style="background-color:#806355;"></li>
                                        <li class="color-preview" title="Dark Chocolate" style="background-color:#382d21;"></li>
                                        <li class="color-preview" title="Citrus Yellow" style="background-color:#faef93;"></li>
                                        <li class="color-preview" title="Avocado" style="background-color:#aeba5e;"></li>
                                        <li class="color-preview" title="Kiwi" style="background-color:#8aa140;"></li>
                                        <li class="color-preview" title="Irish Green" style="background-color:#1f6522;"></li>
                                        <li class="color-preview" title="Scrub Green" style="background-color:#13afa2;"></li>
                                        <li class="color-preview" title="Teal Ice" style="background-color:#b8d5d7;"></li>
                                        <li class="color-preview" title="Heather Sapphire" style="background-color:#15aeda;"></li>
                                        <li class="color-preview" title="Sky" style="background-color:#a5def8;"></li>
                                        <li class="color-preview" title="Antique Sapphire" style="background-color:#0f77c0;"></li>
                                        <li class="color-preview" title="Heather Navy" style="background-color:#3469b7;"></li>
                                        <li class="color-preview" title="Cherry Red" style="background-color:#c50404;"></li>
                                    </ul>
                                </div>

                            <div class="tab-pane" id="tab2">
                                <div class="well">
                                    <div class="input-append">
                                        <input class="span2" id="text-string" type="text" placeholder="add text here..."><button id="add-text" class="btn" title="Add text"><i class="icon-share-alt"></i></button>
                                        <hr>
                                    </div>
                                    <div id="avatarlist">
                                        <img style="cursor:pointer;" class="img-polaroid" src="data:image/jpeg;base64,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">
                                        <img style="cursor:pointer;" class="img-polaroid" src="data:image/png;base64,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">
                                        <img style="cursor:pointer;" class="img-polaroid" src="data:image/png;base64,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%3D%3D">
                                        <img style="cursor:pointer;" class="img-polaroid" src="data:image/png;base64,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">
                                        <img style="cursor:pointer;" class="img-polaroid" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAIAAAD/gAIDAAABL0lEQVR4nO3cMQ6CQBRAQVFvaWOsbT2FrbVn9QaEJ26QZKZHNi+/WMjidLpeDixz3HoBeyJWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWcN7qxu/74+trb6/nD1eynMkKxArECsQKxArECsQKxArECgbu4Of36Gt24eN+eZ7JCsQKxArECsQKxArECsQKxAqm+S9Z9/imfNyaTVYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFaw2SmaPTJZgViBWIFYgViBWIFYgViBWMGqHfz8mZP/PAe/5rnCZAViBWIFYgViBWIFYgViBWIFA9/BjzsH779odkCsQKxArECsQKxArECsQKzgA29sHs723zLdAAAAAElFTkSuQmCC">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <a href="{{route('mask.create.detail.order')}}" class="aa-add-to-cart-btn">
                    Proses Pesanan
                </a>
            </div>

        </div>
    </section>
</div>
<br>
<section id="aa-support">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-support-area">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-truck"></span>
                            <h4>FREE SHIPPING</h4>
                            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-clock-o"></span>
                            <h4>30 DAYS MONEY BACK</h4>
                            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-phone"></span>
                            <h4>SUPPORT 24/7</h4>
                            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="aa-support" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-support-area">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single"></div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-envelope"></span>
                            <h4>PARTNERSHIP</h4>
                            <P>Ribrick Tech
                                <br> <span>&</span> <br>
                                Lazuardy Printing</P>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<footer id="aa-footer">
    <div class="aa-footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-footer-top-area">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <div class="aa-footer-widget">
                                        <h3>Contact Us</h3>
                                        <address>
                                            <p> 25 Astor Pl, NY 10003, USA</p>
                                            <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                                            <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                                        </address>
                                        <div class="aa-footer-social">
                                            <a href="#"><span class="fa fa-facebook"></span></a>
                                            <a href="#"><span class="fa fa-twitter"></span></a>
                                            <a href="#"><span class="fa fa-youtube"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="aa-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-footer-bottom-area">
                        <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-35639689-1']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

    $(document).ready(function () {

        /*******************************************************************************/
        function getContentImage() {
            html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                // document.body.appendChild(canvas)
                $(canvas).get(0).toBlob(function (blob) {
                    var urlCreator = window.URL || window.webkitURL;
                    var imageUrl = urlCreator.createObjectURL(blob);
                    $('#test').append('<img src="' + imageUrl + '" alt=""><br>');

                });
            })
            ;
        }

        function LoadeShirts() {
            $('.loading-blink').loading();
            $('.loading-blink').show();
            getContentImage();

            setTimeout(function () {
                rotate();
            }, 500);
            setTimeout(function () {
                getContentImage();
            }, 1200);
        }

        /*******************************************************************************/


        $('#loading-custom-overlay').loading({
            overlay: $('#custom-overlay')
        });
        $('.loading-blink').hide();

        $('#rotate').click(function (e) {
            e.preventDefault();
            rotate();
        });

        function rotate() {
            $('#flip').click();
        }

        $("#addimg").on('click', function () {
            $('#imgInp').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatarlist').append('<img class="img-polaroid tt" src="' + e.target.result + '">');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

        $('#shirtstyle').on('change', function () {
            $('#tshirtFacing').attr("src", "img/t-shirts/" + $(this).val() + "_front.png");
            IMAGE_NAME = $(this).val();
        });

        $('#imgsavepdf').on('click', function () {
            $('.loading-blink').loading();
            $('.loading-blink').show();
            var doc = new jsPDF();
            doc.setFontSize(20);

            setTimeout(function () {
                html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                    function convertCanvasToImage(c)
                    {
                        var image = new Image();
                        image.src = c.toDataURL("image/jpeg");
                        doc.addImage(image.src, 'JPEG', 30, 5, 145, 145);
                        return image;
                    }
                    convertCanvasToImage(canvas);

                })
                ;
            }, 100);
            setTimeout(function () {
                rotate();

            }, 700);
            setTimeout(function () {
                html2canvas(document.querySelector("#shirtDiv")).then(canvas => {
                    function convertCanvasToImage(c)
                    {
                        var image = new Image();
                        image.src = c.toDataURL("image/jpeg");
                        doc.addImage(image.src, 'JPEG', 30, 150, 145, 145);
                        return image;
                    }
                    convertCanvasToImage(canvas);
                })
                ;
            }, 1100);
            setTimeout(function () {
                doc.save("Desain Masker.pdf");
                $('.loading-blink').hide();
                $('#test').empty();
            }, 1700);

        });

    });
</script>
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
