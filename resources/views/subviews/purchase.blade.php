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
	<span class="vlg-vtext" style="display:block">Post what you want to purchase or sell.</span>
	@guest
		<span class="md-vtext font-bold" style="display:block">Please Login to post.</span>
		<!--button type="button" disabled><span class="md-vtext">Post</span></button-->
	@else
		<button type="button" class="btn-primary" id="btn-purchase"><span class="md-vtext">POST</span></button>
		<?php
			$loggedBy = Auth::user()->name;
		?>
	@endguest
</div>

<div class="ml-3 mr-3 mt-3">
	<img src="img/sort.png" class="btn-sort" title="sort data"
											data-toggle="modal" data-target="#sortModal">
	<!-- SEARCH HELP -->
	<form action="/search" method="POST" class="d-inline">
	    {{ csrf_field() }}
	    <div class="float-right">
	    	@desktop
				<input type="text" name="search" size="35" placeholder="search a product"> 
			@elsedesktop
				<input type="text" name="search" size="25" placeholder="search a product">
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
                	<span class="vlg-vtext">Sort by:</span>
                    <button type="button" class="close" data-dismiss="modal">
                    	<span class="lg-vtext" font-bold>&#88;</span>
                    </button>
                </div>
                <div class="modal-body">
                	<ul class="pp-dialog">
                		<li onclick="sort('created_at')" class="pointme">Date (older earlier)</li>
                		<li onclick="sort('product')" class="pointme">Product</li>
                		<li onclick="sort('phonecode')" class="pointme">Country</li>
                		<li onclick="sort('buysell')" class="pointme">Buy or Sell</li>
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
				<span class="font-sbold">Number:&nbsp;</span>
				<span class='pr-5'>{{$purchase->id}}</span>

				@if ($showDel)
					<img src="img/delete.png" class="float-right btn-delete" title="delete it">
				@endif

				<span class="font-sbold">Date:&nbsp;</span>
					<?php echo substr($purchase->created_at,0,10) ?><br>
				<span class="font-sbold">Name:&nbsp;</span>
					{{$purchase->firstname}}&nbsp;{{$purchase->lastname}}<br>

				@if (($purchase->contactme)== 1)
					<span class="font-sbold">Phone:&nbsp;</span>
						country code:&nbsp;{{$purchase->phonecode}},&nbsp;&nbsp;
						number:&nbsp;{{$purchase->phonenumber}}<br>
					<span class="font-sbold">E-mail:&nbsp;</span>{{$purchase->email}}<br>
				@else
					<span class="font-sbold">Phone:&nbsp;</span>Contact me through @lang('general.company-short')<br>
					<span class="font-sbold">E-mail:&nbsp;</span>Contact me through @lang('general.company-short')<br>
				@endif

				<span class="font-sbold">Buy or Sell:&nbsp;</span>{{strtoupper($purchase->buysell)}}<br>

				<span class="font-sbold">Product category:&nbsp;</span>{{$purchase->product}}<br>
				<span class="font-sbold">Description:&nbsp;</span>
				<span class="pp-wordwrap">{{$purchase->description}}</span>
			</div>
		@endforeach

	</div>
</div>


<script>
	
	$(document).ready(function(){
    	$("#btn-purchase").click(function(){
        	//$("#form-purchase").toggle();
        	window.location.href = "/addpurchase";
    	});
	});

	function sort(by){
		window.location.href = "/purchasesort/" + by;
	}
	
</script>


@endsection 