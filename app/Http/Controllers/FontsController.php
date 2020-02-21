<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fonts;
Use Alert;
use Illuminate\Support\Facades\Input;

class FontsController extends Controller
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
        $fonts = Fonts::paginate(6);
        return view('fonts.index_fonts')->with('fonts',$fonts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fonts.create_fonts');
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

        Fonts::create($data);

      return redirect()->back()->with('toast_success', 'Your font added sucessfully');
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
        $font = Fonts::find($id);
        return view('fonts.edit_fonts')->with('fonts',$font);
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
        $font=Fonts::find($id);

      // Validate data
      $request->validate([
        'name' => 'required|max:100',
        'link' => 'required'
        ],[],[

        'name' => 'website name ',
        'link' => 'Link '

        ]);

        $font->name = $request->name;
        $font->link = $request->link;
        $font->save();

        return redirect()->route('fonts')->with('toast_info', 'Your font updated sucessfully');
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
        $font = Fonts::where('name','LIKE','%'.$search.'%')->get();
        if(count($font) > 0)
        {
            return view('fonts.search_fonts')->with('fonts',$font)->withQuery($search);
        }
        else
        {
            return view('fonts.search_fonts')->with('msg','No Result founded 😢!');
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
        $del = Fonts::find($id);
        $del->destroy($id);

        return redirect()->back()->with('toast_warning', 'Your font deleted sucessfully');
    }
}
