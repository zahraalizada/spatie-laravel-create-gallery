<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('albums.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Album::create([
            'title' => $request->title
        ]);
        return redirect()->route('albums.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $photos = $album->getMedia();
        return view('albums.show', compact('album','photos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $album->update([
            'title' => $request->title
        ]);
        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->back();
    }


    public function upload(Request $request, Album $album){
        if($request->has('image')){
            $album->addMedia($request->image)->toMediaCollection();
        }
        return redirect()->back();
    }
    public function showImage (Album $album, $id){
        $media =$album->getMedia();
        $image = $media->where('id',$id)->first();
        return view('albums.image-show', compact('album','image'));
    }
    public function destroyImage (Album $album, $id){
        $media =$album->getMedia();
        $image = $media->where('id',$id)->first();
        $image->delete();
        return redirect()->back();

    }
}
