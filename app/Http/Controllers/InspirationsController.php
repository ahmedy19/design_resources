<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inspirations;
Use Alert;
use Illuminate\Support\Facades\Input;

class InspirationsController extends Controller
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
        $inspirations = Inspirations::paginate(6);
        return view('inspirations.index_inspirations')->with('inspirations',$inspirations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inspirations.create_inspirations');
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

        Inspirations::create($data);
    
        return redirect()->back()->with('toast_success', 'Your inspiration added sucessfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inspiration = Inspirations::find($id);
        return view('inspirations.edit_inspirations')->with('inspirations',$inspiration);
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
        $inspiration=Inspirations::find($id);

        // Validate data
        $request->validate([
        'name' => 'required|max:100',
        'link' => 'required'
        ],[],[

        'name' => 'website name ',
        'link' => 'Link '

        ]);

        $inspiration->name = $request->name;
        $inspiration->link = $request->link;
        $inspiration->save();

        return redirect()->route('inspirations')->with('toast_info', 'Your inspiration updated sucessfully');
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
        $inspiration = Inspirations::where('name','LIKE','%'.$search.'%')->get();
        if(count($inspiration) > 0)
        {
            return view('inspirations.search_inspirations')->with('inspirations',$inspiration)->withQuery($search);
        }
        else
        {
            return view('inspirations.search_inspirations')->with('msg','No Result founded 😢!');
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
        $del = Inspirations::find($id);
        $del->destroy($id);

        return redirect()->back()->with('toast_warning', 'Your inspiration deleted sucessfully');
    }
}
