@extends('template/library')

@section('wrap')
    <div class="jumbotron dark-sections" id="introjumbo">
        <div class="container content-container">
            <h1>SPYC Library</h1>
            <h2>Knowledge is the food of the soul. &emsp;- Plato</h2>
            <hr />
            <p>2/F, New Wing,<br />Shatin Pui Ying College</p>
        </div>
    </div>
    <div class="dark-sections">
        <div class="container content-container">
            <div class="row">
                <div class="col-sm-7 col-sm-push-2">
                    <h2>OPAC</h2>
                    <iframe src="http://library.pyc.edu.hk/WebOPAC.exe" width="600px" height="400px">OPAC</iframe>
                </div>
            </div>
        </div>
    </div>
@stop