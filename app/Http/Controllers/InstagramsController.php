<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instagrams;
Use Alert;
use Illuminate\Support\Facades\Input;

class InstagramsController extends Controller
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
        $instagrams = Instagrams::paginate(6);
        return view('instagrams.index_instagrams')->with('instagrams',$instagrams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instagrams.create_instagrams');
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

        Instagrams::create($data);
    
        return redirect()->back()->with('toast_success', 'Your instagram added sucessfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instagram = Instagrams::find($id);
        return view('instagrams.edit_instagrams')->with('instagrams',$instagram);
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
        $instagram=Instagrams::find($id);

        // Validate data
        $request->validate([
        'name' => 'required|max:100',
        'link' => 'required'
        ],[],[

        'name' => 'website name ',
        'link' => 'Link '

        ]);

        $instagram->name = $request->name;
        $instagram->link = $request->link;
        $instagram->save();

        return redirect()->route('instagrams')->with('toast_info', 'Your instagram updated sucessfully');
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
        $instagram = Instagrams::where('name','LIKE','%'.$search.'%')->get();
        if(count($instagram) > 0)
        {
            return view('instagrams.search_instagrams')->with('instagrams',$instagram)->withQuery($search);
        }
        else
        {
            return view('instagrams.search_instagrams')->with('msg','No Result founded 😢!');
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
        $del = Instagrams::find($id);
        $del->destroy($id);

        return redirect()->back()->with('toast_warning', 'Your instagram deleted sucessfully');
    }
}
