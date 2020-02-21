<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channels;
Use Alert;
use Illuminate\Support\Facades\Input;

class ChannelsController extends Controller
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
        $channels = Channels::paginate(6);
        return view('channels.index_channels')->with('channels',$channels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create_channels');
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

        Channels::create($data);
    
        return redirect()->back()->with('toast_success', 'Your channels added sucessfully');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $channel=Channels::find($id);

        // Validate data
        $request->validate([
        'name' => 'required|max:100',
        'link' => 'required'
        ],[],[

        'name' => 'website name ',
        'link' => 'Link '

        ]);

        $channel->name = $request->name;
        $channel->link = $request->link;
        $channel->save();

        return redirect()->route('channels')->with('toast_info', 'Your channel updated sucessfully');
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
        $channel = Channels::where('name','LIKE','%'.$search.'%')->get();
        if(count($channel) > 0)
        {
            return view('channels.search_channels')->with('channels',$channel)->withQuery($search);
        }
        else
        {
            return view('channels.search_channels')->with('msg','No Result founded 😢!');
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
        $del = Channels::find($id);
        $del->destroy($id);

        return redirect()->back()->with('toast_warning', 'Your channel deleted sucessfully');
    }
}
