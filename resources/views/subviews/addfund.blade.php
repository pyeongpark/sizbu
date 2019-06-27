@extends('layouts.app')
	
@section('content')

@include("subviews.menu")

<?php
	session_start();

	$curUrl = $_SESSION['currentUrl'];
?>

<div class="p-3 lg-vtext">
	<span class="md-vtext font-red" style="padding-left:20px">
		* @lang('fund.postit')
	</span>
	<form id="form-purchase" class="formenu" action="/postfund" method="GET">
		  @csrf
		
		  <input type="hidden" name="back2url" value={{$curUrl}}>

		  <a href=" {{ route('fund') }}"><span class="float-right font-blue texton">
			 @lang('fund.close')</span></a>
		
		  <label class="col-sm-3 control-label font-bold">@lang('fund.fn'):</label>
  		&nbsp;<input type="text" name="firstname" value="{{ old('firstname') }}"
  		@error('firstname') is-invalid @enderror>
  		@error('firstname')
  	      <div class="alert alert-danger">{{ $message }}</div>
  	  @enderror
    	<br>

  		<label class="col-sm-3 control-label font-bold">@lang('fund.ln'):</label>
  		&nbsp;<input type="text" name="lastname" value="{{ old('lastname') }}"
  		@error('lastname') is-invalid @enderror>
  		@error('lastname')
		      <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
  		<br>

    	<label class="col-sm-3 control-label font-bold">@lang('fund.ctry'):</label>&nbsp;
		  <input list="subnation" name="country" @error('country') is-invalid @enderror>
		  <datalist id="subnation">
			   @lang('longview.ca-nations')
		  </datalist>
		  @error('country')
		      <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
		  <br>

    	<label class="col-sm-5 control-label font-bold">@lang('fund.pcc'):</label>
  		&nbsp;<input type="text" name="phonecode" size="2" value="{{ old('phonecode') }}"
  		@error('phonecode') is-invalid @enderror><span class="sm-vtext">&nbsp;(digits only)</span>
  		@error('phonecode')
		    <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
    	<br>

    	<label class="col-sm-5 control-label font-bold">@lang('fund.pn'):</label>
  		&nbsp;<input type="text" name="phonenumber" size="10" value="{{ old('phonenumber') }}"
  		@error('phonenumber') is-invalid @enderror>
  		@error('phonenumber')
		    <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
    	<br>

    	<label class="col-sm-5 control-label font-bold">@lang('fund.email'):</label>
  		&nbsp;<input type="text" name="email" value="{{old('email')}}"
  		@error('email') is-invalid @enderror>
  		@error('email')
		    <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
    	<br>

    	<label class="col-sm-8 control-label font-bold">@lang('fund.cy')</label>
    	<div class="radio">
		    <label class="col-sm-2"><input type="radio" name="contactme" value="1" checked>
		  		<span class="pl-2">Yes</span></label>
		  	<label class="col-sm-7"><input type="radio" name="contactme" value="0">
		  		<span class="pl-2">@lang('fund.ot') @lang('general.company-short')</span></label>
		  </div>
		  <span class="pp-space-abit"></span>

    	<label class="col-sm-4 control-label font-bold">@lang('fund.fa'):</label>
    	&nbsp;<input type="text" name="amount" size="7" value="{{ old('amount') }}"
  		@error('phonecode') is-invalid @enderror><span class="sm-vtext">&nbsp;(digits only)</span>
  		@error('amount')
		    <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
    	<br>
    	<span class="pp-space-abit"></span>

  		<label class="col-sm-4 control-label font-bold">@lang('fund.fw'):</label>
  		<select name="product" @error('product') is-invalid @enderror>
  		  <optgroup  class="select-fontsize">
				  @lang('longview.ca_product')
		    </optgroup>
  		</select>
  		@error('product')
		    <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
    	<span class="pp-space-abit"></span>

  		<label class="col-sm-10 control-label font-bold">
  			@lang('fund.tu'):</label>
    	<br>
    	@error('description')
		    <div class="alert alert-danger">{{ $message }}</div>
		  @enderror
  		<textarea name="description" rows="4" style="width:75%;" @error('description') is-invalid @enderror>
		    {{ old('description') }}
  		</textarea>
    	<span class="pp-space-abit"></span>

  		<button type="submit" id="submit">
  			<span class="md-vtext">Submit</span>
  		</button>
  	</form>
</div>


@endsection 