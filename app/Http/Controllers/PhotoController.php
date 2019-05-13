<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $photos = Photo::orderBy('order', 'ASC')->get();
        return view('admin.photos.index', compact('photos'));
    }

    public function gallery()
    {
        //
        $photos = Photo::orderBy('order', 'ASC')->paginate();
        return view('photos.gallery', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.photos.create');
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
        $data = $request->validate([
            'caption' => 'nullable',
            'seo_text' => 'required'
        ]);
        $photo = Photo::create($data);

        return redirect(route('photos.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
        return view('admin.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
        //
        $data = $request->validate([
            'caption' => 'nullable',
            'seo_text' => 'required'
        ]);

        $photo->update($data);

        return redirect(route('photos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
        $photo->delete();

        return redirect(route('photos.index'));
    }

    public function reorder(Request $request)
    {
        foreach ($request->order as $order) {
            $photo = Photo::where('id', $order['id'])->first();
            $photo->order = $order['position'];
            $photo->update();
        }
        return response(['status' => 200], 200);
    }
}
