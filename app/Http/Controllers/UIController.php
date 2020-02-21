<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fonts;
use App\Icons;
use App\Illustrations;
use App\Inspirations;
use App\Colors;
use App\Programs;
use App\Instagrams;
use App\Photos;
use App\Channels;
use Spatie\Searchable\Search;
use Illuminate\Support\Facades\Input;


class UIController extends Controller
{
    // This function for index
    public function index()
    {
        return view('index');
    }

    //Resources
    public function services()
    {
        return view('UI.resources');
    }

    //Fonts 
    public function fonts()
    {
        return view('UI.fonts')->with('fonts',Fonts::orderBy('created_at','desc')->paginate(9));
    }

    //Icons 
    public function icons()
    {
        return view('UI.icons')->with('icons',Icons::orderBy('created_at','desc')->paginate(9));
    }

    //Illustrations 
    public function illustrations()
    {
        return view('UI.illustrations')->with('illustrations',Illustrations::orderBy('created_at','desc')->paginate(9));
    }

    //Inspirations 
    public function inspirations()
    {
        return view('UI.inspirations')->with('inspirations',Inspirations::orderBy('created_at','desc')->paginate(9));
    }

    //Colors 
    public function colors()
    {
        return view('UI.colors')->with('colors',Colors::orderBy('created_at','desc')->paginate(9));
    }

    //Colors 
    public function programs()
    {
        return view('UI.programs')->with('programs',Programs::orderBy('created_at','desc')->paginate(9));
    }

    //Instagrams 
    public function instagrams()
    {
        return view('UI.instagrams')->with('instagrams',Instagrams::orderBy('created_at','desc')->paginate(9));
    }

    //Photos 
    public function photos()
    {
        return view('UI.photos')->with('photos',Photos::orderBy('created_at','desc')->paginate(9));
    }

    //Channels 
    public function channels()
    {
        return view('UI.channels')->with('channels',Channels::orderBy('created_at','desc')->paginate(9));
    }


    // Global Search
    public function searchContent(Request $request)
    {
        // Validate Search
        $request->validate([
        'search' => 'required|min:3',
        ],[],[

        'search' => 'Search ',

        ]);

        $search = $request->input('search');

        $searchResults = (new Search())
        ->registerModel(Fonts::class, 'name')
        ->registerModel(Icons::class, 'name')
        ->registerModel(Illustrations::class, 'name')
        ->registerModel(Inspirations::class, 'name')
        ->registerModel(Colors::class, 'name')
        ->registerModel(Programs::class, 'name')
        ->registerModel(Instagrams::class, 'name')
        ->registerModel(Photos::class, 'name')
        ->registerModel(Channels::class, 'name')
        ->perform($search);

        if(count($searchResults) > 0)
        {
            return view('UI.searchUI')->with('results',$searchResults)->withQuery($search);;
        }
        else
        {
            return view('UI.searchUI')->with('msg','No Result founded 😢!');
        }

    }


    //Error Page 
    public function errorPage()
    {
        return view('UI.error');
    }

}
