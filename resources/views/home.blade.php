@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/css.css') }}">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Sales Car's</div>
                    <div class="content nav">
                      <a href="/cars">
                        <button  type="button" class="btn btn-default btn-md" aria-label="Left Align" >Cars</button>
                      </a>
                    </div>

                    <div class="content nav">
                      <a href="/brands">
                        <button  type="button" class="btn btn-default btn-md" aria-label="Left Align" >Brands</button>
                      </a>
                    </div>

                    <div class="content nav">
                      <a href="/features">
                        <button  type="button" class="btn btn-default btn-md" aria-label="Left Align" >Features</button>
                      </a>
                    </div>

                    <div class="content nav">
                      <a href="/modelos">
                        <button  type="button" class="btn btn-default btn-md" aria-label="Left Align" >Models</button>
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
