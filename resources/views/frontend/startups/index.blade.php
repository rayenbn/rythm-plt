@extends('layouts.frontend-layout')
@section('content')
<div class="col-xl-12 col-md-12 mb-4 row">
    <div class="card mb-4">
        <div class="card-body">
            <div class="card-title mb-3"><b>Search for a Startup</b></div>
            <form id="startups_search_form">
                @csrf
                @method('POST') 
                <div class="row">
                    <div class="col-md-4 form-group row mb-3">
                        <label class="col-sm-3 col-form-label" for="country"><b>Country</b></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-rounded" name="country" id="country">
                                <option value="" selected>Choose</option>
                                @foreach (Config::get('constants.countries') as $ind => $country)
                                <option value="{{$country}}">{{$country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4 form-group row mb-3">
                        <label class="col-sm-3 col-form-label" for="industry"><b>Industry</b></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-rounded" name="industry" >
                                <option value="" selected>Choose</option>
                                @foreach (Config::get('constants.industries') as $ind => $industry)
                                <option value="{{$industry}}">{{$industry}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 form-group row mb-3">
                        <label class="col-sm-3 col-form-label"  for="company_name"><b>Company Name</b></label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-rounded" name="company_name" type="text" placeholder="Pick a program name">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="button" id="filter_startups" class="btn btn-primary float-right">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-xl-12 col-md-12 mb-4 row">
    @foreach ($startups as $startup)
    <div class="card col-3 mb-4">
        <div class="card-body">
            <div class="ul-widget-card__title-info text-center mb-3">
                <p class="m-0 text-24">{{ $startup->company_name }}</p>
                <p class="text-muted m-0">{{ $startup->industry }}</p>
            </div>
            <div class="user-profile mb-4">
                <div class="ul-widget-card__user-info"><img class="profile-picture avatar-lg mb-2" src="{{ asset('frontend/images/faces/5.jpg') }}" alt="alt"></div>
            </div>
            <div class="ul-widget-card__full-status mb-3">
                <div class="ul-widget-card__status1"><span>{{ $startup->country }}</span><span class="text-mute">Country</span></div>
                <div class="ul-widget-card__status1"><span>12</span><span class="text-mute">Jobs</span></div>
                <div class="ul-widget-card__status1"><span>2.5M</span><span class="text-mute">Funds</span></div>
            </div>
            <div class="mt-2">
                <a class="btn btn-primary btn-block m-1" href="{{ route('client.startup.show', [$startup->slug_name]) }}">Follow</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
@section('page-js')
<script>
    function filterResults () { 
        let country = $("#startups_search_form select[name='country']").val();

        let industry = $("#startups_search_form select[name='industry']").val();

        let company_name = $("#startups_search_form input[name='company_name']").val();

        let href = 'startup?';

        if(country) {
            href += 'filter[country]=' + country;
        }

        if(industry) {
            href += '&filter[industry]=' + industry;
        }

        if(company_name) {
            href += '&filter[company_name]=' + company_name;
        }
        
        document.location.href=href;
    }
    document.getElementById("filter_startups").addEventListener("click", filterResults);
</script>

@endsection