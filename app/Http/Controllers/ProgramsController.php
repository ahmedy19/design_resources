<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programs;
Use Alert;
use Illuminate\Support\Facades\Input;

class ProgramsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Programs::paginate(6);
        return view('programs.index_programs')->with('programs',$programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programs.create_programs');
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
        'name' => 'required|max:100',
        'link' => 'required'
        ],[],[

        'name' => 'website name ',
        'link' => 'Link '

        ]);
    
        $data = $request->all();

        Programs::create($data);
    
        return redirect()->back()->with('toast_success', 'Your program added sucessfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Programs::find($id);
        return view('programs.edit_programs')->with('programs',$program);
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
        $program=Programs::find($id);

        // Validate data
        $request->validate([
        'name' => 'required|max:100',
        'link' => 'required'
        ],[],[

        'name' => 'website name ',
        'link' => 'Link '

        ]);

        $program->name = $request->name;
        $program->link = $request->link;
        $program->save();

        return redirect()->route('programs')->with('toast_info', 'Your program updated sucessfully');
    }

    // Search
    public function search(Request $request)
    {
        // Validate Search
        $request->validate([
            'search' => 'required|min:3',
            ],[],[
    
            'search' => 'Search ',
    
            ]);

        $search = Input::get('search');
        $program = Programs::where('name','LIKE','%'.$search.'%')->get();
        if(count($program) > 0)
        {
            return view('programs.search_programs')->with('programs',$program)->withQuery($search);
        }
        else
        {
            return view('programs.search_programs')->with('msg','No Result founded 😢!');
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
        $del = Programs::find($id);
        $del->destroy($id);

        return redirect()->back()->with('toast_warning', 'Your inspiration deleted sucessfully');
    }
}
