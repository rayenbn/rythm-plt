<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client\Startup;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Image; //Intervention Image
use Illuminate\Support\Facades\Storage; //Laravel Filesystem

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UploadCoverImage(Request $request, $id)
    {
        // abort_unless(\Gate::allows('career_edit'), 403);
        // dd(auth()->user()->name);
        if(!auth()->check()) {
            abort(403);
        }

        $request->validate([
            'image' => 'required|string',
        ]);

        $startup = Startup::findOrFail($id);

        $img = $request->image;  // your base64 encoded
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        // $imageName = auth()->user()->name . 'cover-photo.png';

        if ($request->image) {
            $image = base64_decode($img);
            //filename to store
            $filenametostore = $startup->company_name.'_'.uniqid().'_cover_photo.png';
            Storage::put('public/startup_profile/'. $startup->id . $startup->company_name .'/'. $filenametostore, $image);
            // Storage::put('public/startup_profile/'.$startup->id . $startup->company_name .  '/thumbnail/'. $filenametostore, $image);
            //Resize image here
            // $thumbnailpath = 'storage/products/thumbnail/'.$filenametostore;
            // $img = Image::make($thumbnailpath)->resize(470, 600)->save($thumbnailpath);
            $path = 'storage/startup_profile/'. $startup->id . $startup->company_name .'/'. $filenametostore;
        }else {
            $path = $startup->cover_photo;
        }
        // Storage::disk('local')->put($imageName, base64_decode($image));
        $startup->update([
            "cover_photo" => $path,
        ]);

        return $startup->cover_photo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UploadProfileImage(Request $request, $id)
    {
        if(!auth()->check()) {
            abort(403);
        }

        $request->validate([
            'image' => 'required|string',
        ]);

        $startup = Startup::findOrFail($id);

        $img = $request->image;  // your base64 encoded
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);

        if ($request->image) {
            $image = base64_decode($img);
            //filename to store
            $filenametostore = $startup->company_name.'_'.uniqid().'_profile_photo.png';
            Storage::put('public/startup_profile/'. $startup->id . $startup->company_name .'/'. $filenametostore, $image);
            // Storage::put('public/user_profile/'.auth()->user()->id . auth()->user()->name .  '/thumbnail/'. $filenametostore, $image);
            //Resize image here
            // $thumbnailpath = 'storage/products/thumbnail/'.$filenametostore;
            // $img = Image::make($thumbnailpath)->resize(470, 600)->save($thumbnailpath);
            $path = 'storage/startup_profile/'. $startup->id . $startup->company_name .'/'. $filenametostore;
        }else {
            $path = $startup->profile_photo;
        }
        $startup->update([
            "profile_photo" => $path,
        ]);

        return $startup->profile_photo;
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
