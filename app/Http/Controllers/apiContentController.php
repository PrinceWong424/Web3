<?php

namespace App\Http\Controllers;

use App\Http\Resources\Content;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\PW;
use App\Http\Resources\Content as ContentResource;

class apiContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pw = PW::paginate(5);

        return ContentResource::collection($pw);
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
        $pw = new PW;


        $pw->Title = $request->input('Title');
        $pw->Text = $request->input('Text');
        $pw->author = $request->input('author');
        $pw->picfile = $request->input('Picfile');

        if($pw->save()){
            return new ContentResource($pw);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pw = PW::findOrFail($id);

        return new ContentResource($pw);
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
       $pw = PW::findOrFail($id);

        $pw->Title = $request->input('Title');
        $pw->Text = $request->input('Text');
        $pw->author = $request->input('author');
        $pw->picfile = $request->input('Picfile');

        if($pw->save()){
            return new ContentResource($pw);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pw = PW::findOrFail($id);

        if($pw->delete()){
            return new ContentResource($pw);
        }

    }
}
