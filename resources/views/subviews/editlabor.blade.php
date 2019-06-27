@extends('layouts.app')
	
@section('content')

@include("subviews.menu")

<?php
	session_start();

	$curUrl = $_SESSION['currentUrl'];

	$editId = $_SESSION['editIdLabor'];

	$editLabor = $_SESSION['editLabor'];
	$ep = $editLabor[0];
?>
	
<div class="p-3 lg-vtext">
	<span class="md-vtext font-red" style="padding-left:20px">
		* @lang('laborer.ep').
	</span>
	<form id="form-labor" class="formenu" action="/post_editedlabor" method="GET">
		@csrf
		
		<input type="hidden" name="back2url" value={{$curUrl}}>
		<input type="hidden" name="id" value={{$editId}}>

		<a href=" {{ route('laborer') }}">
			<span class="float-right font-blue texton">@lang('laborer.close')</span>
		</a>
		
  		<label class="col-sm-3 control-label font-bold">@lang('laborer.fn'):</label>
  		&nbsp;<input type="text" name="firstname" value="{{ $ep->firstname }}"
  		@error('firstname') is-invalid @enderror>
  		@error('firstname')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
  		<label class="col-sm-3 control-label font-bold">@lang('laborer.ln'):</label>
  		&nbsp;<input type="text" name="lastname" value="{{ $ep->lastname }}"
  		@error('lastname') is-invalid @enderror>
  		@error('lastname')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
  		<br>

    	<label class="col-sm-3 control-label font-bold">@lang('laborer.ctry'):</label>&nbsp;
		<input list="subnation" name="country" @error('country') is-invalid @enderror>
		<datalist id="subnation">
			@lang('longview.ca-nations')
		</datalist><span class="font-red md-vtext">(please select)</span>
		@error('country')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<br>

    	<label class="col-sm-5 control-label font-bold">@lang('laborer.pcc'):</label>
  		&nbsp;<input type="text" name="phonecode" size="2" value="{{ $ep->phonecode }}"
  		@error('phonecode') is-invalid @enderror><span class="sm-vtext">&nbsp;(digits only)</span>
  		@error('phonecode')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
    	<label class="col-sm-5 control-label font-bold">@lang('laborer.pn'):</label>
  		&nbsp;<input type="text" name="phonenumber" size="10" value="{{ $ep->phonenumber }}"
  		@error('phonenumber') is-invalid @enderror>
  		@error('phonenumber')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
    	<label class="col-sm-5 control-label font-bold">@lang('laborer.email'):</label>
  		&nbsp;<input type="text" name="email" value="{{$ep->email}}"
  		@error('email') is-invalid @enderror>
  		@error('email')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
    	<label class="col-sm-8 control-label font-bold">@lang('laborer.cy')?</label>
    	<div class="radio">
    		@if ($ep->contactme)
			  	<label class="col-sm-2"><input type="radio" name="contactme" value="1" checked>
			  		<span class="pl-2">Yes</span></label>
			  	<label class="col-sm-7"><input type="radio" name="contactme" value="0">
			  		<span class="pl-2">@lang('laborer.ot')&nbsp;@lang('general.company-short')</span></label>
			@else
				<label class="col-sm-2"><input type="radio" name="contactme" value="1">
			  		<span class="pl-2">Yes</span></label>
			  	<label class="col-sm-7"><input type="radio" name="contactme" value="0" checked>
			  		<span class="pl-2">@lang('laborer.ot')&nbsp;@lang('general.company-short')</span></label>
			@endif
		</div>
		<span class="pp-space-abit"></span>

    	<label class="col-sm-4 control-label font-bold">@lang('laborer.wp'):</label>
    	&nbsp;<input type="text" name="payment" value="{{ $ep->weekpay }}"
  		@error('payment') is-invalid @enderror>
  		@error('payment')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<br>

		<label class="col-sm-4 control-label font-bold">@lang('laborer.wh'):</label>
    	&nbsp;<input type="text" name="hours" value="{{ $ep->weekhours }}"
  		@error('hours') is-invalid @enderror>
  		@error('hours')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<br>

		<label class="col-sm-4 control-label font-bold">@lang('laborer.hm'):</label>
    	&nbsp;<input type="text" name="howmany" value="{{ $ep->howmany }}"
  		@error('howmany') is-invalid @enderror>
  		@error('howmany')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<br>
		<span class="pp-space-abit"></span>

  		<label class="col-sm-5 control-label font-bold">@lang('laborer.lc'):</label>
  		<select name="product" @error('product') is-invalid @enderror>
  			<optgroup  class="select-fontsize">
				@lang('longview.ca_labor')
			</optgroup>
  		</select>
  		@error('product')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<span class="pp-space-abit"></span>

  		<label class="col-sm-10 control-label font-bold">
  			@lang('laborer.tu'):</label>
    	<br>
    	@error('description')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
  		<textarea name="description" rows="4" style="width:75%;" @error('description') is-invalid @enderror>
		{{ $ep->description }}
  		</textarea>
    	<span class="pp-space-abit"></span>

  		<button type="submit" id="submit">
  			<span class="md-vtext">Submit</span>
  		</button>
  	</form>
</div>

@endsection 

<script>
</script>
