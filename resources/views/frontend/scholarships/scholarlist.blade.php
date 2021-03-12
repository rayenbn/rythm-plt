@extends('layouts.frontend-layout')
@section('content')
<div class="col-xl-8 col-md-12 mb-4">
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

@endsection