@extends('layouts.frontend-layout')
@section('content')
<div class="col-xl-8 col-md-12 mb-4">
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
                <a class="btn btn-raised btn-raised-primary m-1" href="{{ route('client.universities-list.show', $university->id) }}">Learn More</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection