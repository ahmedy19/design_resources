<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colors;
Use Alert;
use Illuminate\Support\Facades\Input;

class ColorsController extends Controller
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
        $color = Colors::paginate(6);
        return view('colors.index_colors')->with('colors',$color);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colors.create_colors');
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
    
            Colors::create($data);
    
          return redirect()->back()->with('toast_success', 'Your color added sucessfully');

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
        $color = Colors::find($id);
        return view('colors.edit_colors')->with('colors',$color);
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
        $color=Colors::find($id);

        // Validate data
        $request->validate([
            'name' => 'required|max:100',
            'link' => 'required'
            ],[],[

            'name' => 'website name ',
            'link' => 'Link '

            ]);

        $color->name = $request->name;
        $color->link = $request->link;
        $color->save();

        return redirect()->route('colors')->with('toast_info', 'Your color updated sucessfully');
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
        $color = Colors::where('name','LIKE','%'.$search.'%')->get();
        if(count($color) > 0)
        {
            return view('colors.search_colors')->with('colors',$color)->withQuery($search);
        }
        else
        {
            return view('colors.search_colors')->with('msg','No Result founded 😢!');
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
        $del = Colors::find($id);
        $del->destroy($id);

        return redirect()->back()->with('toast_warning', 'Your color deleted sucessfully');
    }
}
