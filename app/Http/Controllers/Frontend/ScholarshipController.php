<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Models\University;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $scholarships = Scholarship::all();
        $universities_search = University::all();

        $scholarships = QueryBuilder::for(Scholarship::class)
        ->join('universities', 'universities.id', 'scholarships.university_id')
        ->join('degrees', 'degrees.id', 'scholarships.university_id')
        ->allowedFilters([
                'scholar_type', 
                'scholar_coverage',
                'teaching_lang',
                'program',
                AllowedFilter::partial('university_name', 'universities.name'),
                AllowedFilter::partial('university_location', 'universities.location'),
                AllowedFilter::partial('degree_name', 'degrees.name')
            ])
        ->get();

        // dd($scholarships);
        return view('frontend.scholarships.scholarlist', compact('scholarships', 'universities_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('frontend.scholarships.scholarview', compact('scholarship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
