<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icons;
Use Alert;
use Illuminate\Support\Facades\Input;

class IconsController extends Controller
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
        $icons = Icons::paginate(6);
        return view('icons.index_icons')->with('icons',$icons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('icons.create_icons');
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

        Icons::create($data);
    
        return redirect()->back()->with('toast_success', 'Your icon added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $icon = Icons::find($id);
        return view('icons.edit_icons')->with('icons',$icon);
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

        $icon=Icons::find($id);

        // Validate data
        $request->validate([
        'name' => 'required|max:100',
        'link' => 'required'
        ],[],[

        'name' => 'website name ',
        'link' => 'Link '

        ]);

        $icon->name = $request->name;
        $icon->link = $request->link;
        $icon->save();

        return redirect()->route('icons')->with('toast_info', 'Your icon updated sucessfully');

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
        $icon = Icons::where('name','LIKE','%'.$search.'%')->get();
        if(count($icon) > 0)
        {
            return view('icons.search_icons')->with('icons',$icon)->withQuery($search);
        }
        else
        {
            return view('icons.search_icons')->with('msg','No Result founded 😢!');
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
        $del = Icons::find($id);
        $del->destroy($id);

        return redirect()->back()->with('toast_warning', 'Your icon deleted sucessfully');
    }
}
