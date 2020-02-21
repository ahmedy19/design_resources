@include('includes.header')

<div class="uk-section">

<div class="uk-container">

    <div class="uk-child-width-expand@s" uk-grid>
        <div class="uk-grid-item-match">
            <div style="margin-top:20px !important;">
                <h1 class="abouthead">Design Resources</h1>

                <div class="headIndexfo">
                    If you are looking for best resources for designers <br><span style="color:#6E2FAF;">Design resources</span> website provide best resources <br> like youtube tutorials , inspirations ,  illustrations , fonts ,<br> icons , instagrams , programs and etc .
                </div>
                <br>
                <a class="uk-button uk-button-primary uk-width-1-4 btncolorIndex" href="{{route('resources')}}"> Get Started</a>
            </div>
        </div>

        <div style="margin-bottom:20px !important;">
            <img src="{{asset('imgs/webheadi_1_.svg')}}" alt="Image">
        </div>

    </div>
</div>

</div>

@include('includes.footer')
