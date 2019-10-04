<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- bootstrap css --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    {{-- script --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/qrcode.min.js"></script>
    <title>Welcome To The Movement!</title>

    <style>
        #qrcode {
            margin-left: 500px;
        }
        @media only screen and (max-width: 992px) {
            #qrcode {
                margin-left: 250px;
            }
            }
        @media only screen and (max-width: 600px) {
            #qrcode {
                margin-left: 100px;
            }
            }
    </style>

</head>
<body>
    <div class="jumbotron text-center">
        <h1 class="display-3">Thank You!</h1>
            <p class="lead">
                Hello, {{ Auth::user()->name }}. 
                <!--<strong>Please wait and check your email</strong> for further instructions on how to login to your account.-->
                <strong>Tunggu 1 - 2 menit dan cek email Anda</strong> untuk informasi selanjutnya. Halaman ini akan langsung mengalihkan Anda ke halaman selanjutnya. Apabila Anda tidak menerima email jangan khawatir karena kami akan mengirim email kembali mengenai informasi selengkapnya.
            </p>

                <input id="text" type="text" disabled value="{!! Auth::user()->code_registration !!}" hidden><br />
                {{--  <div id="qrcode">
                    <br />
                </div>  --}}
                <script type="text/javascript">
                    setTimeout(function() {
                        window.location.href = "{{ url('/home') }}";
                    }, 15000);
                    var qrcode = new QRCode("qrcode");
                    function makeCode () {      
                        var elText = document.getElementById("text");
                        qrcode.makeCode(elText.value);
                    }
                    makeCode();
                    $("#text").
                    on("blur", function () {
                        makeCode();}).
                        on("keydown", function (e) {
                            if (e.keyCode == 13) {
                                makeCode();}
                            });
                        </script>
                        <hr>
            <p>
                {{-- Having trouble? <a href="">Contact us</a> --}}
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="http://yrmovement.com" role="button">Continue to yrmovement website page</a>
                {{-- <a class="btn btn-primary btn-sm" href="{{ route('transport') }}" role="button">Need Transportation?</a> --}}
            </p>
        </div>
</body>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>