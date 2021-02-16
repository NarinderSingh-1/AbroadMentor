@extends('layouts.backend')
@section('bodyClass', 'home')
@section('content')
<div class="container newUser">
    <div class="row">
        <div class="col col-md-4 offset-md-2">
            <div class="card" style="width: 20rem;">
                <i class="sticker fa fa-user"></i>
                <div class="card-body">
                    <h4 class="card-title">Customer</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{ url('individual') }}" class="btn btn-primary">Continue</a>
                </div>
            </div>
        </div>
        <div class="col col-md-4 offset-md-1">
            <div class="card" style="width: 20rem;">
                <i class="sticker fa fa-university" aria-hidden="true"></i>
                <div class="card-body">
                    <h4 class="card-title">Agency</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{ url('agency') }}" class="btn btn-primary">Continue</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
