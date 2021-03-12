@extends('layouts.frontend-layout')
@section('content')
<div class="card user-profile o-hidden mb-4">
    <div class="header-cover" style="background-image: url('../../dist-assets/images/photo-wide-4.jpg')"></div>
    <div class="user-info"><img class="profile-picture avatar-lg mb-2" src="{{ asset('frontend/images/faces/1.jpg') }}" alt="">
        <p class="m-0 text-24">{{ ucfirst($client->name) }}</p>
        <p class="text-muted mb-4">{{ $client->profession }}</p>
    </div>
    <!-- <button class="btn btn-outline-danger m-1 float-rigth col-4" type="button">Follow</button> -->
</div>
<div class="row">
    <div class="col-lg-3 col-md-3 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Notification</div>
                <div class="ul-widget-app__browser-list">
                    @foreach ($client->startups as $startup)
                    <div class="ul-widget-app__browser-list-1 mb-4">
                        <i class="i-Bell1 text-white bg-warning rounded-circle p-2 mr-3"></i>
                        <span class="text-15">{{ ucfirst($startup->company_name) }}</span>
                        <a href="{{ route('client.startup.show', [$startup->slug_name]) }}"><span class="text-mute">Go</span>
                    </div>
                    @endforeach
                    <div class="ul-widget-app__browser-list-1 mb-4"><i class="i-Internet text-white green-500 rounded-circle p-2 mr-3"></i><span class="text-15">Traffic Overloaded</span><span class="text-mute">4 Hours ago</span></div>
                    <div class="ul-widget-app__browser-list-1 mb-4"><i class="i-Shopping-Cart text-white cyan-500 rounded-circle p-2 mr-3"></i><span class="text-15">New Order Received</span><span class="text-mute">yesterday </span></div>
                    <div class="ul-widget-app__browser-list-1 mb-4"><i class="i-Add-UserStar text-white teal-500 rounded-circle p-2 mr-3"></i><span class="text-15">New User </span><span class="text-mute">2 April </span></div>
                    <div class="ul-widget-app__browser-list-1 mb-4"><i class="i-Bell text-white purple-500 rounded-circle p-2 mr-3"></i><span class="text-15">New Update </span><span class="text-mute">2 April </span></div>
                    <div class="ul-widget-app__browser-list-1 mb-4"><i class="i-Shopping-Cart text-white bg-danger rounded-circle p-2 mr-3"></i><span class="text-15">New Order Received</span><span class="text-mute">yesterday </span></div>
                    <div class="ul-widget-app__browser-list-1 mb-4"><i class="i-Internet text-white green-500 rounded-circle p-2 mr-3"></i><span class="text-15">Traffic Overloaded</span><span class="text-mute">4 Hours ago</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 mb-4">

        <div class="card mb-4">
            <div class="card-body">
            <h4>Personal Information</h4>
            {!! $client->bio !!}
            <hr>
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
</div>
@endsection