@extends('layouts.frontend-layout')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/smart.wizard/smart_wizard.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/smart.wizard/smart_wizard_theme_arrows.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/smart.wizard/smart_wizard_theme_circles.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/smart.wizard/smart_wizard_theme_dots.min.css')}}">
@endsection
@section('page-css')
  <link rel="stylesheet" href="{{asset('assets/styles/vendor/dropzone.min.css')}}">
  <style>
  .profile-pic {
        max-width: 200px;
        max-height: 200px;
        display: block;
    }

    .file-upload {
        display: none;
    }
    .circle {
        border-radius: 1000px !important;
        overflow: hidden;
        width: 128px;
        height: 128px;
        border: 8px solid rgb(236 235 235 / 70%);
        position: relative;
        /* top: 72px; */
    }
    img {
        max-width: 100%;
        height: auto;
    }
    .p-image {
    position: absolute;
    top: 145px;
    left: 58%;
    color: #666666;
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .p-image:hover {
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .upload-button {
        font-size: 1.4em;
        font-weight: 600;
    }

    .upload-button:hover {
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    color: #999;
    }
    </style>
@endsection

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-9">
        <!--  SmartWizard html -->
        <div id="smartwizard" class="sw-main sw-theme-default">
            <ul class="nav nav-tabs step-anchor">
                <li class="nav-item active"><a href="#step-1" class="nav-link">Step 1<br><small>About Your Startup</small></a></li>
                <li class="nav-item"><a href="#step-2" class="nav-link">Step 2<br><small>Short Intro</small></a></li>
                <li class="nav-item"><a href="#step-3" class="nav-link">Step 3<br><small>Team Members</small></a></li>
            </ul>
                <div class="sw-container tab-content" id="startup_wizard" style="min-height: 147.4px;">
                    <form action='{{ route("client.startup.update", [$startup]) }}' id="startup_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div id="step-1" class="tab-pane step-content" style="position: relative;display: block; opacity: 1;">
                            <h3 class="border-bottom border-gray pb-2">Identity</h3>

                            <input type="hidden" id="id" name="id" value="{{ $startup }}">
                            <!-- <button id="button-select" type="button" class="btn btn-primary mb-1">Upload a profile image</button>
                            <div class="dropzone dropzone-area" id="button-select-upload" >
                                <div class="fallback">
                                    <input name="logo" type="file" multiple />
                                </div>
                                <div class="dz-message">Drop Files Here To Upload</div>
                            </div> -->
                            <div class="row justify-content-center">
                                <div class="small-12 medium-2 large-2 columns">
                                    <div class="circle">
                                    <!-- User Profile Image -->
                                    <img class="profile-pic" src="http://cdn.cutestpaw.com/wp-content/uploads/2012/07/l-Wittle-puppy-yawning.jpg">
                                    </div>
                                    <div class="p-image">
                                    <i class="i-Camera upload-button"></i>
                                        <input name="logo" class="file-upload" type="file" accept="image/*"/>
                                    </div>
                                </div>
                            </div>
                        
                        </div>

                        <div id="step-2" class="tab-pane step-content" style="display: none;">
                            <h3 class="border-bottom border-gray pb-2">Basic Informations</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="office_address"><b>Office Address</b></label>
                                        <input class="form-control form-control-rounded" name="office_address" id="office_address" type="text" placeholder="Enter your office address">
                                    </div>
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="country"><b>Base location</b></label>
                                        <input class="form-control form-control-rounded" name="country" id="country" type="text" placeholder="Enter your startup base location">
                                    </div>
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="establishment_date"><b>Establishment date</b></label>
                                        <input class="form-control form-control-rounded" name="establishment_date" id="establishment_date" type="date" >
                                    </div>
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="project_level"><b>Project level</b></label>
                                        <input class="form-control form-control-rounded" name="project_level" id="project_level" type="text" placeholder="Enter your first name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12 form-group mb-3">
                                        <label for="bio"><b>Short description <sup>Character limit: 255</sup></label>
                                        <textarea class="form-control form-control-rounded" name="bio" id="bio" rows="10" type="text" placeholder="Enter your first name"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="step-3" class="tab-pane step-content" style="display: none;">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        </div>
                    </form>

                </div>
                <!-- <div class="btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-end">
                    <button class="btn btn-info" type="submit">skip and save</button>
                    <div class="btn-group mr-2 sw-btn-group" role="group">
                        <button class="btn btn-secondary sw-btn-prev disabled" type="button">Previous</button>
                        <button class="btn btn-secondary sw-btn-next" type="button">Next</button>
                    </div>
                    <div class="btn-group mr-2 sw-btn-group" role="group" >
                        <button class="btn btn-info" type="submit">skip and save</button>
                    </div>
                </div> -->
        </div>
    </div>
</div>



@endsection
@section('page-js')
<script src="{{asset('assets/js/vendor/jquery.smartWizard.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script>
<script src="{{asset('assets/js/dropzone.script.js')}}"></script>
<script>
    $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});

$(".upload-button").on('click', function() {
   $(".file-upload").click();
});
});
</script>
@endsection

@section('bottom-js')
<script src="{{asset('assets/js/smart.wizard.script.js')}}"></script>
@endsection