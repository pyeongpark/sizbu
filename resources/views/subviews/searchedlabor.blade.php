@extends('layouts.app')
	
@section('content')

@include("subviews.menu")

<?php

	session_start();

	$homeUrl = config('app.url');

	$sp = null;
	$numsearched = 0;

	if (session('slaborers') !== null) {
		$sp = session('slaborers');
		$numsearched = count($sp);
	}

?>

<div class="pb-3 pl-3 pr-3 mt-2 viewdata m-viewdata">
	@desktop
		<div>
			<img src="img/back.png" class="btn-back" title="back to search" 
				onclick="location.href='{{$homeUrl}}/labor'">
		</div>
	@elsedesktop
		<div><img src="img/back.png" onclick="location.href='{{$homeUrl}}/labor'"></div>
	@enddesktop 
	<span class="font-bold font-red">@lang('laborer.sresult')</span>
	@if (!$numsearched)
		: 0 @lang('laborer.rfound').
	@else
		<br><br>

		<div>
			@foreach($sp as $laborer)
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

		<!--?php echo $sp->render(); ?-->
		{{ $sp->links() }}

	@endif

</div>

@endsection 