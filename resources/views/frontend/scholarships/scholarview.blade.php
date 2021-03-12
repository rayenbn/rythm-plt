@extends('layouts.frontend-layout')
@section('content')
<!-- <div class="ul-widget5__pic"><img src="{{ asset('frontend/images/logo_126.png') }}" alt="Third slide"></div> -->
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="ul-widget5__pic"><img src="{{ $scholarship->university->logo[0]['preview_thumbnail'] }}" alt="Third slide"></div>
                    </div>
                    <div class="col-md-9">
                        <h5 class="card-title">{{ $scholarship->university->name }}</h5>
                        <p class="ul-widget5__desc">{{ $scholarship->degree }}</p>
                        <div class="ul-widget5__info"><span>Type:</span><span class="text-primary">{{ $scholarship->scholar_type }}</span><span>Language:</span><span class="text-primary">{{ $scholarship->teaching_lang }}</span></div>
                        <div class="ul-widget5__info"><span>Duration:</span><span class="text-primary">{{ $scholarship->scholar_duration }}</span><span>Coverage:</span><span class="text-primary">{{ $scholarship->scholar_coverage }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body ">
                <h5 class="card-title">Scholarship Coverage</h5>
                <p class="card-text">{!! $scholarship->desc !!}</p><a class="card-link" href="#">Card link</a><a class="card-link" href="#">Another link</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">How to Apply</h4>
                <p class="card-text">
                <span class="badge badge-success  m-2">Step 1:</span> Click the "Apply Now" button above and pay scholarship application and service fee (all available payment methods).
                </p>
                <p class="card-text"><span class="badge badge-success  m-2">Step 2:</span> Wait for the payment confirmation, then our counselor will provide documents guidance (including the application form).
                </p>
                <p class="card-text">
                <span class="badge badge-success  m-2">Step 3:</span> Submit documents and wait for the result and admission documents (including admission letter, visa letter).
                </p>
                <br>
                <p class="card-text">
                Deadline for Payment: <span style="color:red"><b>Feb 28, 2021</b></span>
                </p>
                <p class="card-text">
                Deadline for Documents: <span style="color:red"><b>Feb 28, 2021</b></span>
                </p>
                <p class="card-text">
                Application & Service Fee: <span style="color:red"><b>$500 </b></span>
                
                </p>

                <a href="#" class="btn btn-outline-primary m-1" type="button">Apply now</a>
            </div>
        </div>
    </div>
</div>
@endsection