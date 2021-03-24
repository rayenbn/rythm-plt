@extends('layouts.frontend-layout')
@section('content')
<div class="row justify-content-between">
    <div class="col-lg-3 col-md-3">
        <h4>Open Scholarships</h4>
        <!-- <div class="card mb-4">
            <div class="card-body">
         
                <div class="ul-widget__body">
                    <div class="tab-content">
                        <div class="tab-pane active show" >
                            <div class="ul-widget5">
                                @foreach ($scholarships as $scholarship)
                                <div class="ul-widget5__item">
                                    <div class="ul-widget5__content">
                                        <div class="ul-widget5__pic">
                                            <img src="{{ $scholarship->university->logo[0]['preview_thumbnail'] }}" alt="Third slide">
                                        </div>
                                        <div class="ul-widget5__section"><a class="ul-widget4__title" href="{{ $scholarship->path() }}">{{ $scholarship->university->name }}</a>
                                            <p class="ul-widget5__desc">
                                            @foreach ($scholarship->levels as $level)
                                            {{ $level->name }}
                                            @endforeach
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <h4>Top universities</h4>
        @foreach ($universities as $university)
        <div class="card mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 pr-0 mr-0">
                        <div class="ul-widget5__pic"><img src="{{ $university->logo[0]['preview_thumbnail'] }}" alt="Third slide">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h5 >{{ $university->name }}</h5>
                        <p class="ul-widget5__desc" style="font-size: 1rem;">{{ $university->location }}</p>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="col-lg-5 col-md-5">
        <!-- Post a post card -->
        <div class="card mb-4">
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
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="ul-widget-card__title">Gull Admin</h5>
                <p class="card-text text-mute">By Frontend developer</p><img class="d-block w-100 rounded" src="{{ asset('frontend/images/products/headphone-1.jpg') }}" alt="Second slide">
                <div class="ul-widget-card__rate-icon --version-2"><span><a href=""><i class="i-Like text-success"></i></a> 576</span><span><a href=""><i class="i-Speach-Bubble-3 text-primary"></i></a> 350</span><span><a href=""><i class="i-Heart1 text-danger"></i></a> 255</span></div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="ul-widget-card__title">Gull Admin</h5>
                <p class="card-text text-mute">By Frontend developer</p><img class="d-block w-100 rounded" src="{{ asset('frontend/images/products/headphone-1.jpg') }}" alt="Second slide">
                <div class="ul-widget-card__rate-icon --version-2"><span><a href=""><i class="i-Like text-success"></i></a> 576</span><span><a href=""><i class="i-Speach-Bubble-3 text-primary"></i></a> 350</span><span><a href=""><i class="i-Heart1 text-danger"></i></a> 255</span></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3">
        <div class="mb-3">
            <h4>Latest created startups</h4>
            @foreach ($startups as $startup)
            <div class="ul-widget4__item ul-widget4__users">
                <div class="ul-widget4__img">
                    <img class="profile-picture avatar-sm rounded-circle" src="{{ asset('frontend/images/faces/4.jpg') }}" alt="" >
                </div>
                <div class="ul-widget2__info ul-widget4__users-info"><a class="ul-widget2__title" href="{{ route('client.startup.show', [$startup->slug_name]) }}">{{ ucfirst($startup->company_name) }}</a>
                <span class="ul-widget2__username" href="{{ route('client.startup.show', [$startup->slug_name]) }}">{{ ucfirst($startup->industry) }}</span></div>
                <!-- <div class="ul-widget4__actions">
                    <button class="btn btn-outline-danger m-1" type="button">Follow</button>
                </div> -->
            </div>
            @endforeach
        </div>
        <div class="mb-3">
            <h4>Ecosystems</h4>
            <div class="ul-widget4__item ul-widget4__users">
                <div class="ul-widget4__img">
                    <img src="{{ asset('frontend/images/faces/4.jpg') }}" alt="" >
                </div>
                <div class="ul-widget2__info ul-widget4__users-info"><a class="ul-widget2__title" href="#">frfv jrefjbrj</a>
                <span class="ul-widget2__username" href="#">China</span></div>
            </div>

            <div class="ul-widget4__item ul-widget4__users">
                <div class="ul-widget4__img">
                    <img src="{{ asset('frontend/images/faces/4.jpg') }}" alt="" >
                </div>
                <div class="ul-widget2__info ul-widget4__users-info"><a class="ul-widget2__title" href="#">frfv jrefjbrj</a>
                <span class="ul-widget2__username" href="#">Tunisia</span></div>
            </div>
        </div>
    </div>
</div>
@endsection