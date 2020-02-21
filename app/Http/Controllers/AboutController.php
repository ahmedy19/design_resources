<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Alert;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::paginate(6);
        return view('about.index_abouts')->with('abouts',$abouts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.create_about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data
        $request->validate([
        'email' => 'required|email|unique:users,email',
        'name' => 'required|max:100',
        'subject' => 'required|max:100',
        'message' => 'required',
        ],[],[

        'email' => 'Email ',
        'name' => 'Name ',
        'subject' => 'Subject ',
        'message' => 'Comment '

        ]);
    
        $data = $request->all();

        About::create($data);
    
        return redirect()->back()->with('toast_success','Your comment sent successfully');
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = About::find($id);
        $del->destroy($id);

        return redirect()->back()->with('toast_warning', 'Your comment deleted sucessfully');
    }
}
