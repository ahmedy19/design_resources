<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Inspirations extends Model implements Searchable
{
    // To Protect entered data
    protected $fillable = ['name','link'];

    // Multiple search for UIController 
    public function getSearchResult(): SearchResult
    {
        $url = $this->link;

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    
}
