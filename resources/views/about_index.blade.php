@extends('layouts.index')
@section('container')
    <section class="main no-padding">
        @include('include/profileHeader')
        <div class="container">
            <div class="row">
                @section('LeftMenuMyProfileAboutMe','active-profile')
                @include('include.profileLeftMenu')
                <div class="col-md-9 col-sm-9">
                    @include('include.errorSection')
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title p-b10">
                                <a href="#collapseB1" data-toggle="collapse">About Me</a>
                                <a href="{!! $routeLink !!}" class="pull-right btn-sm btn-success no-border">{!! $addOrEditText !!}</a>
                            </h4>

                        </div>
                        <div class="panel-body">
                            <h1 class="no-margin no-padding"><small>{!! $aboutTitle !!}</small></h1>
                            <p>{!! $aboutText !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection