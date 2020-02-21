@include('includes.header')

@include('includes.navbar')


@include('sweetalert::alert')

{{-- <div class="uk-section uk-section-muted uk-card uk-card-default uk-grid-collapse" style="background-color:#6220A5;">
    <div class="uk-container">
        <h1 class="uk-heading-line uk-text-center"><span class="headfonts">About</span></h1>
    </div>
</div> --}}

<div class="uk-section uk-section-muted" style="background-color:#F2E8FF;">
    <div class="uk-container">

        <div class="uk-grid-match uk-child-width" uk-grid>
            <div class="uk-text-center">
                <h1 class="uk-heading"><span style="font-family:'avblack';">Ahmed Yaseen</span></h1>
<br>
                <p class="headIndexfo">
                    My name is Ahmed Yaseen .I'm from iraq .I work as graphic designer and web developer .
                </p>

                <span class="headIndexfo">Contact me</span>
                <a class="headIndexfo emailink" href="mailto:des19des@yandex.com">
                    des19des@yandex.com
                </a>
            </div>
        </div>

    </div>
</div>

<br>

<div class="uk-container">

    <div class="uk-child-width-expand@s" uk-grid>
        <div class="uk-grid-item-match">
            <div>
                <h1 class="abouthead">Comments</h1>
                <form action="{{route('store.about')}}" method="POST">

                    @csrf

                    <fieldset class="uk-fieldset">
                
                        <div class="uk-margin">
                            <input class="uk-input" name="email" type="email" placeholder="Email"value="{{old('email')}}" required>
                        </div>

                        <div class="uk-margin">
                            <input class="uk-input" name="name" type="text" placeholder="Name"value="{{old('name')}}" required>
                        </div>
                
                        <div class="uk-margin">
                            <input class="uk-input" name="subject" type="text" placeholder="Subject"value="{{old('subject')}}" required>
                        </div>
                
                        <div class="uk-margin">
                            <textarea class="uk-textarea" name="message" rows="5" placeholder="Comment">{{old('message')}}</textarea>
                        </div>

                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary btncolorIndex" type="submit">Submit</button>
                        </div>
                
                    </fieldset>
                </form>

                <br>

                @if (Session::has('toast_success'))
                    <div class="uk-alert-success" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p class="aboutparag">
                            {{Session::get('toast_success')}}
                        </p>
                    </div>
                @endif

                <div>
                    
                </div>

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
        <div>
            <h3></h3>
            <img src="{{asset('imgs/about.svg')}}" alt="Image">
        </div>
    </div>
</div>

<br>

<!-- To close alert of success comment after specific time -->
<script>
    
    setTimeout(function(){
        $('.uk-alert-success').fadeOut(3000);
    }, 2000);

</script>
<!-- To close alert of success comment after specific time /-->

@include('UI.end_bottom')

@include('includes.footer')