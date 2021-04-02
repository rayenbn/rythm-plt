@extends('layouts.frontend-layout')
@section('page-css')
  <style>
  .profile-pic {
        max-width: 200px;
        max-height: 200px;
        display: block;
    }

    .file-upload {
        display: none;
    }
    .p-image {
        position: absolute;
        top: 70px;
        left: 53%;
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
<div class="card user-profile o-hidden mb-4 " style="box-shadow: unset;">
    <div class="header-cover" style="background-image: url('../../assets/images/photo-wide-4.jpg')"></div>
    <!-- <div class="user-info" style="position: relative;">
        <img class="profile-picture avatar-lg mb-2" src="{{ asset('frontend/images/faces/1.jpg') }}" alt="">
        <div class="p-image">
            <i class="i-Camera upload-button"></i>
            <input name="logo" class="file-upload" type="file" accept="image/*"/>
        </div>
        <p class="m-0 text-24">{{ ucfirst($startup->company_name) }}</p>
        <p class="text-muted mb-4">{{ $startup->country }}</p>
    </div> -->
    <!-- <button class="btn btn-outline-danger m-1 float-rigth col-4" type="button">Follow</button> -->
    
</div>

<div class="row justify-content-md-center">
    <div class="col-lg-10 col-md-10 mb-4">
        <div class="card mb-4" style="box-shadow: unset;">
            <div class="row no-gutters">
                    <div class="mx-4" style="width: 100x">
                        <img class="rounded-circle " src="{{ asset('frontend/images/faces/1.jpg') }}" alt="">
                    </div>
                    <div class="col-xs-12 " style="display: grid;align-content: center;">
                        <p class="ml-4 mr-0 mb-0  text-24">{{ ucfirst($startup->company_name) }}</p>
                        <p class="text-muted ml-4 mb-4">{{ $startup->country }}</p>
                     </div>
            </div>
        </div>
                <button class="btn btn-raised btn-raised-secondary m-1" type="button">Secondary</button>
    </div>
</div>

<div class="row justify-content-md-center">
    <div class="col-lg-3 col-md-3 mb-4">
        <div class="card mb-4">
            <div class="card-body">
                <!-- begin::widget-stats-1-->
                <div class="ul-widget1">
                    <div class="ul-widget__item">
                        <div class="ul-widget__info">
                            <h3 class="ul-widget1__title">About</h3>
                            <span class="ul-widget__desc text-mute">{{ $startup->bio }}</span>
                        </div>
                    </div>
                    @if($startup->industry)
                    <div class="ul-widget__item">
                        <div class="ul-widget__info">
                            <h3 class="ul-widget1__title">Industry</h3>
                            <span class="ul-widget__desc text-mute">{{ $startup->industry }}</span>
                        </div>
                    </div>
                    @endif
                    @if($startup->project_level)
                    <div class="ul-widget__item">
                        <div class="ul-widget__info">
                            <h3 class="ul-widget1__title">Project Level </h3>
                            <span class="ul-widget__desc text-mute">{{ $startup->project_level }}</span>
                        </div>
                    </div>
                    @endif
                    @if($startup->office_address)
                    <div class="ul-widget__item">
                        <div class="ul-widget__info">
                            <h3 class="ul-widget1__title">Office Address</h3>
                            <span class="ul-widget__desc text-mute">{{ $startup->office_address }}</span>
                        </div>
                    </div>
                    @endif
                    @if($startup->establishment_date)
                    <div class="ul-widget__item">
                        <div class="ul-widget__info">
                            <h3 class="ul-widget1__title">Establishment Date</h3>
                            <span class="ul-widget__desc text-mute">{{ $startup->establishment_date }}</span>
                        </div>
                    </div>
                    @endif
                    
                </div>
                <!-- end::widget-stats-1-->
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <!-- <div class="card-title mb-1">Feedback</div>
                <p class="text-mute">Checking the feedback</p> -->
                <h3 class="heading">Team</h3>
                <p class="text-mute">This year we got 1246 feedback</p>
                <div class="ul-widget-app__work-list-img mt-4">
                    <img class="profile-picture avatar-sm rounded-circle" src="{{ asset('frontend/images/faces/4.jpg') }}" alt="alt">
                    <img class="profile-picture avatar-sm rounded-circle" src="{{ asset('frontend/images/faces/1.jpg') }}" alt="alt">
                    <img class="profile-picture avatar-sm rounded-circle" src="{{ asset('frontend/images/faces/5.jpg') }}" alt="alt">
                    <img class="profile-picture avatar-sm rounded-circle" src="{{ asset('frontend/images/faces/3.jpg') }}" alt="alt"></div>
                <div class="mt-5">
                    <button class="btn btn-primary m-1" type="button">View team members</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-7 mb-4">
     <!-- Post a post card -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="row row-xs">
                    <div class="col-md-12">
                        <textarea class="form-control" type="text" placeholder="Enter your username"></textarea>
                    </div>
                    <div class="col-md-2 mt-3 ">
                        <button class="btn btn-primary btn-block">Post</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- post a post card end -->
        <div class="card mb-4 text-left">
            <div class="card-body">
                <ul class="nav nav-pills" id="myPillTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="home-icon-pill" data-toggle="pill" href="#homePIll" role="tab" aria-controls="homePIll" aria-selected="false">
                        <i class="nav-icon i-Home1 mr-1"></i>Feeds</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#profilePIll" role="tab" aria-controls="profilePIll" aria-selected="false">
                        <i class="nav-icon i-Home1 mr-1"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active show" id="contact-icon-pill" data-toggle="pill" href="#contactPIll" role="tab" aria-controls="contactPIll" aria-selected="true">
                        <i class="nav-icon i-Home1 mr-1"></i> Jobs</a>
                    </li>
                </ul>
                
            </div>
        </div>
        <div class="tab-content p-0" id="myPillTabContent">
            <div class="tab-pane fade" id="homePIll" role="tabpanel" aria-labelledby="home-icon-pill">
                <!-- <div class="col-lg-4 col-xl-4 mt-3"> -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="ul-widget-card__title">Gull Admin</h5>
                            <p class="card-text text-mute">By Frontend developer</p><img class="d-block w-100 rounded" src="{{ asset('frontend/images/products/headphone-1.jpg') }}" alt="Second slide">
                            <div class="ul-widget-card__rate-icon --version-2"><span><a href=""><i class="i-Like text-success"></i></a> 576</span><span><a href=""><i class="i-Speach-Bubble-3 text-primary"></i></a> 350</span><span><a href=""><i class="i-Heart1 text-danger"></i></a> 255</span></div>
                        </div>
                    </div>
                <!-- </div> -->
                <!-- <div class="col-lg-4 col-xl-4 mt-3"> -->
                <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="ul-widget-card__title">Gull Admin</h5>
                            <p class="card-text text-mute">By Frontend developer</p><img class="d-block w-100 rounded" src="{{ asset('frontend/images/products/headphone-1.jpg') }}" alt="Second slide">
                            <div class="ul-widget-card__rate-icon --version-2"><span><a href=""><i class="i-Like text-success"></i></a> 576</span><span><a href=""><i class="i-Speach-Bubble-3 text-primary"></i></a> 350</span><span><a href=""><i class="i-Heart1 text-danger"></i></a> 255</span></div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>

            <div class="tab-pane fade" id="profilePIll" role="tabpanel" aria-labelledby="profile-icon-pill">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="ul-widget__head __g-support v-margin ">
                        <div class="ul-widget__head-label">
                            <h3 class="ul-widget__head-title">General Information</h3>
                        </div>
                        <button class="btn btn-primary mb-2" type="button" data-toggle="modal" data-target=".edit-startup-profile-info">Edit Info</button>
                    </div>
                        <!-- <h4>Personal Information</h4> -->
                        <p class="mb-4 mt-4">{!! $startup->description !!}</p>
                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <div class="mb-4">
                                    <p class="text-primary mb-1"><i class="i-Calendar text-16 mr-1"></i> Industry</p><span>{{ $startup->industry }}</span>
                                </div>
                                <div class="mb-4">
                                    <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Country</p><span>{{ $startup->country }}</span>
                                </div>
                               
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="mb-4">
                                    <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Office Address</p><span>{{ $startup->office_address }}</span>
                                </div>
                                <div class="mb-4">
                                    <p class="text-primary mb-1"><i class="i-Edit-Map text-16 mr-1"></i> Establishment Date</p><span>{{ $startup->establishment_date }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="mb-4">
                                    <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Project Level</p><span>{{ $startup->project_level }}</span>
                                </div>
                                <div class="mb-4">
                                    <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Website</p><span>{{ $startup->website_url }}</span>
                                </div>
                               
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade active show" id="contactPIll" role="tabpanel" aria-labelledby="contact-icon-pill">
                Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-
                table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore.
            </div>
        </div>
    </div>

</div>

<div class="modal fade edit-startup-profile-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update your startup profile info</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('client.startup.update', [$startup->id]) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT') 

                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 form-group mb-3">
                                <label for="company_name"><b>Company Name</b></label>
                                <input class="form-control form-control-rounded" name="company_name" id="company_name" type="text" value="{{ old('company_name', isset($startup) ? $startup->company_name : '') }}" placeholder="Enter your Company name">
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="industry"><b>Industry</b></label>
                                <input class="form-control form-control-rounded" name="industry" id="industry" type="text" value="{{ old('industry', isset($startup) ? $startup->industry : '') }}" placeholder="Your startup industry">
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="project_level"><b>Project Level</b></label>
                                <input class="form-control form-control-rounded" name="project_level" id="project_level" type="text" value="{{ old('project_level', isset($startup) ? $startup->project_level : '') }}" placeholder="Enter your project current level">
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="establishment_date"><b>Establishment Date</b></label>
                                <input class="form-control form-control-rounded" name="establishment_date" id="establishment_date" type="date" value="{{ old('establishment_date', isset($startup) ? $startup->establishment_date : '') }}" placeholder="Your startup establishment date">
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="country"><b>Country</b></label>
                                <input class="form-control form-control-rounded" name="country" id="country" type="text" value="{{ old('country', isset($startup) ? $startup->country : '') }}" placeholder="Enter the country where your startup is based in">
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="office_address"><b>Office Address</b></label>
                                <input class="form-control form-control-rounded" name="office_address" id="office_address" type="text" value="{{ old('office_address', isset($startup) ? $startup->office_address : '') }}" placeholder="Enter your startup office address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 form-group mb-3">
                                <label for="bio"><b>Bio<sup>Character limit: 255</sup></label>
                                <textarea class="form-control form-control-rounded" name="bio" id="bio" rows="5" type="text" placeholder="Short decription about your startup">{{ old('bio', isset($startup) ? $startup->bio : '') }}</textarea>
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="description"><b>Description</label>
                                <textarea class="form-control form-control-rounded" name="description" id="description" rows="10" type="text" placeholder="Decription about your startup">{{ old('description', isset($startup) ? $startup->description : '') }}</textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
                    <button class="btn btn-primary ml-2" type="submit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('page-js')
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