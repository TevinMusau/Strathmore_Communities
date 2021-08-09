<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $categoryCheck = new Category;
        $this->validate($request,[
            'category_id'=>'required',
            'user_id'=>'required'
        ]);
        if ($categoryCheck->checkJoined($request->input('user_id'),$request->input('category_id'))==TRUE) {
            DB::table('category_user')->insertOrIgnore([
                'event_id'=>$request->input('event_id'),
                'user_id'=>$request->input('user_id')
            ]);
            return back()->with('success','You Have Joined This Community.');
        } else {
            return back()->with('danger','You have already Joined this Community.');
        }
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
