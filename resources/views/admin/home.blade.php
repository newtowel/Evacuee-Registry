<html>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <style>

        canvas {
            padding-left: 0;
            padding-right: 0;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 50%;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script src="{{asset('/js/jsQR.js')}}"></script>
</head>
<body>
    <div style="text-align:center;font-size:35px;">QRコードを読みとります</div>
    <br>
    <canvas id="canvas"></canvas>
    <div id="app"></div>
    <!--<h3 id=""></h3>-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/load_qrcode.js"></script>
</body>
</html>