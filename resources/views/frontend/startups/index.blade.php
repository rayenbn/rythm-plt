@extends('layouts.frontend-layout')
@section('content')
<div class="col-xl-8 col-md-12 mb-4 row">
    @foreach ($startups as $startups)
    <div class="card col-4 mb-4">
        <div class="card-body">
            <div class="ul-widget-card__title-info text-center mb-3">
                <p class="m-0 text-24">{{ $startups->company_name }}</p>
                <p class="text-muted m-0">{{ $startups->industry }}</p>
            </div>
            <div class="user-profile mb-4">
                <div class="ul-widget-card__user-info"><img class="profile-picture avatar-lg mb-2" src="{{ asset('frontend/images/faces/5.jpg') }}" alt="alt"></div>
            </div>
            <div class="ul-widget-card__full-status mb-3">
                <div class="ul-widget-card__status1"><span>USA</span><span class="text-mute">Country</span></div>
                <div class="ul-widget-card__status1"><span>12</span><span class="text-mute">Jobs</span></div>
                <div class="ul-widget-card__status1"><span>2.5M</span><span class="text-mute">Funds</span></div>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary btn-block m-1" type="button">Follow</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection