<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use Illuminate\Http\Request;
use Image; //Intervention Image
use Illuminate\Support\Facades\Storage; //Laravel Filesystem

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('frontend.user_profile.index', compact('clients'));
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
        $client = Client::findOrFail($id);
        return view('frontend.user_profile.profile', compact('client'));
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
        // abort_unless(\Gate::allows('career_edit'), 403);

        $client = Client::findOrFail($id);
        $client->update([
            "date_of_birth" => $request->date_of_birth,
            "gender" => $request->gender,
            "residence_location" => $request->residence_location,
            "profession" => $request->profession,
            "school" => $request->school,
            "bio" => $request->bio
            ]);

        return redirect()->back();
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UploadCoverImage(Request $request)
    {
        // abort_unless(\Gate::allows('career_edit'), 403);
        // dd(auth()->user()->name);
        if(!auth()->check()) {
            abort(403);
        }

        $request->validate([
            'image' => 'required|string',
        ]);

        $client = Client::findOrFail(auth()->user()->id);

        $img = $request->image;  // your base64 encoded
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        // $imageName = auth()->user()->name . 'cover-photo.png';

        if ($request->image) {
            $image = base64_decode($img);
            //filename to store
            $filenametostore = auth()->user()->name.'_'.uniqid().'_cover_photo.png';
            Storage::put('public/user_profile/'. auth()->user()->id . auth()->user()->name .'/'. $filenametostore, $image);
            // Storage::put('public/user_profile/'.auth()->user()->id . auth()->user()->name .  '/thumbnail/'. $filenametostore, $image);
            //Resize image here
            // $thumbnailpath = 'storage/products/thumbnail/'.$filenametostore;
            // $img = Image::make($thumbnailpath)->resize(470, 600)->save($thumbnailpath);
            $path = 'storage/user_profile/'. auth()->user()->id . auth()->user()->name .'/'. $filenametostore;
        }else {
            // $path = $client->cover_photo;
        }
        // Storage::disk('local')->put($imageName, base64_decode($image));
        $client->update([
            "cover_photo" => $path,
        ]);

        return $client->cover_photo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UploadProfileImage(Request $request)
    {
        if(!auth()->check()) {
            abort(403);
        }

        $request->validate([
            'image' => 'required|string',
        ]);

        $client = Client::findOrFail(auth()->user()->id);

        $img = $request->image;  // your base64 encoded
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);

        if ($request->image) {
            $image = base64_decode($img);
            //filename to store
            $filenametostore = auth()->user()->name.'_'.uniqid().'_profile_photo.png';
            Storage::put('public/user_profile/'. auth()->user()->id . auth()->user()->name .'/'. $filenametostore, $image);
            // Storage::put('public/user_profile/'.auth()->user()->id . auth()->user()->name .  '/thumbnail/'. $filenametostore, $image);
            //Resize image here
            // $thumbnailpath = 'storage/products/thumbnail/'.$filenametostore;
            // $img = Image::make($thumbnailpath)->resize(470, 600)->save($thumbnailpath);
            $path = 'storage/user_profile/'. auth()->user()->id . auth()->user()->name .'/'. $filenametostore;
        }else {
            $path = $client->profile_photo;
        }
        $client->update([
            "profile_photo" => $path,
        ]);

        return $client->profile_photo;
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
