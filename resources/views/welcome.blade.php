<?php
	
	session_start();

	$curUrl = Request::url();

	$_SESSION["currentUrl"] = $curUrl;
?>
	
@extends('layouts.app')
	
@section('content')

	@include("subviews.menu")
	<div class="pp-center md-vtext">
		<p>
			Post your business needs or 
			Search for your needs.
		</p>
		<p>
			Are you looking for an investment?
		</p>
		<p>
			Do you want partners?
		</p>

		<p>
			looking for suppliers
		</p>
	</div>

@endsection 