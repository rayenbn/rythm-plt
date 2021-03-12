@extends('layouts.frontend-layout')
@section('content')
<div class="card user-profile o-hidden mb-4">
    <div class="header-cover" style="background-image: url('{{ $university->bg_image[0]['url'] }}')"></div>
    <div class="user-info"><img class="profile-picture avatar-lg mb-2" src="{{ $university->logo[0]['preview_thumbnail'] }}" alt="">
        <p class="m-0 text-24">{{ ucfirst($university->name) }}</p>
        <p class="text-muted m-0">{{ ucfirst($university->location) }}</p>
    </div>
    <!-- <div class="card-body">
        <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false">Timeline</a></li>
            <li class="nav-item"><a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a></li>
            <li class="nav-item"><a class="nav-link" id="friends-tab" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false">Friends</a></li>
            <li class="nav-item"><a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Photos</a></li>
        </ul>
    </div> -->
</div>
<!-- <div class="ul-widget5__pic"><img src="{{ asset('frontend/images/logo_126.png') }}" alt="Third slide"></div> -->
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body ">
                <h5 class="card-title">About {{ ucfirst($university->name) }}</h5>
                <p class="card-text">{!! $university->desc !!}</p>
                
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="ul-widget__head">
                    <div class="ul-widget__head-label">
                        <h3 class="ul-widget__head-title mb-4">Scholarships List</h3>
                    </div>
                    <!-- <div class="ul-widget__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold ul-widget-nav-tabs-line" role="tablist">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#ul-widget5-tab1-content" role="tab" aria-selected="true">Latest</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ul-widget5-tab2-content" role="tab" aria-selected="false">Month</a></li>
                        </ul>
                    </div> -->
                </div>
                <div class="ul-widget__body">
                    <div class="tab-content">
                        <div class="tab-pane active show" >
                            <div class="ul-widget5">
                                @foreach ($university->scholarships as $scholarship)
                                <div class="ul-widget5__item">
                                    <div class="ul-widget5__content">
                                        <div class="ul-widget5__pic"><img src="{{ $scholarship->university->logo[0]['preview_thumbnail'] }}" alt="Third slide"></div>
                                        <div class="ul-widget5__section"><a class="ul-widget4__title" href="#">{{ $scholarship->university->name }}</a>
                                            <p class="ul-widget5__desc">{{ $scholarship->degree }}</p>
                                            <div class="ul-widget5__info"><span>Type:</span><span class="text-primary">{{ $scholarship->scholar_type }}</span><span>Language:</span><span class="text-primary">{{ $scholarship->teaching_lang }}</span></div>
                                            <div class="ul-widget5__info"><span>Duration:</span><span class="text-primary">{{ $scholarship->scholar_duration }}</span><span>Coverage:</span><span class="text-primary">{{ $scholarship->scholar_coverage }}</span></div>
                                        </div>
                                    </div>
                                    <div class="ul-widget5__content">
                                        <div class="ul-widget5__stats">
                                        <a class="btn btn-raised btn-raised-primary m-1" href="{{ route('client.scholarship-list.show', $scholarship->id) }}">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <div class="col-md-4">
        <div class="card text-left mb-4">
            <div class="card-body">
                <h4 class="card-title mb-3">Carousel With Keyboard Option</h4>
                <p>Whether the carousel should react to keyboard events.Default <code>true</code></p>
                <div class="carousel_wrap">
                    <div class="carousel slide" id="carouselExampleKeyboard" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#carouselExampleKeyboard" data-slide-to="0"></li>
                            <li data-target="#carouselExampleKeyboard" data-slide-to="1" class=""></li>
                            <li data-target="#carouselExampleKeyboard" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active"><img class="d-block w-100" src="{{ asset('frontend/images/products/headphone-1.jpg') }}" alt="First slide"></div>
                            <div class="carousel-item"><img class="d-block w-100" src="{{ asset('frontend/images/products/iphone-1.jpg') }}" alt="Second slide"></div>
                            <div class="carousel-item"><img class="d-block w-100" src="{{ asset('frontend/images/products/headphone-1.jpg') }}" alt="Third slide"></div>
                        </div><a class="carousel-control-prev" href="#carouselExampleKeyboard" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleKeyboard" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection