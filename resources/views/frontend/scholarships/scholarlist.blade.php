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
                                @foreach ($scholarships as $scholarship)
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
                        <div class="col-md-12 form-group mb-3" >
                            <label for="picker3"><b>Type:</b> </label>
                            <div style="display: flex;flex-wrap: wrap;">
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio" ><span>All</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio"><span>Full Scholarship</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input type="radio" name="radio"><span>Partial Scholarship</span><span class="checkmark"></span>
                                </label>    
                            </div>
                        </div>
                        
                        <div class="col-md-12 form-group mb-3" >
                            <label for="picker3"><b>Coverage:</b> </label>
                            <div style="display: flex;flex-wrap: wrap;">
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio" ><span>Tuition</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio"><span>Accommodation</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio"><span>Living Allowance</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input type="radio" name="radio"><span>Other</span><span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 form-group  mb-3">
                            <label class="col-form-label"  for="picker1"><b>City</b></label>
                                <select class="form-control form-control-rounded">
                                    <option>Option 1</option>
                                    <option>Option 1</option>
                                    <option>Option 1</option>
                                </select>
                        </div>
                        <div class="col-md-6 form-group  mb-3">
                            <label class="col-form-label" for="picker1"><b>University</b></label>
                                <select class="form-control form-control-rounded">
                                    <option>Option 1</option>
                                    <option>Option 1</option>
                                    <option>Option 1</option>
                                </select>
                        </div>

                        <div class="col-md-12 form-group mb-3">
                            <label for="picker3"><b>Degree:</b> </label>
                            <div style="display: flex;flex-wrap: wrap;">
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio" ><span>All</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio" ><span>Bachelor</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio"><span>Master</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio"><span>Doctoral</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input type="radio" name="radio"><span>Associate</span><span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12 form-group mb-3" >
                            <label for="picker3"><b>Language:</b> </label>
                            <div style="display: flex;flex-wrap: wrap;">
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio" ><span>All</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio"><span>Chinese</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio"><span>English</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input type="radio" name="radio"><span>Other</span><span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12 form-group mb-3" >
                            <label for="picker3"><b>Semester:</b> </label>
                            <div style="display: flex;flex-wrap: wrap;">
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio" ><span>All</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio"><span>Spring</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary mr-4">
                                    <input type="radio" name="radio"><span>Autumn</span><span class="checkmark"></span>
                                </label>
                                <label class="checkbox checkbox-outline-primary">
                                    <input type="radio" name="radio"><span>Other</span><span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label class="col-form-label"  for="firstName2"><b>Program</b></label>
                                <input class="form-control form-control-rounded" id="firstName2" type="text" placeholder="Pick a program name">
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary float-right">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection