@include('includes.header')

@include('includes.navbar')

<div class="uk-section uk-section-muted uk-card uk-card-default uk-grid-collapse" style="background-color:#6220A5;">
    <div class="uk-container">
        <h1 class="uk-heading-line uk-text-center"><span class="headfonts">Resources</span></h1>
    </div>
</div>

<div class="uk-section" style="background-color:#F2E8FF;">
    <div class="uk-container">


<!--Search-->

<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

        <div class="uk-navbar-item">
            <form class="uk-search uk-search-navbar"  action="{{route('search.resources.ui')}}" method="POST" role="search">
                @csrf   <!-- Prevent Cross Site Scripting -->
                <span uk-search-icon></span>
                <input class="uk-search-input" type="search" name="search" placeholder="Search for fonts,icons websites...">
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

        </div>

    </div>
</nav>

<!--Search /-->


<br>


        <div class="uk-child-width-expand@s uk-text-center midparag" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <a href="{{route('resources.fonts')}}">
                        <img src="{{asset('imgs/font.svg')}}" alt="font" width="50" height="50">
                    </a>
                    <p><a class="resoa" href="{{route('resources.fonts')}}">Fonts</a></p>
                    
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <a href="{{route('resources.icons')}}">
                        <img src="{{asset('imgs/icon.svg')}}" alt="font" width="50" height="50">
                    </a>
                    <p><a class="resoa" href="{{route('resources.icons')}}">Icons</a></p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <a href="{{route('resources.illustrations')}}">
                        <img src="{{asset('imgs/illustration.svg')}}" alt="font" width="50" height="50">
                    </a>
                    <p><a class="resoa" href="{{route('resources.illustrations')}}">Illustrations</a></p>
                </div>
            </div>
        </div>
        
        <div class="uk-child-width-expand@s uk-text-center midparag" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <a href="{{route('resources.inspirations')}}">
                        <img src="{{asset('imgs/Inspiration.svg')}}" alt="font" width="50" height="50">
                    </a>
                    <p><a class="resoa" href="{{route('resources.inspirations')}}">Inspirations</a></p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <a href="{{route('resources.colors')}}">
                        <img src="{{asset('imgs/colors.svg')}}" alt="font" width="50" height="50">
                    </a>
                    <p><a class="resoa" href="{{route('resources.colors')}}">Colors</a></p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <a href="{{route('resources.programs')}}">
                        <img src="{{asset('imgs/programs.svg')}}" alt="font" width="50" height="50">
                    </a>
                    <p><a class="resoa" href="{{route('resources.programs')}}">Programs</a></p>
                </div>
            </div>
        </div>
        
        <div class="uk-child-width-expand@s uk-text-center midparag" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <a href="{{route('resources.instagrams')}}">
                        <img src="{{asset('imgs/instagram.svg')}}" alt="font" width="50" height="50">
                    </a>
                    <p><a class="resoa" href="{{route('resources.instagrams')}}">Instagrams</a></p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <a href="{{route('resources.photos')}}">
                        <img src="{{asset('imgs/image.svg')}}" alt="font" width="50" height="50">
                    </a>
                    <p><a class="resoa" href="{{route('resources.photos')}}">Photos</a></p>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-body">
                    <a href="{{route('resources.channels')}}">
                        <img src="{{asset('imgs/youtube.svg')}}" alt="font" width="50" height="50">
                    </a>
                    <p><a class="resoa" href="{{route('resources.channels')}}">Youtube</a></p>
                </div>
            </div>
        </div>



    </div>
</div>



@include('UI.end_bottom')

@include('includes.footer')