@extends('layouts.app')
	
@section('content')

@include("subviews.menu")

<?php
	session_start();

	$curUrl = Request::url();
	$_SESSION["currentUrl"] = $curUrl;

?>

<div class="p-3 postinfo" >
	@desktop
		<img src="img/seeit.png" height="18px">
	@elsedesktop
		<span class="vlg-vtext font-bold font-red">&#8224;&nbsp;</span>
	@enddesktop
	<span class="vlg-vtext">@lang('laborer.postit')</span>

	@guest
		<span class="md-vtext font-bold pt-1" style="display:block">@lang('laborer.loginplease')</span>
		<!--button type="button" disabled><span class="md-vtext">Post</span></button-->
	@else
		<button type="button" class="btn-primary pt-1" id="btn-labor" style="display:block">
			<span class="md-vtext">@lang('laborer.postbtn')</span>
		</button>
		<?php
			$loggedBy = Auth::user()->name;
		?>
	@endguest
</div>

<div class="ml-3 mr-3 mt-3">
	<img src="img/sort.png" class="btn-sort" title="sort data"
											data-toggle="modal" data-target="#sortModal">
	<!-- SEARCH HELP -->
	<form action="/searchlabor" method="GET" name="form1" class="d-inline" onsubmit="return required();">
	    {{ csrf_field() }}
	    <div class="float-right">
	    	@desktop
				<input type="text" name="search" size="35" placeholder=""> 
			@elsedesktop
				<input type="text" name="search" size="20" placeholder="">
			@enddesktop
			<button type="submit">
				<img src="img/search.jpg" class="btn-search">
			</button>
	    </div>
	</form>

	<div id="sortModal" class="modal fade" role="dialog">
		<div class="modal-dialog pp-dialog-purchase">
            <div class="modal-content">
                <div class="modal-header">
                	<span class="vlg-vtext">@lang('laborer.sortby'):</span>
                    <button type="button" class="close" data-dismiss="modal">
                    	<span class="lg-vtext" font-bold>&#88;</span>
                    </button>
                </div>
                <div class="modal-body">
                	<ul class="pp-dialog">
                		<li onclick="sort('created_at')" class="pointme">@lang('laborer.sortdate')</li>
                		<li onclick="sort('product')" class="pointme">@lang('laborer.sortproduct')</li>
                		<li onclick="sort('phonecode')" class="pointme">@lang('laborer.sortcountry')</li>
                		<li onclick="sort('weekpay')" class="pointme">@lang('laborer.sortpay')</li>
                	</ul>
                </div>
            </div>
        </div>
	</div>
</div>

<div class="pb-3 pl-3 pr-3 mt-2 viewdata m-viewdata">
	
	<?php
		$temp = array();

		if ((session()->get('sortedlaborers')) !== null){
			$temp = session()->get('sortedlaborers');
			$laborers = $temp;
		}
	?>

	<div>
		@foreach($laborers as $laborer)
			<?php
				if (isset($loggedBy) && ($laborer->loginname == $loggedBy))
					$showDel = 1;
				else
					$showDel = 0;
			?>

			<div class="pb-5 pt-2">
				<span class="font-mbold font-darkorange underlined">@lang('laborer.num'):&nbsp;</span>
				<span class='pr-5 font-darkorange'>{{$laborer->id}}</span>
				<span class="font-sbold">@lang('laborer.dt'):&nbsp;</span>
					<?php echo substr($laborer->created_at,0,10) ?>
				@if ($showDel)
					<img src="img/pencil.png" onclick="editme( {{ $laborer->id }} )" 
						class="float-right btn-edit" title="edit it">
				@endif
				<br>

				<span class="font-sbold">@lang('laborer.nm'):&nbsp;</span>
					{{$laborer->firstname}}&nbsp;{{$laborer->lastname}}
				<br>

				<span class="font-sbold">@lang('laborer.ctry'):&nbsp;</span>
					<?php echo substr($laborer->country, 0, 30) ?>
				@if ($showDel)
					<img src="img/delete.png" onclick="deleteme( {{ $laborer->id }} )" 
						class="float-right btn-delete" title="delete it">
				@endif
				<br>

				@if (($laborer->contactme)== 1)
					<span class="font-sbold">@lang('laborer.phone'):&nbsp;</span>
						@lang('laborer.cc'):&nbsp;{{$laborer->phonecode}},&nbsp;&nbsp;
						@lang('laborer.snm'):&nbsp;{{$laborer->phonenumber}}<br>
					<span class="font-sbold">@lang('laborer.email'):&nbsp;</span>{{$laborer->email}}<br>
				@else
					<span class="font-sbold">@lang('laborer.phone'):&nbsp;</span>@lang('laborer.contactme') @lang('general.company-short')<br>
					<span class="font-sbold">@lang('laborer.email'):&nbsp;</span>@lang('laborer.contactme') @lang('general.company-short')<br>
				@endif

				<span class="font-sbold">@lang('laborer.wp'):&nbsp;</span>{{$laborer->weekpay}}<br>
				<span class="font-sbold">@lang('laborer.wh'):&nbsp;</span>{{$laborer->weekhours}}<br>
				<span class="font-sbold">@lang('laborer.hm'):&nbsp;</span>{{$laborer->howmany}}<br>
				<span class="font-sbold">@lang('laborer.lc'):&nbsp;</span>{{$laborer->product}}<br>
				<span class="font-sbold">@lang('laborer.des'):&nbsp;</span>
				<span class="pp-wordwrap">{{$laborer->description}}</span>
			</div>

		@endforeach
	</div>

	<?php echo $laborers->render(); ?>

</div>

<script>

	$(document).ready(function(){
    	$("#btn-labor").click(function(){
        	//$("#form-laborer").toggle();
        	window.location.href = "/addlabor";
    	});
	});

	function sort(by) {
		window.location.href = "/laborsort/" + by;
	}

	function deleteme(id) {
		var cfm = confirm("Remove this posting?");
		
		if (cfm)
			window.location.href = "/labordelete/" + id;
	}

	function editme(id) {
		window.location.href = "/laboredit/" + id;
	}

	function required() {
		var empt = document.forms["form1"]["search"].value;
		
		if (empt.length < 2)
			return false;
		else
			return true;
	}

</script>

@endsection 