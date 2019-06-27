@extends('layouts.app')
	
@section('content')

@include("subviews.menu")

<?php

	session_start();

	$homeUrl = config('app.url');

	$sp = null;
	$numsearched = 0;

	if (session('sfunds') !== null) {
		$sp = session('sfunds');
		$numsearched = count($sp);
	}

?>

<div class="pb-3 pl-3 pr-3 mt-2 viewdata m-viewdata">
	@desktop
		<div>
			<img src="img/back.png" class="btn-back" title="back to search" 
				onclick="location.href='{{$homeUrl}}/fund'">
		</div>
	@elsedesktop
		<div><img src="img/back.png" onclick="location.href='{{$homeUrl}}/fund'"></div>
	@enddesktop 
	<span class="font-bold font-red">@lang('fund.sresult')</span>
	@if (!$numsearched)
		: 0 @lang('fund.rfound').
	@else
		<br><br>
		<div>
			@foreach($sp as $fund)

				<?php
					if (isset($loggedBy) && ($fund->loginname == $loggedBy))
						$showDel = 1;
					else
						$showDel = 0;
				?>

				<div class="pb-5 pt-2">
					<span class="font-sbold">@lang('fund.num'):&nbsp;</span>
					<span class='pr-5'>{{$fund->id}}</span>
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

		<!--?php echo $sp->render(); ?-->
		{{ $sp->links() }}

	@endif

</div>

@endsection 