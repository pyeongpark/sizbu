@extends('layouts.app')
	
@section('content')

@include("subviews.menu")

<?php

	session_start();

	$searchResult = null;

	if (session('search-result') !== null)
		$searchResult = session('search-result');

?>

<div class="pb-3 pl-3 pr-3 mt-2 viewdata m-viewdata">
	@desktop
		<div>
			<img src="img/back.png" class="btn-back" title="back to search"
				onclick="window.history.go(-1); return false;">
		</div>
	@elsedesktop
		<div><img src="img/back.png" onclick="window.history.go(-1); return false;"></div>
	@enddesktop
	<span class="font-bold font-red">search result</span>
	@if (!$searchResult)
		: 0 result found.
	@else
		<div>
			@foreach($searchResult as $purchase)

				<?php
					if (isset($loggedBy) && ($purchase->loginname == $loggedBy))
						$showDel = 1;
					else
						$showDel = 0;
				?>

				<div class="pb-5 pt-2">
					<span class="font-sbold">Number:&nbsp;</span>
					<span class='pr-5'>{{$purchase->id}}</span>
					<span class="font-sbold">Date:&nbsp;</span>
						<?php echo substr($purchase->created_at,0,10) ?>
					@if ($showDel)
						<img src="img/pencil.png" onclick="editme( {{ $purchase->id }} )" 
							class="float-right btn-edit" title="edit it">
					@endif
					<br>

					<span class="font-sbold">Name:&nbsp;</span>
						{{$purchase->firstname}}&nbsp;{{$purchase->lastname}}
					<br>

					<span class="font-sbold">Country:&nbsp;</span>
						<?php echo substr($purchase->country, 0, 30) ?>
					@if ($showDel)
						<img src="img/delete.png" onclick="deleteme( {{ $purchase->id }} )" 
							class="float-right btn-delete" title="delete it">
					@endif
					<br>

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
	@endif
</div>

@endsection 