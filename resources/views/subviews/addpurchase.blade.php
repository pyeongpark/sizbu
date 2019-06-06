@extends('layouts.app')
	
@section('content')

@include("subviews.menu")

<?php
	session_start();

	$curUrl = $_SESSION['currentUrl'];
?>

<div class="p-3 lg-vtext">
	<span class="md-vtext font-red" style="padding-left:20px">
		* Post what you want to buy or to sell
	</span>
	<form id="form-purchase" class="formenu" action="/postpurchase" method="GET">
		@csrf
		
		<input type="hidden" name="back2url" value={{$curUrl}}>

		<a href=" {{ route('purchase') }}"><span class="float-right font-blue texton">Close</span></a>
		
  		<label class="col-sm-3 control-label font-bold">First Name:</label>
  		&nbsp;<input type="text" name="firstname" value="{{ old('firstname') }}"
  		@error('firstname') is-invalid @enderror>
  		@error('firstname')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
  		<label class="col-sm-3 control-label font-bold">Last Name:</label>
  		&nbsp;<input type="text" name="lastname" value="{{ old('lastname') }}"
  		@error('lastname') is-invalid @enderror>
  		@error('lastname')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
  		<br>
    	<label class="col-sm-5 control-label font-bold">Phone country code:</label>
  		&nbsp;<input type="text" name="phonecode" size="2" value="{{ old('phonecode') }}"
  		@error('phonecode') is-invalid @enderror>
  		@error('phonecode')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
    	<label class="col-sm-5 control-label font-bold">Phone number:</label>
  		&nbsp;<input type="text" name="phonenumber" size="10" value="{{ old('phonenumber') }}"
  		@error('phonenumber') is-invalid @enderror>
  		@error('phonenumber')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
    	<label class="col-sm-5 control-label font-bold">Email:</label>
  		&nbsp;<input type="text" name="email" value="{{old('email')}}"
  		@error('email') is-invalid @enderror>
  		@error('email')
		    <div class="alert alert-danger">{{ $message }}</div>
		@enderror
    	<br>
    	<label class="col-sm-8 control-label font-bold">Can someone contact you directly?</label>
    	<div class="radio">
		  	<label class="col-sm-2"><input type="radio" name="contactme" value="1" checked>
		  		<span class="pl-2">Yes</span></label>
		  	<label class="col-sm-7"><input type="radio" name="contactme" value="0">
		  		<span class="pl-2">No, only through @lang('general.company-short')</span></label>
		</div>
		<span class="pp-space-abit"></span>

    	<label class="col-sm-8 control-label font-bold">Do you want to buy or to sell?</label>
    	<div class="radio">
		  	<label class="col-sm-4"><input type="radio" name="buysell" value="buy" checked>
		  		<span class="pl-2">To purchase</span></label>
		  	<label class="col-sm-4"><input type="radio" name="buysell" value="sell">
		  		<span class="pl-2">To sell</span></label>
		</div>
		<span class="pp-space-abit"></span>

  		<label class="col-sm-4 control-label font-bold">What Product:</label>
  		<select name="product" @error('product') is-invalid @enderror>
  			<optgroup  class="select-fontsize">
				<option value='' disabled selected>--select one--</option>
			    <option value="apparels_clothes">Apparels or Clothes</option>
				<option value="boat_ship">Boats or Ships</option>
				<option value="building_material">Building material</option>
				<option value="ceramic">Ceramic</option>select-fontsize
				<option value="electrical_related">Electrical Related</option>
				<option value="farm_products">Farm products</option>
				<option value="furniture">Furniture</option>
				<option value="jewelry_stones">Jewelry or Stones</option>
				<option value="machinary">Machinery</option>
				<option value="medical">Medical</option>
				<option value="metal">Metal</option>
				<option value="oil">Oils or Fuels</option>
				<option value="plastic">Plastic</option>
				<option value="optical">Optical</option>
				<option value="paper">Paper</option>
				<option value="rubber">Rubber</option>
				<option value="sports">Sports</option>
				<option value="textile_lether">Textile or Lether</option>
				<option value="toy_game">Toys or Games</option>
				<option value="vehicle">Vehicles</option>
				<option value="other">Others</option>
			</optgroup>
  		</select>
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
		{{ old('description') }}
  		</textarea>
    	<span class="pp-space-abit"></span>

  		<button type="submit" id="submit">
  			<span class="md-vtext">Submit</span>
  		</button>
  	</form>
</div>


@endsection 