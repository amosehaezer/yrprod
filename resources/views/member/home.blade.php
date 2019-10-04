@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Member Dashboard
                    {{-- <a class="btn float-right" href="{{ url('/books/create') }}">{{ __('Add new book') }}</a> --}}
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        {{-- <h2>{!! Auth::user()->code_registration !!}</h2> --}}
                        {{-- <br /> --}}
                        Halo, {{ Auth::user()->name }}. Terima kasih sudah mendaftar. <br />
                        Tekan tombol Home untuk kembali ke halaman Youth Revival Movement.<br /><br />
                        <input id="text" type="text" disabled value="{!! Auth::user()->code_registration !!}" hidden><br />
                        <div id="qrcode"><br /></div>
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
                        {{-- <br /> --}}
                    {{-- You are logged in! --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
