@extends('layouts.app')
	
@section('content')

@include("subviews.menu")

<?php

	session_start();

	$homeUrl = config('app.url');

	$sp = null;
	$numsearched = 0;

	if (session('spurchases') !== null) {
		$sp = session('spurchases');
		$numsearched = count($sp);
	}

?>

<div class="pb-3 pl-3 pr-3 mt-2 viewdata m-viewdata">
	@desktop
		<div>
			<img src="img/back.png" class="btn-back" title="back to search" 
				onclick="location.href='{{$homeUrl}}/purchase'">
		</div>
	@elsedesktop
		<div><img src="img/back.png" onclick="location.href='{{$homeUrl}}/purchase'"></div>
	@enddesktop 
	<span class="font-bold font-red">@lang('purchase.sresult')</span>
	@if (!$numsearched)
		: 0 @lang('purchase.rfound').
	@else
		<br><br>
		<div>
			@foreach($sp as $purchase)

				<?php
					if (isset($loggedBy) && ($purchase->loginname == $loggedBy))
						$showDel = 1;
					else
						$showDel = 0;
				?>

				<div class="pb-5 pt-2">
					<span class="font-sbold">@lang('purchase.num'):&nbsp;</span>
					<span class='pr-5'>{{$purchase->id}}</span>
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

		<!--?php echo $sp->render(); ?-->
		{{ $sp->links() }}

	@endif

</div>

@endsection 