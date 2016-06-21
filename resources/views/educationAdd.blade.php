@extends('layouts.index')
@section('container')
    <link rel="stylesheet" href="{!! url('plugins/jquery-ui/jquery-ui.css') !!}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <style>.select2-container .select2-selection--single{height:32px !important;}</style>
    <section class="main no-padding">
        @include('include/profileHeader')
        <div class="container">
            <div class="row">
                @section('LeftMenuMyProfileEducation','active-profile')
                @include('include.profileLeftMenu')
                <div class="col-md-9 col-sm-9">
                    @include('include.errorSection')
                </div>
                <div class="col-md-9 col-sm-9">
                    <form action="{!! route('education.store') !!}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Education Add </a> </h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-3">
                                <label class="pull-left">Search Institute</label>
                            </div>
                            <div class="col-lg-9 m-b15">
                                <select class="searchInstitute form-control"></select>
                                <input type="hidden" value="null" name="_searchInstitute">
                            </div>
                            <div class="container-fluid m-b10">
                                <div class="row">
                                    <div class="col-sm-5 col-md-4 col-lg-3">
                                        <!-- User avatar -->
                                        <div class="institute_avatar">
                                            <div class="form-group">
                                                <label for="instituteImage" class="active">
                                                    <img src="{!! url('img/institutes/institute_icon.PNG') !!}"  alt="avatar" class="img-responsive" id="showInstituteImage">
                                                </label>
                                                <input type="file" id="instituteImage" class="hidden" name="instituteImage" onchange="loadFile(event)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="instituteName">Institute Name</label>
                                    <input type="text" name="instituteName" value="{!! old('instituteName') !!}" class="form-control institute" id="instituteName">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" value="{!! old('city') !!}" class="form-control institute" id="city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district">District</label>
                                    <input type="text" name="district" value="{!! old('district') !!}" class="form-control institute" id="district">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcode">Post Code</label>
                                    <input type="text" name="postcode" value="{!! old('postcode') !!}" class="form-control institute" id="postcode">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" value="{!! old('phone') !!}" class="form-control institute" id="phone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="text" name="email" value="{!! old('email') !!}" class="form-control institute" id="email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="instituteCode">Institute Code</label>
                                    <input type="text" name="instituteCode" value="{!! old('instituteCode') !!}"  class="form-control institute" id="instituteCode">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="website">website</label>
                                    <input type="text" name="website" value="{!! old('website') !!}" class="form-control institute" id="website">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="address">Institue Address</label>
                                    <textarea id="address" name="address" class="form-control institute" rows="6">{!! old('address') !!}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="degree">Degree Name</label>
                                    <select name="degree" id="degree" class="form-control degree">
                                        <option value="">Select Degree</option>
                                        @foreach($degrees AS $key=>$val)
                                            <option @if(old('degree')==$key) selected @endif value="{!! $key !!}">{!! $val !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="subject">Subject Name</label>
                                    <input type="text" name="subject" class="form-control" id="subject" value="{!! old('subject') !!}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="startedOn">Started On</label>
                                    <input type="text" name="startedOn" class="form-control datepicker" value="{!! old('startedOn') !!}" id="startedOn">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="endedOn">Ended On</label>
                                    <input type="text" name="endedOn" class="form-control datepicker" id="endedOn" value="{!! old('endedOn') !!}">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-custom btn-block"><i class="fa fa-save"></i> Save Education</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{!! url('plugins/jquery-ui/jquery-ui.min.js') !!}"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <script>
        $('.searchInstitute').change(function () {
            var value=$(this).attr('value');
            var valueObj=JSON.parse(value);
            $('[name=_searchInstitute]').val(valueObj.id);
            $('#instituteName').val(valueObj.instituteName);
            $('#city').val(valueObj.city);
            $('#district').val(valueObj.district);
            $('#postcode').val(valueObj.postcode);
            $('#address').html(valueObj.address);
            $('#phone').val(valueObj.phone);
            $('#email').val(valueObj.email);
            $('#website').val(valueObj.website);
            $('#instituteCode').val(valueObj.instituteCode);
            $('#showInstituteImage').attr('src',valueObj.logo);
            $('.institute').attr('readonly','');
        });
        $('.searchInstitute').select2({
            placeholder: 'Search Institute with name or institute code',
            ajax: {
                dataType: 'json',
                url: '{{ url("ajax/education/search") }}',
                delay: 4,
                data: function(params) {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
                cache: true,
                processResults: function (data, page) {
                    console.log(data);
                    return {
                        results: data,
                        pagination: {
                            more: true
                        }
                    };
                }
            },
            delay: 250,
            escapeMarkup: function (markup) { return markup; },
            minimumInputLength: 2,
            templateResult: function(data){
                console.log(data);
                if(data.id=='0'){

                    return '<div>' +
                                '<img width="30" src="'+data.img+'"> '+data.text+
                            '</div>';
                }
                return '<div class="instituteSearchResultMain">' +
                            '<div class="instituteSearchResultImgDiv">' +
                                '<img width="30" src="'+data.img+'"> '+
                            '</div>' +
                            '<div class="instituteSearchResultInfoDiv">' +
                                '<p>'+data.text+'</p>'+
                                '<p>'+data.city+''+data.district+' '+data.website+'</p>'+
                            '</div>'+
                       '</div>';
            }
        });
    </script>
    <script>
        $(function() {
            $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd-m-yy'

            });
        });
    </script>
    <script>
        var loadFile = function(event) {
            var showFunc = document.getElementById('showInstituteImage');
            showFunc.src = URL.createObjectURL(event.target.files[0]);
            $('[for=instituteImage].active').removeClass('active');
        };
    </script>
    <style>
        .instituteSearchResultMain{display: block;}
        .instituteSearchResultImgDiv{ width:10%;float: left;margin-right: 5px;}
        .instituteSearchResultImgDiv img{ width:100%}
        .instituteSearchResultInfoDiv{}
        .instituteSearchResultInfoDiv p+p{line-height:10px;}
    </style>
@endsection