    <nav class="navbar">
        
        <!--div>
        	<a href="/" ><img class="logo-img" src="img/logo.png"></a>
        	<img class="logo-help" src="img/help.png" id="btnCom" onmouseover="this.style.cursor='pointer';">
        	<span class="font-bold md-vtext" style="display:block">
                <a class="nav-lang" href="lang/en">Eng</a>&nbsp;|&nbsp;
                <a class="nav-lang" href="lang/ka">Kaz</a>&nbsp;|&nbsp;
                <a class="nav-lang" href="lang/ru">Rus</a>&nbsp;|&nbsp;
                <a class="nav-lang" href="lang/uz">Uzb</a>   
            </span>
        </div>

		<div id="infoModal" class="modal">
	  		<div class="modal-content">
	    		<span class="close" style="float-right">&times; xx </span>
	    		<p class="font-red font-bold float-right">
                    @lang('general.company')
                </p>
                <span>@lang('general.for1')<br>
                @lang('general.for2')<br>
                @lang('general.for3')</span>
	  		</div>
		</div-->

        <div>
            <a href="/" ><img class="logo-img" src="img/logo.png"></a>
            <!--button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#infoModal">i</button-->
            <button data-toggle="modal" data-target="#infoModal" style="border:0">
                <img class="logo-help" src="img/help.png">
            </button>
            <span class="font-bold md-vtext" style="display:block">
                <a class="nav-lang" href="lang/en">Eng</a>&nbsp;|&nbsp;
                <a class="nav-lang" href="lang/ka">Kaz</a>&nbsp;|&nbsp;
                <a class="nav-lang" href="lang/ru">Rus</a>&nbsp;|&nbsp;
                <a class="nav-lang" href="lang/uz">Uzb</a>   
            </span>
        </div>

        <div id="infoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!--h4 class="modal-title">Modal Header</h4-->
                  </div>
                  <div class="modal-body">
                    <p>Some text in the modal.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

            </div>
        </div>

        <div class="rcorner">
            <div class="rcorner-center pp-center">
    	        <span class="font-red md-vtext">@lang('general.continent')</span><br>
    	        <span class="font-bold lg-vtext">@lang('general.top-msg')</span>
            </div>
	    </div>
        
        <ul class="main-nav" id="js-menu">
            <li>
                <a href="#" class="nav-links ub-links sm-vtext">Login</a>
            </li>
            <li>
                <a href="#" class="nav-links ub-links sm-vtext">Register</a>
            </li>
        </ul>
        
    </nav>

    <!--

    <script>
        // Get the modal
        var modal = document.getElementById("infoModal");

        // Get the button that opens the modal
        var btn = document.getElementById("btnCom");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>

    -->