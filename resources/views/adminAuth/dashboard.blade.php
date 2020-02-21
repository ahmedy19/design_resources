<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        </ul>

    </div>
    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li>
                <a href="#">{{ Auth()->guard('admin')->user()->name }}</a>
                <div class="uk-navbar-dropdown">
                    <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li class="uk-active"><a href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form1').submit();">
                            {{ __('Logout') }}</a>
                        
                            <form id="logout-form1" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    
</nav>


<br>


@extends('content')

@section('content')


<div class="uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <div class="uk-card uk-card-default uk-card-body dash">
            <h3><a class="uk-link-heading dashtext" href="{{route('fonts')}}">Fonts</a></h3>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body dash">
            <h3><a class="uk-link-heading dashtext" href="{{route('colors')}}">Colors</a></h3>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body dash">
            <h3><a class="uk-link-heading dashtext" href="{{route('photos')}}">Photos</a></h3>
        </div>
    </div>
</div>

<div class="uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <div class="uk-card uk-card-default uk-card-body dash">
            <h3><a class="uk-link-heading dashtext" href="{{route('icons')}}">Icons</a></h3>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body dash">
            <h3><a class="uk-link-heading dashtext" href="{{route('inspirations')}}">Inspirations</a></h3>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body dash">
            <h3><a class="uk-link-heading dashtext" href="{{route('illustrations')}}">Illustrations</a></h3>
        </div>
    </div>
</div>

<div class="uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <div class="uk-card uk-card-default uk-card-body dash">
            <h3><a class="uk-link-heading dashtext" href="{{route('channels')}}">Youtube</a></h3>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body dash">
            <h3><a class="uk-link-heading dashtext" href="{{route('programs')}}">Programs</a></h3>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body dash">
            <h3><a class="uk-link-heading dashtext" href="{{route('instagrams')}}">Instagram</a></h3>
        </div>
    </div>
</div>

<div class="uk-child-width-expand@s uk-text-center" uk-grid>
    <div>
        <div class="uk-card uk-card-default uk-card-body dash">
            <h3><a class="uk-link-heading dashtext" href="{{route('abouts')}}">Abouts</a></h3>
        </div>
    </div>
</div>

<br>



@endsection