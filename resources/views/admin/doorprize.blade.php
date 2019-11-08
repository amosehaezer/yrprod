@extends('layouts.app-admin')

@section('content')

<button type="button" class="btn btn-primary" id="start">Start !</button>
<button class="btn btn-danger" id="reset" onclick="window.location.reload();">Reset !</button>
    <div class="container" style="font-size:180px;">
        <div class="row">
            <div class="col"></div>
            <div class="col ran" id="char1"></div>
            <div class="col ran" id="char2"></div>
            <div class="col ran" id="char3"></div>
            <div class="col ran" id="char4"></div>
            <div class="col ran" id="char5"></div>
            <div class="col"></div>
        </div>
    </div>
    <div>
        <table class="table table-hover table-bordered" id="table" style="visibility:hidden;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Asal Gereja / Organisasi</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <tbody style="font-size: 70px;">
            @foreach($hasilrandom as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->member->asal_gereja_atau_organisasi }}</td>
                <td>{{ $value->member->phone_number }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @foreach($hasilrandom as $key => $value)
    <input id="text" type="text" disabled value="{!! $value->code_registration !!}" hidden><br />
    @endforeach
    {{--  </div>  --}}

    <script>
        var text = new String("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");
        var textToMatch = document.getElementById("text").value;

        for(i=1; i<=5; i++) {
            $("char"+i).html(text.charAt(Math.floor(Math.random() * text.length)));
        }
        $("#start").on('click', () => {
            // alert('hai');
            var i = 0;
            var temp = "";
            
            var interval = setInterval(() => {
                if(i==5){
                    clearInterval(interval);
                    document.getElementById("table").style.visibility = 'visible';
                }
                var new_char = text.charAt(Math.floor(Math.random() * text.length));
                $("#char"+(i+1)).html(new_char);
                console.log(new_char + ' ' + i);
                if(new_char == textToMatch.charAt(i)) {
                    i++;
                }
            }, 100);
        })
        
    </script>
    
@endsection