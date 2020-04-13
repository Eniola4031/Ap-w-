@extends('layouts.app')
@section ("content")
<form  method="post" action="/transaction/store">
@csrf
<div class="form-group row">
<label for="amount" class="col-md-4 col-form-label text-md-right">Enter Transfer Amount</label>
<input type="number" name="amount" value="amount">
<input type="submit"><br>
  </div> 
</form>
@endsection 
