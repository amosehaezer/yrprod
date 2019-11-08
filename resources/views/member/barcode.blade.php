<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/qrcode.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Barcode</title>
</head>
<body>
    
        <input id="text" type="text" disabled value="{!! $barcode->code_registration !!}" hidden><br />
        <div id="qrcode"><br /></div>
        <br />
         <input id="text" type="text" disabled value="{!! $barcode->name !!}"><br /> 
         <input id="text" type="text" disabled value="{!! $barcode->member->asal_gereja_atau_organisasi !!}"><br /> 

        <script type="text/javascript">
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
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148731849-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                
                gtag('config', 'UA-148731849-1');
            </script>

</body>
</html>