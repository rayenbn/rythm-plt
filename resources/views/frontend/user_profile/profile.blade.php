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
<div class="card user-profile o-hidden mb-4" style="box-shadow: unset;">
    <div class="header-cover" style="background-image: url('../../dist-assets/images/photo-wide-4.jpg');">
        <button class="btn btn btn-outline-primary m-2" style="position:absolute;right: 10px;display: flex;" type="button">
            <i class="i-Camera upload-button mr-2"></i> Change cover photo
        </button>
    </div>
    <!-- <div class="user-info">
        <img class="profile-picture avatar-lg mb-2" src="{{ asset('frontend/images/faces/1.jpg') }}" alt="">
        <p class="m-0 text-24">{{ ucfirst($client->name) }}</p>
        <p class="text-muted mb-4">{{ $client->profession }}</p>
    </div> -->
    <!-- <button class="btn btn-outline-danger m-1 float-rigth col-4" type="button">Follow</button> -->

    <div class="row justify-content-center" >
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
<div class="row justify-content-md-center">
    <div class="col-lg-3 col-md-3 mb-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title"><b>Intro</b></div>
                <div class="ul-widget-app__browser-list">
                    <div class="mb-4" style="display: flex;">
                        <p class="text-light mb-1"><i class="i-Edit-Map text-22 mr-1"></i> Lives In <b class="text-dark ml-2">{{ $client->residence_location }}</b></p>
                    </div>
                    <div class="mb-4" style="display: flex;">
                        <p class="text-light mb-1"><i class="i-Calendar text-22 mr-1"></i> Birth Date <b class="text-dark ml-2">{{ $client->date_of_birth }}</b></p>
                    </div>
                    <div class="mb-4" style="display: flex;">
                        <p class="text-light mb-1"><i class="i-MaleFemale text-22 mr-1"></i> Email<b class="text-dark ml-2">{{ $client->email }}</b></p>
                    </div>
                    <!-- <div class="ul-widget-app__browser-list-1 mb-4"><i class="i-Shopping-Cart text-white cyan-500 rounded-circle p-2 mr-3"></i><span class="text-15">New Order Received</span><span class="text-mute">yesterday </span></div> -->
                   
                </div>
            </div>
        </div>
        @if ($client->startups)
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title"><b>Enrolled in {{ $client->startups->count() }} Startups</b></div>
                <div class="ul-widget-app__browser-list">
                    @foreach ($client->startups as $startup)
                    <div class="ul-widget-app__browser-list-1 mb-4" style="justify-content: normal;">
                        <img class="profile-picture avatar-sm rounded-circle" src="{{ asset('frontend/images/faces/4.jpg') }}" alt="alt">
                        <a href="{{ route('client.startup.show', [$startup->slug_name]) }}">
                        <span class="text-15 ml-3">{{ ucfirst($startup->company_name) }}</span>
                        </a>
                        <!-- <span class="badge badge-round-success pill m-1">$5000</span> -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="col-lg-7 col-md-7 mb-4">

        <div class="card mb-4">
            <div class="card-body">
                <div class="ul-widget__head __g-support v-margin ">
                    <div class="ul-widget__head-label">
                        <h3 class="ul-widget__head-title">Personal Information</h3>
                    </div>
                    <button class="btn btn-primary mb-2" type="button" data-toggle="modal" data-target=".edit-profile-info">Edit Info</button>
                </div>
                <!-- <h4>Personal Information</h4> -->
                
                <p class="mb-4 mt-4">{!! $client->bio !!}</p>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Calendar text-16 mr-1"></i> Birth Date</p><span>{{ $client->date_of_birth }}</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Edit-Map text-16 mr-1"></i> Birth Place</p><span>{{ $client->country }}</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Lives In</p><span>{{ $client->residence_location }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Gender</p><span>Male</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p><span>{{ $client->email }}</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Website</p><span>{{ $client->website_url }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 mr-1"></i> Profession</p><span>{{ $client->profession }}</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Professor text-16 mr-1"></i> Experience</p><span>8 Years</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Home1 text-16 mr-1"></i> School</p><span>{{ $client->school }}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Other Info</h4>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum dolore labore reiciendis ab quo ducimus reprehenderit natus debitis, provident ad iure sed aut animi dolor incidunt voluptatem. Blanditiis, nobis aut.</p>
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Plane text-32 text-primary"></i>
                        <p class="text-16 mt-1">Travelling</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Camera text-32 text-primary"></i>
                        <p class="text-16 mt-1">Photography</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Car-3 text-32 text-primary"></i>
                        <p class="text-16 mt-1">Driving</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Gamepad-2 text-32 text-primary"></i>
                        <p class="text-16 mt-1">Gaming</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Music-Note-2 text-32 text-primary"></i>
                        <p class="text-16 mt-1">Music</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Shopping-Bag text-32 text-primary"></i>
                        <p class="text-16 mt-1">Shopping</p>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

<div class="modal fade edit-profile-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update your profile info</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('client.user-profile.edit', [$client->id]) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT') 

                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 form-group mb-3">
                                <label for="date_of_birth"><b>Date of Birth</b></label>
                                <input class="form-control form-control-rounded" name="date_of_birth" id="date_of_birth" type="date" value="{{ old('date_of_birth', isset($client) ? $client->date_of_birth : '') }}" placeholder="Enter your Date of Birth">
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="gender"><b>Gender</b></label>
                                <input class="form-control form-control-rounded" name="gender" id="gender" type="text" value="{{ old('gender', isset($client) ? $client->gender : '') }}" placeholder="Your gender">
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="residence_location"><b>Residence Location</b></label>
                                <select class="form-control form-control-rounded" name="residence_location" id="residence_location">
                                    <option value="" selected>Choose</option>
                                    @foreach (Config::get('constants.countries') as $ind => $country)
                                    <option value="{{$country}}">{{$country}}</option>
                                    @endforeach
                                </select>
                                <!-- <input class="form-control form-control-rounded" name="residence_location" id="residence_location" type="text" value="{{ old('residence_location', isset($client) ? $client->residence_location : '') }}" placeholder="Enter where you are residence country"> -->
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="profession"><b>Profession</b></label>
                                <input class="form-control form-control-rounded" name="profession" id="profession" type="text" value="{{ old('profession', isset($client) ? $client->profession : '') }}" placeholder="Enter your Profession">
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="school"><b>School</b></label>
                                <input class="form-control form-control-rounded" name="school" id="school" type="text" value="{{ old('school', isset($client) ? $client->school : '') }}" placeholder="Enter your school from where you are graduated">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 form-group mb-3">
                                <label for="bio"><b>Bio<sup>Character limit: 255</sup></label>
                                <textarea class="form-control form-control-rounded" name="bio" id="bio" rows="10" type="text" value="{{ old('bio', isset($client) ? $client->bio : '') }}" placeholder="Short decription about yourself"></textarea>
                            </div>

                            <!-- <div class="col-md-12 form-group mb-3">
                                <label for="website_url"><b>Website url</b></label>
                                <input class="form-control form-control-rounded" name="website_url" id="website_url" type="text" placeholder="http://">
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="linked_url"><b>Linked url</b></label>
                                <input class="form-control form-control-rounded" name="linked_url" id="linked_url" type="text" placeholder="http://">
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="github_url"><b>Github url</b></label>
                                <input class="form-control form-control-rounded" name="github_url" id="github_url" type="text" placeholder="http://">
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="fb_url"><b>facebook url</b></label>
                                <input class="form-control form-control-rounded" name="fb_url" id="fb_url" type="text" placeholder="http://">
                            </div>

                            <div class="col-md-12 form-group mb-3">
                                <label for="ing_url"><b>Instagram url</b></label>
                                <input class="form-control form-control-rounded" name="ing_url" id="ing_url" type="text" placeholder="http://">
                            </div> -->
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