@extends('layouts.app')
@section ("content")
<form  method="post" action="/paystack">
@csrf
<div class="form-group row">
<label for="transactAmt" class="col-md-4 col-form-label text-md-right">Enter Deposit Amount</label>
<input type="number" name="amount" value="amount">
<input type="submit">
<!-- <button type="button" onclick="payWithPaystack()"> Pay </button>  -->
  </div> 
</form>
 @endsection 
