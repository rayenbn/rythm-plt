@extends('layouts.frontend-layout')
@section('content')
<div class="col-xl-8 col-md-12 mb-4">
    <div class="card mb-4">
        <div class="card-body">
            <div class="card-title mb-3">Browse and Apply 2021 China Scholarships</div>
            <form id="universities_search_form">
                @csrf
                @method('POST') 
                <div class="row">
               
                    <div class="col-md-6 form-group row mb-3">
                        <label class="col-sm-3 col-form-label" for="city"><b>City</b></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-rounded" name="city">
                                <option value="">Any</option>
                                @foreach (Config::get('constants.chinaCities') as $ind => $city)
                                    <option value="{{$city}}">{{$city}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-md-6 form-group row mb-3">
                        <label class="col-sm-3 col-form-label"  for="university"><b>University</b></label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-rounded" name="university" type="text" placeholder="Search by university name">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="button" id="filter_universities" class="btn btn-primary float-right">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @foreach ($universities as $university)
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 pr-0 mr-0">
                    <div class="ul-widget5__pic"><img src="{{ $university->logo[0]['preview_thumbnail'] }}" alt="Third slide"></div>
                </div>
                <div class="col-md-6">
                    <h2 class="mt-2">{{ $university->name }}</h2>
                    <p class="ul-widget5__desc" style="font-size: 1.2rem;">{{ $university->location }}</p>
                    <div class="ul-widget5__info"><span>Number of scholarships:</span><span class="text-primary"> {{ $university->scholarships->count() }}</span><span>Applications:</span><span class="text-primary">{{ $university->name }}</span></div>
                    
                </div>
                <div class="ul-widget5__content">
                                    <div class="ul-widget5__stats">
                <a class="btn btn-raised btn-raised-primary m-1" href="{{ $university->path() }}">Learn More</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
@section('page-js')
<script>
    function filterResults () { 
        let city = $("#universities_search_form select[name='city']").val();

        let university = $("#universities_search_form input[name='university']").val();

        let href = 'universities?';

        if(city) {
            href += 'filter[location]=' + city;
        }

        if(university) {
            href += '&filter[name]=' + university;
        }
        
        document.location.href=href;
    }
    document.getElementById("filter_universities").addEventListener("click", filterResults);
</script>

@endsection