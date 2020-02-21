@include('adminAuth.authnav')

@extends('content')

@section('content')

<br>

<div class="uk-section uk-section-muted uk-card uk-card-default uk-grid-collapse" style="background-color:#001628;">
    <div class="uk-container">
        <h1 class="uk-heading-line uk-text-center"><span class="headfonts">Programs</span></h1>
    </div>
</div>

<br>

<div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
    <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
        <img src="{{asset('imgs/WebHeader_1_.png')}}" alt="" uk-cover>
        <canvas width="600" height="400"></canvas>
    </div>
    <div>
        <div class="uk-card-body">
            <h3 class="uk-card-title">Create Programs</h3>

                <form action="{{route('store.program')}}" method="POST">

                    @csrf 

                    <fieldset class="uk-fieldset">

                        <div class="uk-margin">
                            <input class="uk-input" name="name" type="text" placeholder="Website program name" value="{{old('name')}}">
                        </div>

                        <div class="uk-margin">
                            <input class="uk-input" name="link" type="text" placeholder="Website Link" value="{{old('link')}}">
                        </div>

                        <div class="uk-margin">
                            <input class="uk-button uk-button-primary" type="submit" value="Add">
                        </div>
                
                    </fieldset>
                </form>
<br>

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

        </div>
    </div>
</div>
    
@endsection
