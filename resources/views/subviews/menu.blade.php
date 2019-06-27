

	
	<?php
		$currentUrl = $_SERVER['REQUEST_URI'];
		$menu = 0;

		if (strpos($currentUrl, "invest") !== false)
			$menu = 1;
		elseif (strpos($currentUrl, "fund") !== false) 
			$menu = 2;
		elseif (strpos($currentUrl, "purchase") !== false) 
			$menu = 3;
		elseif (strpos($currentUrl, "labor") !== false) 
			$menu = 4;
		
	?>

	<div>
		<div class="m-menu lg-vtext">

			@if ($menu === 1)
				<a class="a-menu" href="/invest">
					<span class="px-3 font-black bg-white">@lang('general.invest')</span></a>
			@else
				<a class="a-menu" href="/invest"><span class="px-3">@lang('general.invest')</span></a>
			@endif

			@if ($menu === 2)
				<a class="a-menu" href="/fund">
					<span class="px-3 font-black bg-white">@lang('general.fund')</span></a>
			@else
				<a class="a-menu" href="/fund"><span class="px-3">@lang('general.fund')</span></a>
			@endif

			@if ($menu === 3)
				<a class="a-menu" href="/purchase">
					<span class="px-3 font-black bg-white">@lang('general.purchase')</span></a>
			@else
				<a class="a-menu" href="/purchase"><span class="px-3">@lang('general.purchase')</span></a>
			@endif

			@if ($menu === 4)
				<a class="a-menu" href="/labor">
					<span class="px-3 font-black bg-white">@lang('general.labor')</span></a>
			@else
				<a class="a-menu" href="/labor"><span class="px-3">@lang('general.labor')</span></a>
			@endif
			
		</div>
	</div>