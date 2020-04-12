@extends('layouts.app')
@section ("content")
<form  method="get" action="/TransferController@store">
@csrf
<div class="form-group row">
<label for="transactAmt" class="col-md-4 col-form-label text-md-right">Enter Transfer Amount</label>
<input type="text" name="transactAmt">
<input type="submit"><br>
<label for="transactAmt" class="col-md-4 col-form-label text-md-right">Click here to make payments</label>
  <button type="button" onclick="payWithPaystack()"> Pay </button>
  </div> 
</form>
@endsection 
