@extends('layouts.frontend-layout')
@section('content')
<div class="col-xl-8 col-md-12 mb-4">
<div class="card mb-4">
        <div class="card-body">
            <div class="card-title mb-3">Browse and Apply 2021 China Scholarships</div>
            <form>
                <div class="row">
               
                    <div class="col-md-6 form-group row mb-3">
                        <label class="col-sm-3 col-form-label" for="picker1"><b>City</b></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-rounded">
                                <option>Option 1</option>
                                <option>Option 1</option>
                                <option>Option 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 form-group row mb-3">
                        <label class="col-sm-3 col-form-label" for="picker1"><b>University</b></label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-rounded">
                                <option>Option 1</option>
                                <option>Option 1</option>
                                <option>Option 1</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 form-group row mb-3">
                        <label class="col-sm-3 col-form-label"  for="firstName2"><b>Program</b></label>
                        <div class="col-sm-9">
                            <input class="form-control form-control-rounded" id="firstName2" type="text" placeholder="Pick a program name">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary">Submit</button>
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