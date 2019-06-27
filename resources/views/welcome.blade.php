<?php
	
	session_start();

	//$curUrl = Request::url();

	//$_SESSION["currentUrl"] = $curUrl;
?>
	
@extends('layouts.app')
	
@section('content')

	@include("subviews.menu")

	@desktop 
		<div class="pp-center md-vtext" style='background-image: url("img/wel1.jpg");opacity: 0.8;height:100vh'>
	@elsedesktop
		<div class="pp-center md-vtext" style='background-image: url("img/wel2.jpg");opacity: 0.8;height:100vh'>
	@enddesktop
			<br><br>
			<p class="pp-center lg-vtext font-white font-bold p-5" style="text-shadow: 2px 2px 4px black;">
				@lang('welcome.ca1')
			</p>
			<br><br>
			
			@desktop
			<span class="pp-center lg-vtext font-white font-bold">@lang('welcome.youcan')</span><BR><BR><br>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6" style="border:2px solid white; border-radius: 25px;">
					<p class="pp-center md-vtext font-bold font-white">@lang('welcome.wt')</p>
					<p class="pp-center md-vtext font-bold font-white">@lang('welcome.sf')</p>
					<p class="pp-center md-vtext font-bold font-white">@lang('welcome.bs')</p>
					<p class="pp-center md-vtext font-bold font-white">@lang('welcome.fw')</p>
					<p class="pp-center md-vtext font-bold font-white">@lang('welcome.fj')</p>
					<!--p class="pp-center md-vtext font-bold font-white">@lang('welcome.dy')</p-->
				</div>
				<div class="col-sm-3"></div>
			</div>
			@elsedesktop
			<br><br><br>
			<span class="pp-center lg-vtext font-white font-bold">@lang('welcome.youcan')</span><BR><BR>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-10" style="border:3px solid white; border-radius: 25px;">
					<p class="pp-center md-vtext font-bold font-white">@lang('welcome.wt')</p>
					<p class="pp-center md-vtext font-bold font-white">@lang('welcome.sf')</p>
					<p class="pp-center md-vtext font-bold font-white">@lang('welcome.bs')</p>
					<p class="pp-center md-vtext font-bold font-white">@lang('welcome.fw')</p>
					<p class="pp-center md-vtext font-bold font-white">@lang('welcome.fj')</p>
					<!--p class="pp-center md-vtext font-bold font-white">@lang('welcome.dy')</p-->
				</div>
				<div class="col-sm-1"></div>
			</div>
			@enddesktop

		</div>
	
@endsection 