@extends('layouts.app')
	
@section('content')

@include("subviews.menu")

<?php
	session_start();

	$curUrl = $_SESSION['currentUrl'];

	$editId = $_SESSION['editIdPurchase'];

	$editPurchase = $_SESSION['editPurchase'];
	$ep = $editPurchase[0];
?>
	
<div class="p-3 lg-vtext">
	<span class="md-vtext font-red" style="padding-left:20px">
		* Edit your posting.
	</span>
	<form id="form-purchase" class="formenu" action="/post_editedpurchase" method="GET">
		@csrf
		
		<input type="hidden" name="back2url" value={{$curUrl}}>
		<input type="hidden" name="id" value={{$editId}}>

		<a href=" {{ route('purchase') }}"><span class="float-right font-blue texton">Close</span></a>
		
  		<label class="col-sm-3 control-label font-bold">First Name:</label>
  		&nbsp;<input type="text" name="firstname" value="{{ $ep->firstname }}"
  		@error('firstname') is-invalid @enderror>
  		@error('firstname')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
  		<label class="col-sm-3 control-label font-bold">Last Name:</label>
  		&nbsp;<input type="text" name="lastname" value="{{ $ep->lastname }}"
  		@error('lastname') is-invalid @enderror>
  		@error('lastname')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
  		<br>

    	<label class="col-sm-3 control-label font-bold">Your Country:</label>&nbsp;
		<input list="subnation" name="country" @error('country') is-invalid @enderror>
		<datalist id="subnation">
			@lang('longview.ca-nations')
		</datalist><span class="font-red md-vtext">(please select)</span>
		@error('country')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
		<br>

    	<label class="col-sm-5 control-label font-bold">Phone country code:</label>
  		&nbsp;<input type="text" name="phonecode" size="2" value="{{ $ep->phonecode }}"
  		@error('phonecode') is-invalid @enderror><span class="sm-vtext">&nbsp;(digits only)</span>
  		@error('phonecode')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
    	<label class="col-sm-5 control-label font-bold">Phone number:</label>
  		&nbsp;<input type="text" name="phonenumber" size="10" value="{{ $ep->phonenumber }}"
  		@error('phonenumber') is-invalid @enderror>
  		@error('phonenumber')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
    	<label class="col-sm-5 control-label font-bold">Email:</label>
  		&nbsp;<input type="text" name="email" value="{{$ep->email}}"
  		@error('email') is-invalid @enderror>
  		@error('email')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
    	<label class="col-sm-8 control-label font-bold">Can someone contact you directly?</label>
    	<div class="radio">
    		@if ($ep->contactme)
			  	<label class="col-sm-2"><input type="radio" name="contactme" value="1" checked>
			  		<span class="pl-2">Yes</span></label>
			  	<label class="col-sm-7"><input type="radio" name="contactme" value="0">
			  		<span class="pl-2">No, only through @lang('general.company-short')</span></label>
			@else
				<label class="col-sm-2"><input type="radio" name="contactme" value="1">
			  		<span class="pl-2">Yes</span></label>
			  	<label class="col-sm-7"><input type="radio" name="contactme" value="0" checked>
			  		<span class="pl-2">No, only through @lang('general.company-short')</span></label>
			@endif
		</div>
		<span class="pp-space-abit"></span>

    	<label class="col-sm-8 control-label font-bold">Do you want to buy or to sell?</label>
    	<div class="radio">
    		@if ($ep->buysell === 'buy')
			  	<label class="col-sm-4"><input type="radio" name="buysell" value="buy" checked>
			  		<span class="pl-2">To purchase</span></label>
			  	<label class="col-sm-4"><input type="radio" name="buysell" value="sell">
			  		<span class="pl-2">To sell</span></label>
			@else
				<label class="col-sm-4"><input type="radio" name="buysell" value="buy">
			  		<span class="pl-2">To purchase</span></label>
			  	<label class="col-sm-4"><input type="radio" name="buysell" value="sell" checked>
			  		<span class="pl-2">To sell</span></label>
			@endif
		</div>
		<span class="pp-space-abit"></span>

  		<label class="col-sm-4 control-label font-bold">What Product:</label>
  		<select name="product" @error('product') is-invalid @enderror>
  			<optgroup  class="select-fontsize">
				@lang('longview.ca_product')
			</optgroup>
  		</select><span class="font-red md-vtext">&nbsp;(please select)</span>
  		@error('product')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<span class="pp-space-abit"></span>
  		<label class="col-sm-10 control-label font-bold">
  			Describe a product to purchase or to sell:</label>
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
