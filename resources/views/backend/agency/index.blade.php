@extends('layouts.backend')
@section('bodyClass', 'agency')
@section('content')
<div class="container">
    
    <div class="row">
        <div class="col s12">
            <h1 class="display-4 title">{{ $agency->name }}</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col s12 tabs-wrap">
            <ul class="tabs z-depth-1">
                <li class="tab col"><a href="#overview">Overview</a></li>
                <li class="tab col"><a href="#mentors">Mentors</a></li>
                <li class="tab col"><a href="#services">Services</a></li>
                <li class="tab col"><a href="#visa">Recent Visas</a></li>
                <li class="tab col"><a href="#score">Our Score</a></li>
                <li class="tab col"><a href="#social">Social</a></li>
                <li class="tab col"><a href="#membership">Membership</a></li>
                <li class="tab col"><a href="#achievement">Achievement</a></li>
                <li class="tab col"><a href="#events">Events</a></li>
            </ul>
            <div class="col s12 z-depth-1" id="overview">
                @include('agency.tabs.overview')
            </div>
            <div class="col s12 z-depth-1" id="mentors">
                @include('agency.tabs.mentors')
            </div>
            <div class="col s12 z-depth-1" id="services">
                @include('agency.tabs.service')
            </div>
            <div class="col s12 z-depth-1" id="visa">
                @include('agency.tabs.visa')
            </div>
            <div class="col s12 z-depth-1" id="score">
                @include('agency.tabs.score')
            </div>
            <div class="col s12 z-depth-1" id="social">
                @include('agency.tabs.social')
            </div>
            <div class="col s12 z-depth-1" id="membership">
                @include('agency.tabs.membership')
            </div>
            <div class="col s12 z-depth-1" id="achievement">
                @include('agency.tabs.achievement')
            </div>
            <div class="col s12 z-depth-1" id="events">
                @include('agency.tabs.events')
            </div>
        </div>
    </div>
</div>
@endsection

