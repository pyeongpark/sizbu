
<script>

    function openFeature(evt, featureName) {
        
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");

        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");

        if (evt.type != "load") {
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(featureName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Auth not loaded, so links Login/Register not enabled
    window.onload = function(){
        openFeature(event, 'Coverage');
    }

</script>



<div class="container-fruid text-center height-80">
    <!-- 
        pictures for features 
    -->
    <div class="row"><div class="col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>
    
    <div class="row">
        <div class="col-sm-1 col-md-1 col-lg-1"> </div>
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="tab">
                <button class="tablinks active" onclick="openFeature(event, 'Coverage')">
                    <span class="text-welcome1">Coverage_Rates</span>
                </button>
                <button class="tablinks" onclick="openFeature(event, 'MedicalData')">
                    <span class="text-welcome1">Medical_Data</span>
                </button>
                <button class="tablinks" onclick="openFeature(event, 'LocalHelp')">
                    <span class="text-welcome1">Local_Help</span>
                </button>
                <button class="tablinks" onclick="openFeature(event, 'TreatmentFee')">
                    <span class="text-welcome1">Treatment_Bill</span>
                </button>
                <button class="tablinks" onclick="openFeature(event, 'Countries')">
                    <span class="text-welcome1">What_Countries</span>
                </button>
            </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3"> </div>
    </div>

    <div class="row">
        <div class="col-sm-1 col-md-1 col-lg-1"> </div>
        <div class="col-sm-10 col-md-10 col-lg-10">
            QQQQQQQQQQQQQQQQQQQQQQQQQ
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1"> </div>
    </div>

    <!-- 
        what we do to care client's illness
    -->
    <div class="row"><div class="col-sm-12 col-md-12 col-lg-12">&nbsp;</div></div>

    <div class="row">
        <div class="col-sm-1 col-md-1 col-lg-1"> </div>
        <div class="col-sm-11 col-md-11 col-lg-11 text-how">   
            <img src="img/icon/star.png" width="10px" height="10px">&nbsp;Who we are
        </div>
    </div>

    {{--
    @if (Route::has('login'))
        <div class="links">
            @auth
                <a href="https://laravel.com/docs">Quote Coverage Rates</a>
                <a href="https://laracasts.com">FHIR Medical Data</a>
                <a href="https://laravel-news.com">Itinerary</a>
                <a href="https://laravel-news.com">Request Local Help</a>
            @else
                <a class="link-disabled href="">Quote Coverage Rates</a>
                <a class="link-disabled href="">FHIR Medical Data</a>
                <a class="link-disabled href="">Itinarary</a>
                <a class="link-disabled href="">Request Local Help</a>
            @endauth
            <br><br>
        </div>
    @endif
    --}}

</div>


