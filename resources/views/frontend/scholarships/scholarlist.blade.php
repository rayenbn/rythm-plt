@extends('layouts.frontend-layout')
@section('content')
<div class="row">

    <div class="col-xl-8 col-md-8 mb-4">
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
                                @if ($scholarships->count() < 1)
                                <p>No scholarships found</p>
                                @endif
                                @foreach ($scholarships as $scholarship)
                                <div class="ul-widget5__item">
                                    <div class="ul-widget5__content">
                                        <div class="ul-widget5__pic"><img src="{{ $scholarship->university->logo[0]['preview_thumbnail'] }}" alt="Third slide"></div>
                                        <div class="ul-widget5__section"><a class="ul-widget4__title" href="#">{{ $scholarship->university->name }}</a>
                                            <p class="ul-widget5__desc">{{ $scholarship->degree->name }}</p>
                                            <div class="ul-widget5__info"><span>Type:</span><span class="text-primary">{{ $scholarship->scholar_type }}</span><span>Language:</span><span class="text-primary">{{ $scholarship->teaching_lang }}</span></div>
                                            <div class="ul-widget5__info"><span>Duration:</span><span class="text-primary">{{ $scholarship->scholar_duration }}</span><span>Coverage:</span><span class="text-primary">{{ $scholarship->scholar_coverage }}</span></div>
                                        </div>
                                    </div>
                                    <div class="ul-widget5__content">
                                        <div class="ul-widget5__stats">
                                        <a class="btn btn-raised btn-raised-primary m-1" href="{{ $scholarship->path() }}">Learn More</a>
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

    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">Browse and Apply 2021 China Scholarships</div>
                <form>
                    <div class="row">
                    <form id="scholarship_search_form">
                        @csrf
                        @method('POST') 
                        <div class="col-md-12 form-group mb-3">
                            <label class="col-form-label"  for="program"><b>Program</b></label>
                                <input class="form-control form-control-rounded" id="program"  name="program" type="text" placeholder="Pick a program name">
                        </div>

                        <div class="col-md-12 form-group mb-3" >
                            <label for="type"><b>Type:</b> </label>
                            <div style="display: flex;flex-wrap: wrap;">
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="type" value=""><span>All</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="type" value="full scholarship"><span>Full Scholarship</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input type="radio" name="type" value="partial scholarship"><span>Partial Scholarship</span><span class="checkmark"></span>
                                </label>    
                            </div>
                        </div>
                        
                        <div class="col-md-12 form-group mb-3" >
                            <label for="coverage"><b>Coverage:</b> </label>
                            <div style="display: flex;flex-wrap: wrap;">
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="coverage" value=""><span>Any</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="coverage" value="tuition"><span>Tuition</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="coverage" value="accommodation"><span>Accommodation</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="coverage" value="living allowance"><span>Living Allowance</span><span class="checkmark"></span>
                                </label>
                                <!-- <label class="checkbox checkbox-outline-primary">
                                    <input type="radio" name="coverage" ><span>Other</span><span class="checkmark"></span>
                                </label> -->
                            </div>
                        </div>

                        <div class="col-md-6 form-group  mb-3">
                            <label class="col-form-label"  for="city"><b>City</b></label>
                                <select name="city" class="form-control form-control-rounded">
                                    <option value="">Any</option>
                                    @foreach (Config::get('constants.chinaCities') as $ind => $city)
                                        <option value="{{$city}}">{{$city}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="col-md-6 form-group  mb-3">
                            <label class="col-form-label" for="university"><b>University</b></label>
                                <select name="university" class="form-control form-control-rounded">
                                    <option value="">Any</option>
                                    @foreach ($universities_search as $ind => $university)
                                        <option value="{{$university->name}}">{{$university->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label for="picker3"><b>Degree:</b> </label>
                            <div style="display: flex;flex-wrap: wrap;">
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="degree" value=""><span>All</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="degree" value="bachelor"><span>Bachelor</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="degree" value="master"><span>Master</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="degree" value="doctoral"><span>Doctoral</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input type="radio" name="degree" value="associate"><span>Associate</span><span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12 form-group mb-3" >
                            <label for="picker3"><b>Language:</b> </label>
                            <div style="display: flex;flex-wrap: wrap;">
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="language" value=""><span>All</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="language" value="chinese"><span>Chinese</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="language" value="english"><span>English</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input type="radio" name="language" value="other"><span>Other</span><span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <!-- <div class="col-md-12 form-group mb-3" >
                            <label for="picker3"><b>Semester:</b> </label>
                            <div style="display: flex;flex-wrap: wrap;">
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="semester" ><span>All</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="semester"><span>Spring</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="semester"><span>Autumn</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input type="radio" name="semester"><span>Other</span><span class="checkmark"></span>
                                </label>
                            </div>
                        </div> -->

                        

                        <div class="col-md-12">
                            <button type="button" id="filter_scholarships" class="btn btn-primary float-right">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script>
    function filterResults () { 
        let type = $("input[name='type']:checked").val();
        let coverage = $("input[name='coverage']:checked").val();
        let city = $("select[name='city']").val();
        let university = $("select[name='university']").val();
        let degree = $("input[name='degree']:checked").val();
        let language = $("input[name='language']:checked").val();
        let program = $("input[name='program']").val();

        console.log('type:', type);
        console.log('coverage:', coverage);
        console.log('city:', city);
        console.log('university:', university);
        console.log('degree:', degree);
        console.log('language:', language);
        console.log('program:', program);

        let href = 'scholarships?';

        if(program) {
            href += 'filter[program]=' + program;
        }

        if(type) {
            href += '&filter[scholar_type]=' + type;
        }

        if(coverage) {
            href += '&filter[scholar_coverage]=' + coverage;
        }

        if(university) {
            href += '&filter[university_name]=' + university;
        }

        if(city) {
            href += '&filter[university_location]=' + city;
        }

        if(degree) {
            href += '&filter[degree_name]=' + degree;
        }

        if(language) {
            href += '&filter[teaching_lang]=' + language;
        }
        

        document.location.href=href;
    }
    document.getElementById("filter_scholarships").addEventListener("click", filterResults);
</script>

@endsection