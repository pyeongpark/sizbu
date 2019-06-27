@extends('layouts.app')
	
@section('content')

@include("subviews.menu")

<?php

	session_start();

	$curUrl = Request::url();
	$_SESSION["currentUrl"] = $curUrl;

?>

<!-- https://medium.com/justlaravel/search-functionality-in-laravel-a2527282150b -->

<div class="p-3 postinfo" >
	@desktop
		<img src="img/seeit.png" height="18px">
	@elsedesktop
		<span class="vlg-vtext font-bold font-red">&#8224;&nbsp;</span>
	@enddesktop
	<span class="vlg-vtext">@lang('purchase.postit')</span>

	@guest
		<span class="md-vtext font-bold pt-1" style="display:block">@lang('purchase.loginplease')</span>
		<!--button type="button" disabled><span class="md-vtext">Post</span></button-->
	@else
		<button type="button" class="btn-primary pt-1" id="btn-purchase" style="display:block">
			<span class="md-vtext">@lang('purchase.postbtn')</span>
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
	<form action="/searchpurchase" method="GET" name="form1" class="d-inline" onsubmit="return required();">
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
                	<span class="vlg-vtext">@lang('purchase.sortby'):</span>
                    <button type="button" class="close" data-dismiss="modal">
                    	<span class="lg-vtext" font-bold>&#88;</span>
                    </button>
                </div>
                <div class="modal-body">
                	<ul class="pp-dialog">
                		<li onclick="sort('created_at')" class="pointme">@lang('purchase.sortdate')</li>
                		<li onclick="sort('product')" class="pointme">@lang('purchase.sortproduct')</li>
                		<li onclick="sort('phonecode')" class="pointme">@lang('purchase.sortcountry')</li>
                		<li onclick="sort('buysell')" class="pointme">@lang('purchase.sortbuysell')</li>
                	</ul>
                </div>
            </div>
        </div>
	</div>
</div>  

<div class="pb-3 pl-3 pr-3 mt-2 viewdata m-viewdata">
	
	<?php
		$temp = array();

		if ((session()->get('sortedpurchases')) !== null){
			$temp = session()->get('sortedpurchases');
			$purchases = $temp;
		}
	?>
	<div>
		@foreach($purchases as $purchase)

			<?php
				if (isset($loggedBy) && ($purchase->loginname == $loggedBy))
					$showDel = 1;
				else
					$showDel = 0;
			?>

			<div class="pb-5 pt-2">
				<span class="font-mbold font-darkorange underlined">@lang('purchase.num'):&nbsp;</span>
				<span class='pr-5 font-darkorange'>{{$purchase->id}}</span>
				<span class="font-sbold">@lang('purchase.dt'):&nbsp;</span>
					<?php echo substr($purchase->created_at,0,10) ?>
				@if ($showDel)
					<img src="img/pencil.png" onclick="editme( {{ $purchase->id }} )" 
						class="float-right btn-edit" title="edit it">
				@endif
				<br>

				<span class="font-sbold">@lang('purchase.nm'):&nbsp;</span>
					{{$purchase->firstname}}&nbsp;{{$purchase->lastname}}
				<br>

				<span class="font-sbold">@lang('purchase.ctry'):&nbsp;</span>
					<?php echo substr($purchase->country, 0, 30) ?>
				@if ($showDel)
					<img src="img/delete.png" onclick="deleteme( {{ $purchase->id }} )" 
						class="float-right btn-delete" title="delete it">
				@endif
				<br>

				@if (($purchase->contactme)== 1)
					<span class="font-sbold">@lang('purchase.phone'):&nbsp;</span>
						@lang('purchase.cc'):&nbsp;{{$purchase->phonecode}},&nbsp;&nbsp;
						@lang('purchase.snm'):&nbsp;{{$purchase->phonenumber}}<br>
					<span class="font-sbold">@lang('purchase.email'):&nbsp;</span>{{$purchase->email}}<br>
				@else
					<span class="font-sbold">@lang('purchase.phone'):&nbsp;</span>@lang('purchase.contactme') @lang('general.company-short')<br>
					<span class="font-sbold">@lang('purchase.email'):&nbsp;</span>@lang('purchase.contactme') @lang('general.company-short')<br>
				@endif

				<span class="font-sbold">@lang('purchase.bs'):&nbsp;</span>{{strtoupper($purchase->buysell)}}<br>

				<span class="font-sbold">@lang('purchase.pc'):&nbsp;</span>{{$purchase->product}}<br>
				<span class="font-sbold">@lang('purchase.des'):&nbsp;</span>
				<span class="pp-wordwrap">{{$purchase->description}}</span>
			</div>
		@endforeach

	</div>

	<?php echo $purchases->render(); ?>

</div>


<script>

	$(document).ready(function(){
    	$("#btn-purchase").click(function(){
        	//$("#form-purchase").toggle();
        	window.location.href = "/addpurchase";
    	});
	});

	function sort(by) {
		window.location.href = "/purchasesort/" + by;
	}

	function deleteme(id) {
		var cfm = confirm("Remove this posting?");
		
		if (cfm)
			window.location.href = "/purchasedelete/" + id;
	}
	
	function editme(id) {
		window.location.href = "/purchaseedit/" + id;
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