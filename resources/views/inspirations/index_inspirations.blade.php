@include('adminAuth.authnav')

@extends('content')

@section('content')

<br>

<div class="uk-section uk-section-muted" style="background-color:#001628;">
    <div class="uk-container">
        <h1 class="uk-heading-line uk-text-center"><span class="headfonts">Inspirations</span></h1>
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-2@lg">

    <!--Search-->

    <form action="{{route('search.inspiration')}}" method="POST" role="search">

        @csrf   <!-- Prevent Cross Site Scripting -->
    
        <div class="uk-margin uk-width-1-1@lg" uk-margin>
            <div uk-form-custom>
                <div class="uk-width-1-2@lg">
                    <input class="uk-input uk-form-width-large" name="search" type="text" placeholder="Search">
                </div>
            </div>
            <button class="uk-button uk-button-primary uk-margin-small-right" uk-toggle="target: #modal-example">Search</button>
        </div>

    </form>

    <!-- Show Errors -->
                
        @if(count($errors)>0)
            <ul class="navbar-nav mr-auto">
                @foreach ($errors->all() as $error)
                <div class="uk-alert-danger" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>{{$error}}.</p>
                </div>
                @endforeach
            </ul>
        @endif

    <!-- Show Errors /-->

    <!--Search/-->

    <!-- Add Font -->
    <a class="uk-badge uk-margin-small-right uk-flex-right" href="{{route('create.inspiration')}}">
        <i class="fas fa-plus-circle"></i>
    </a>
    <!-- Add Font /-->

    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th class="colortable">Name</th>
                <th class="colortable">Link</th>
                <th class="colortable">Edit</th>
                <th class="colortable">Delete</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($inspirations as $inspiration)
                <tr>
                    <td>{{$inspiration->name}}</td>
                    <td>{{$inspiration->link}}</td>
                    <td>
                        <a class="uk-button uk-button-primary" href="{{route('edit.inspiration',['id'=>$inspiration->id])}}"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                    <td>
                        <a class="uk-button uk-button-danger" href="{{route('delete.inspiration',['id'=>$inspiration->id])}}"><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <ul class="uk-pagination uk-flex-center">


 <!-- UIKit Pagination -->

 @if ($inspirations->hasPages())
 <ul class="uk-pagination">
     {{-- Previous Page Link --}}
     @if ($inspirations->onFirstPage())
         <li class="uk-disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
     @else
         <li><a href="{{ $inspirations->previousPageUrl() }}" rel="prev"><i class="fas fa-angle-double-left"></i></a></li>
     @endif

     {{-- Pagination Elements --}}
     @foreach ($inspirations as $inspiration)
         {{-- "Three Dots" Separator --}}
         @if (is_string($inspiration))
             <li class="uk-disabled"><span>{{ $inspiration }}</span></li>
         @endif

         {{-- Array Of Links --}}
         @if (is_array($inspiration))
             @foreach ($inspiration as $page => $url)
                 @if ($page == $inspirations->currentPage())
                     <li class="uk-active"><span>{{ $page }}</span></li>
                 @else
                     <li><a href="{{ $url }}">{{ $page }}</a></li>
                 @endif
             @endforeach
         @endif
     @endforeach

     {{-- Next Page Link --}}
     @if ($inspirations->hasMorePages())
         <li><a href="{{ $inspirations->nextPageUrl() }}" rel="next"><i class="fas fa-angle-double-right"></i></a></li>
     @else
         <li class="uk-disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
     @endif
 </ul>
@endif

<!-- UIKit Pagination /-->


    </ul>

</div>
    
@endsection