@include('includes.header')

@include('includes.navbar')

<div class="uk-section uk-section-muted uk-card uk-card-default uk-grid-collapse" style="background-color:#6220A5;">
    <div class="uk-container">
        <h1 class="uk-heading-line uk-text-center"><span class="headfonts">Illustrations</span></h1>
    </div>
</div>

<div class="uk-section" style="background-color:#F2E8FF;">
    <div class="uk-container">
            <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-3@s uk-text-center midparag" uk-grid>
                @foreach ($illustrations as $illustration)
                <div>
                    <div class="uk-card uk-card-default uk-card-body"><a class="resoa" href="{{$illustration->link}}">{{$illustration->name}}</a></div>
                </div>
                @endforeach
            </div>
    </div>
</div>

<div class="uk-section" style="background-color:#F2E8FF;">

    <ul class="uk-pagination uk-flex-center">


 <!-- UIKit Pagination -->

 @if ($illustrations->hasPages())
 <ul class="uk-pagination">
     {{-- Previous Page Link --}}
     @if ($illustrations->onFirstPage())
         <li class="uk-disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
     @else
         <li><a href="{{ $illustrations->previousPageUrl() }}" rel="prev"><i class="fas fa-angle-double-left"></i></a></li>
     @endif

     {{-- Pagination Elements --}}
     @foreach ($illustrations as $illustration)
         {{-- "Three Dots" Separator --}}
         @if (is_string($illustration))
             <li class="uk-disabled"><span>{{ $illustration }}</span></li>
         @endif

         {{-- Array Of Links --}}
         @if (is_array($illustration))
             @foreach ($illustration as $page => $url)
                 @if ($page == $illustrations->currentPage())
                     <li class="uk-active"><span>{{ $page }}</span></li>
                 @else
                     <li><a href="{{ $url }}">{{ $page }}</a></li>
                 @endif
             @endforeach
         @endif
     @endforeach

     {{-- Next Page Link --}}
     @if ($illustrations->hasMorePages())
         <li><a href="{{ $illustrations->nextPageUrl() }}" rel="next"><i class="fas fa-angle-double-right"></i></a></li>
     @else
         <li class="uk-disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
     @endif
 </ul>
@endif

<!-- UIKit Pagination /-->


    </ul>

</div>

@include('UI.end_bottom')

@include('includes.footer')