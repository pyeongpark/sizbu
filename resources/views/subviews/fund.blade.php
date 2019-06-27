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
	<span class="vlg-vtext">@lang('fund.postit')</span>

	@guest
		<span class="md-vtext font-bold pt-1" style="display:block">@lang('fund.loginplease')</span>
		<!--button type="button" disabled><span class="md-vtext">Post</span></button-->
	@else
		<button type="button" class="btn-primary pt-1" id="btn-fund" style="display:block">
			<span class="md-vtext">@lang('fund.postbtn')</span>
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
	<form action="/searchfund" method="GET" name="form1" class="d-inline" onsubmit="return required();">
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
                	<span class="vlg-vtext">@lang('fund.sortby'):</span>
                    <button type="button" class="close" data-dismiss="modal">
                    	<span class="lg-vtext" font-bold>&#88;</span>
                    </button>
                </div>
                <div class="modal-body">
                	<ul class="pp-dialog">
                		<li onclick="sort('created_at')" class="pointme">@lang('fund.sortdate')</li>
                		<li onclick="sort('product')" class="pointme">@lang('fund.sortproduct')</li>
                		<li onclick="sort('phonecode')" class="pointme">@lang('fund.sortcountry')</li>
                		<li onclick="sort('amount')" class="pointme">@lang('fund.sortamount')</li>
                	</ul>
                </div>
            </div>
        </div>
	</div>
</div>  

<div class="pb-3 pl-3 pr-3 mt-2 viewdata m-viewdata">
	
	<?php
		$temp = array();

		if ((session()->get('sortedfunds')) !== null){
			$temp = session()->get('sortedfunds');
			$funds = $temp;
		}
	?>

	<div>
		@foreach($funds as $fund)

			<?php
				if (isset($loggedBy) && ($fund->loginname == $loggedBy))
					$showDel = 1;
				else
					$showDel = 0;
			?>

			<div class="pb-5 pt-2">
				<span class="font-mbold font-darkorange underlined">@lang('fund.num'):&nbsp;</span>
				<span class='pr-5 font-darkorange'>{{$fund->id}}</span>
				<span class="font-sbold">@lang('fund.dt'):&nbsp;</span>
					<?php echo substr($fund->created_at,0,10) ?>
				@if ($showDel)
					<img src="img/pencil.png" onclick="editme( {{ $fund->id }} )" 
						class="float-right btn-edit" title="edit it">
				@endif
				<br>

				<span class="font-sbold">@lang('fund.nm'):&nbsp;</span>
					{{$fund->firstname}}&nbsp;{{$fund->lastname}}
				<br>

				<span class="font-sbold">@lang('fund.ctry'):&nbsp;</span>
					<?php echo substr($fund->country, 0, 30) ?>
				@if ($showDel)
					<img src="img/delete.png" onclick="deleteme( {{ $fund->id }} )" 
						class="float-right btn-delete" title="delete it">
				@endif
				<br>

				@if (($fund->contactme)== 1)
					<span class="font-sbold">@lang('fund.phone'):&nbsp;</span>
						@lang('fund.cc'):&nbsp;{{$fund->phonecode}},&nbsp;&nbsp;
						@lang('fund.snm'):&nbsp;{{$fund->phonenumber}}<br>
					<span class="font-sbold">@lang('fund.email'):&nbsp;</span>{{$fund->email}}<br>
				@else
					<span class="font-sbold">@lang('fund.phone'):&nbsp;</span>@lang('fund.contactme') @lang('general.company-short')<br>
					<span class="font-sbold">@lang('fund.email'):&nbsp;</span>@lang('fund.contactme') @lang('general.company-short')<br>
				@endif

				<?php $raise = number_format($fund->amount); ?>
				<span class="font-sbold">@lang('fund.fa'):&nbsp;</span>{{$raise}}<br>

				<span class="font-sbold">@lang('fund.fc'):&nbsp;</span>{{$fund->product}}<br>
				<span class="font-sbold">@lang('fund.des'):&nbsp;</span>
				<span class="pp-wordwrap">{{$fund->description}}</span>
			</div>
		@endforeach

	</div>

	<?php echo $funds->render(); ?>

</div>

<script>

	$(document).ready(function(){
    	$("#btn-fund").click(function(){
        	//$("#form-fund").toggle();
        	window.location.href = "/addfund";
    	});
	});

	function sort(by) {
		window.location.href = "/fundsort/" + by;
	}

	function deleteme(id) {
		var cfm = confirm("Remove this posting?");
		
		if (cfm)
			window.location.href = "/funddelete/" + id;
	}
	
	function editme(id) {
		window.location.href = "/fundedit/" + id;
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