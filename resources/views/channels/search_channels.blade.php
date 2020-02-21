@include('adminAuth.authnav')

@extends('content')

@section('content')

<br>

<div class="uk-section uk-section-muted" style="background-color:#001628;">
    <div class="uk-container">
        <h1 class="uk-heading-line uk-text-center"><span class="headfonts">Search</span></h1>
    </div>
</div>

<div class="uk-card uk-card-default uk-card-body uk-width-1-2@lg">

        <h2 class="uk-modal-title">Results: </h2>
        <a class="uk-button uk-button-primary uk-align-right" href="{{route('channels')}}">Return</a>

        @if(isset($channels))
            <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                        <th class="colortable">Name</th>
                </thead>
                <tbody>
                    
                    @foreach($channels as $channel)
                        <tr>
                            <td>{{$channel->name}}</td>
                        </tr>
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



@endsection