@include('includes.header')

@include('includes.navbar')

<div class="uk-section uk-section-muted uk-card uk-card-default uk-grid-collapse" style="background-color:#6220A5;">
    <div class="uk-container">
        <h1 class="uk-heading-line uk-text-center"><span class="headfonts">Search</span></h1>
    </div>
</div>


<div class="uk-card uk-card-default uk-card-body uk-width-1-2@lg">

        <h2 class="uk-modal-title">Results: </h2>

        <a class="uk-button uk-button-primary uk-width-1-4 btncolorIndex" href="{{route('resources')}}">Return</a>
            
        @if(isset($results))
            <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                        <th class="colortable">Name</th>
                </thead>
                <tbody>

                    @foreach($results->groupByType() as $type => $modelSearchResults)

                    <h2>{{ ucwords($type) }}</h2>
    
                    @foreach($modelSearchResults as $searchResult)
                        <tr>
                            <td><a href="{{$searchResult->url}}">{{$searchResult->title}}</a></td>
                        </tr>
                    @endforeach

                    @endforeach
        
                </tbody>
            </table>
        
        @elseif(isset($msg))

        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>{{$msg}}</p>
        </div>

        @endif
</div>


@include('UI.end_bottom')

@include('includes.footer')