<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client\Startup;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class StartupsController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $startups = Startup::all();
        $startups = QueryBuilder::for(Startup::class)
        ->allowedFilters([
                'company_name', 
                AllowedFilter::exact('country'),
                AllowedFilter::exact('industry'),
            ])
        ->get();
        
        return view('frontend.startups.index', compact('startups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request->all());
        return view('frontend.startups.create');
    }

    /**
     * create startup modal the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStartup(Request $request)
    {
        // dd($request->industry);
        $startup = Startup::create([
            'slug_name' =>  $request->slug_name,
            'company_name' =>  $request->company_name,
            'industry' =>  $request->industry,
            'client_id' => auth()->user()->id,
            ]);
        // $startup = 1;
        return view('frontend.startups.create', compact('startup'));
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
    public function show($slug)
    {
        // dd($slug_name);
        // $startup = Startup::findOrFail($slug);
        $startup = Startup::where('slug_name' , $slug)->first();
        // $startup = 1;
        return view('frontend.startups.profile', compact('startup'));
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
        // dd($request->all());
        $startup = Startup::findOrFail($id);
        $startup->update($request->all());

        return redirect()->back();
        // return response()->json([
        //     'success'  => 'done',
        //     'startupSlug'  => $startup->slug_name,
        // ]);
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

    public function search(Request $request)
    {

        $startups = QueryBuilder::for(Startup::class)
        ->allowedFilters([
                'company_name', 
                AllowedFilter::exact('country'),
                AllowedFilter::exact('industry'),
            ])
        ->get();

        // dd($request->all());
        // $startups = Startup::where([
        //     ['company_name', 'like', '%'.$request->company_name.'%'],
        //     ['industry', '=', $request->industry],
        //     ['country', '=', $request->country],
        // ])->get();

        return view('frontend.startups.index', compact('startups'));
    }
}
