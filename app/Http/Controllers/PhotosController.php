<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photos;
Use Alert;
use Illuminate\Support\Facades\Input;

class PhotosController extends Controller
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
        $photo = Photos::paginate(6);
        return view('photos.index_photos')->with('photos',$photo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create_photos');
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
    
            Photos::create($data);
    
          return redirect()->back()->with('toast_success', 'Your photo added sucessfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photos::find($id);
        return view('photos.edit_photos')->with('photos',$photo);
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
        $photo=Photos::find($id);

        // Validate data
        $request->validate([
            'name' => 'required|max:100',
            'link' => 'required'
            ],[],[

            'name' => 'website name ',
            'link' => 'Link '

            ]);

        $photo->name = $request->name;
        $photo->link = $request->link;
        $photo->save();

        return redirect()->route('photos')->with('toast_info', 'Your photo updated sucessfully');
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
        $photo = Photos::where('name','LIKE','%'.$search.'%')->get();
        if(count($photo) > 0)
        {
            return view('photos.search_photos')->with('photos',$photo)->withQuery($search);
        }
        else
        {
            return view('photos.search_photos')->with('msg','No Result founded 😢!');
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
        $del = Photos::find($id);
        $del->destroy($id);

        return redirect()->back()->with('toast_warning', 'Your photo deleted sucessfully');
    }
}
