@extends('layouts.index')
@section('container')
    <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.css" />
    <section class="main no-padding">
        @include('include/profileHeaderView')
        <div class="container">
            <div class="row">
                @section('LeftMenuMyProfileExperience','active-profile')
                @include('include.profileLeftMenuView')
                <div class="col-md-9 col-sm-9">
                    @while(list($key,$value)=each($experience))
                        <div class="panel panel-default  {!! $value->id !!}">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse">Experience </a> </h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-5 col-md-6 col-lg-7">
                                        <h1 class="no-margin no-line-height"><small>{!! $value->jobTitle !!}</small></h1>
                                        <p class="m-t5">{!! date('d/m/Y',strtotime($value->startedOn)) !!} - @if($value->endedOn==null) Continue @else {!! date('d/m/Y',strtotime($value->endedOn)) !!} @endif</p>
                                        <p>{!! $value->jobSummary !!}</p>
                                    </div>
                                    <div class="col-sm-5 col-md-4 col-lg-3">
                                        <div class="institute_avatar">
                                            <div class="form-group">
                                                <img src="{!! $value->logo !!}"  alt="Company Logo" class="img-responsive" id="showInstituteImage">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2 class="text-capitalize"><small>{!! $value->companyName !!}</small></h2>
                                        <p class="pull-left m-r15">City: {!! $value->city !!}</p>
                                        <p class="pull-left m-r15 m-l10">District: {!! $value->district !!}</p>
                                        <p class=" m-l10">Post Code: {!! $value->postcode !!}</p>
                                        <p>{!! $value->address !!}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label><strong><i class="fa fa-envelope-o"></i> Email: </strong></label>
                                        <p>{!! $value->email !!}</p>
                                    </div>
                                    <div class="col-md-4">
                                            <label><strong><i class="fa fa-internet-explorer"></i> Website: </strong></label>
                                        <p>{!! $value->website !!}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong><i class="fa fa-phone"></i> Phone: </strong></label>
                                        <p>{!! $value->phone !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endwhile
                </div>
            </div>
        </div>
    </section>
@endsection