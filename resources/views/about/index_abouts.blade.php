@include('adminAuth.authnav')

@extends('content')

@section('content')

<br>

<div class="uk-section uk-section-muted" style="background-color:#001628;">
    <div class="uk-container">
        <h1 class="uk-heading-line uk-text-center"><span class="headfonts">Abouts</span></h1>
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-2@lg">

    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th class="colortable">Name</th>
                <th class="colortable">Email</th>
                <th class="colortable">Subject</th>
                <th class="colortable">Message</th>
                <th class="colortable">Delete</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($abouts as $about)
                <tr>
                    <td>{{$about->name}}</td>
                    <td>{{$about->email}}</td>
                    <td>{{$about->subject}}</td>
                    <td>{{$about->message}}</td>
                    <td>
                        <a class="uk-button uk-button-danger" href="{{route('delete.about',['id'=>$about->id])}}"><i class="fas fa-trash-alt"></i> Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <ul class="uk-pagination uk-flex-center">


 <!-- UIKit Pagination -->

 @if ($abouts->hasPages())
 <ul class="uk-pagination">
     {{-- Previous Page Link --}}
     @if ($abouts->onFirstPage())
         <li class="uk-disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
     @else
         <li><a href="{{ $abouts->previousPageUrl() }}" rel="prev"><i class="fas fa-angle-double-left"></i></a></li>
     @endif

     {{-- Pagination Elements --}}
     @foreach ($abouts as $about)
         {{-- "Three Dots" Separator --}}
         @if (is_string($about))
             <li class="uk-disabled"><span>{{ $about }}</span></li>
         @endif

         {{-- Array Of Links --}}
         @if (is_array($about))
             @foreach ($about as $page => $url)
                 @if ($page == $abouts->currentPage())
                     <li class="uk-active"><span>{{ $page }}</span></li>
                 @else
                     <li><a href="{{ $url }}">{{ $page }}</a></li>
                 @endif
             @endforeach
         @endif
     @endforeach

     {{-- Next Page Link --}}
     @if ($abouts->hasMorePages())
         <li><a href="{{ $abouts->nextPageUrl() }}" rel="next"><i class="fas fa-angle-double-right"></i></a></li>
     @else
         <li class="uk-disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
     @endif
 </ul>
@endif

<!-- UIKit Pagination /-->


    </ul>

</div>
    
@endsection