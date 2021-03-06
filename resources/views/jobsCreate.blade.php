@extends('layouts.index')
@section('container')
    <link rel="stylesheet" href="{!! url('plugins/jquery-ui/jquery-ui.css') !!}" />
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <section class="main no-padding">
        @include('include/profileHeader')
        <div class="container">
            <div class="row">
                @section('LeftMenuMyProfileJob','active-profile')
                @include('include.profileLeftMenuJobs')
                <div class="col-md-9 col-sm-9">
                    <form action="{!! route('jobs.store') !!}" method="post">
                        <input type="hidden" value="{!! csrf_token() !!}" name="_token">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse">Job Create</a></h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{!! $error !!}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="jobTitle" class="m-l5">Job Title</label>
                                    <input type="text" class="form-control" name="jobTitle" value="{!! old('jobTitle') !!}" id="jobTitle">
                                </div>
                                <div class="form-group">
                                    <label for="jobSummary" class="m-l5">Job Summary</label>
                                    <textarea name="jobSummary" class="form-control" id="jobSummary" cols="30" rows="10">{!! old('jobSummary') !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="jobDescription" class="m-l5">Job Description</label>
                                    <textarea name="jobDescription" class="form-control" id="jobDescription" cols="30" rows="15">{!! old('jobDescription') !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="jobType" class="m-l5">Job Type</label>
                                    <select id="jobType" class="form-control" name="jobType">
                                        <option value="">Job Type</option>
                                        <option @if(old('jobType')=='FullTime') selected @endif>FullTime</option>
                                        <option @if(old('jobType')=='PartTime') selected @endif>PartTime</option>
                                        <option @if(old('jobType')=='Internship') selected @endif>Internship</option>
                                        <option @if(old('jobType')=='Contractual') selected @endif>Contractual</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jobLocation" class="m-l5">Job Location</label>
                                    <input type="text" id="jobLocation" class="form-control" name="jobLocation" value="{!! old('jobLocation') !!}">
                                </div>
                                <div class="form-group">
                                    <label for="salary" class="m-l5">Salary</label>
                                    <input type="text" id="salary" class="form-control" name="salary" value="{!! old('salary') !!}">
                                </div>
                                <div class="form-group">
                                    <label for="jobCategory" class="m-l5">jobCategory</label>
                                    <select id="jobCategory" class="form-control" name="jobCategory">
                                        <option value="">Select a category</option>
                                        @while(list($key,$val)=each($category))
                                            <option value="{!! $key !!}" @if(old('jobCategory')==$key) selected @endif>{!! $val !!}</option>
                                        @endwhile
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="others" class="m-l5">Others</label>
                                    <textarea name="others" id="others" cols="30" rows="10" class="form-control">{!! old('others') !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="numberOfPosition" class="m-l5">Number Of Position</label>
                                    <input type="number" id="numberOfPosition" class="form-control" name="numberOfPosition"  value="{!! old('numberOfPosition') !!}">
                                </div>
                                <div class="form-group">
                                    <label for="minimumExperience" class="m-l5">Minimum Experience</label>
                                    <input type="text" id="minimumExperience" class="form-control" name="minimumExperience" value="{!! old('minimumExperience') !!}">
                                </div>
                                <div class="form-group">
                                    <label for="minimumAge" class="m-l5">Minimum Age</label>
                                    <input type="number" id="minimumAge" class="form-control" name="minimumAge" value="{!! old('minimumAge') !!}">
                                </div>
                                <div class="form-group">
                                    <label for="applicationInstruction" class="m-l5">Application Instruction</label>
                                    <textarea name="applicationInstruction" id="applicationInstruction" cols="30" rows="10" class="form-control">{!! old('applicationInstruction') !!}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="applicationEndDate" class="m-l5">Application End Date</label>
                                    <input type="text" id="applicationEndDate" class="form-control" name="applicationEndDate" value="{!! old('applicationEndDate') !!}">
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-xs btn-primary"><i class="fa fa-print"></i> Publish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{!! url('plugins/jquery-ui/jquery-ui.min.js') !!}"></script>
    <script>
        $(function() {
            $( "#applicationEndDate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd-m-yy'

            });
        });
    </script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins:['autolink link hr']
        });
    </script>

@endsection