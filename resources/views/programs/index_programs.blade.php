@include('adminAuth.authnav')

@extends('content')

@section('content')

<br>

<div class="uk-section uk-section-muted" style="background-color:#001628;">
    <div class="uk-container">
        <h1 class="uk-heading-line uk-text-center"><span class="headfonts">Programs</span></h1>
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-2@lg">

    <!--Search-->

    <form action="{{route('search.program')}}" method="POST" role="search">

        @csrf   <!-- Prevent Cross Site Scripting -->
    
        <div class="uk-margin uk-width-1-1@lg" uk-margin>
            <div uk-form-custom>
                <div class="uk-width-1-2@lg">
                    <input class="uk-input uk-form-width-large" name="search" type="text" placeholder="Search">
                </div>
            </div>
            <button class="uk-button uk-button-primary uk-margin-small-right">Search</button>
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
    <a class="uk-badge uk-margin-small-right uk-flex-right" href="{{route('create.program')}}">
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
            
            @foreach($programs as $program)
                <tr>
                    <td>{{$program->name}}</td>
                    <td>{{$program->link}}</td>
                    <td>
                        <a class="uk-button uk-button-primary" href="{{route('edit.program',['id'=>$program->id])}}"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                    <td>
                        <a class="uk-button uk-button-danger" href="{{route('delete.program',['id'=>$program->id])}}"><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <ul class="uk-pagination uk-flex-center">


 <!-- UIKit Pagination -->

 @if ($programs->hasPages())
 <ul class="uk-pagination">
     {{-- Previous Page Link --}}
     @if ($programs->onFirstPage())
         <li class="uk-disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
     @else
         <li><a href="{{ $programs->previousPageUrl() }}" rel="prev"><i class="fas fa-angle-double-left"></i></a></li>
     @endif

     {{-- Pagination Elements --}}
     @foreach ($programs as $program)
         {{-- "Three Dots" Separator --}}
         @if (is_string($program))
             <li class="uk-disabled"><span>{{ $program }}</span></li>
         @endif

         {{-- Array Of Links --}}
         @if (is_array($program))
             @foreach ($program as $page => $url)
                 @if ($page == $programs->currentPage())
                     <li class="uk-active"><span>{{ $page }}</span></li>
                 @else
                     <li><a href="{{ $url }}">{{ $page }}</a></li>
                 @endif
             @endforeach
         @endif
     @endforeach

     {{-- Next Page Link --}}
     @if ($programs->hasMorePages())
         <li><a href="{{ $programs->nextPageUrl() }}" rel="next"><i class="fas fa-angle-double-right"></i></a></li>
     @else
         <li class="uk-disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
     @endif
 </ul>
@endif

<!-- UIKit Pagination /-->


    </ul>

</div>
    
@endsection