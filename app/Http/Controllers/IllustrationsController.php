<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Illustrations;
Use Alert;
use Illuminate\Support\Facades\Input;

class IllustrationsController extends Controller
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
        $illustrations = Illustrations::paginate(6);
        return view('illustrations.index_illustrations')->with('illustrations',$illustrations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('illustrations.create_illustrations');
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

        Illustrations::create($data);
    
        return redirect()->back()->with('toast_success', 'Your illustrations added sucessfully');
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
        $illustration = Illustrations::find($id);
        return view('illustrations.edit_illustrations')->with('illustrations',$illustration);
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
        $illustration=Illustrations::find($id);

        // Validate data
        $request->validate([
        'name' => 'required|max:100',
        'link' => 'required'
        ],[],[

        'name' => 'website name ',
        'link' => 'Link '

        ]);

        $illustration->name = $request->name;
        $illustration->link = $request->link;
        $illustration->save();

        return redirect()->route('illustrations')->with('toast_info', 'Your illustration updated sucessfully');
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
        $illustration = Illustrations::where('name','LIKE','%'.$search.'%')->get();
        if(count($illustration) > 0)
        {
            return view('illustrations.search_illustrations')->with('illustrations',$illustration)->withQuery($search);
        }
        else
        {
            return view('illustrations.search_illustrations')->with('msg','No Result founded 😢!');
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
        $del = Illustrations::find($id);
        $del->destroy($id);

        return redirect()->back()->with('toast_warning', 'Your illustration deleted sucessfully');
    }
}
