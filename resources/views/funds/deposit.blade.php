@extends('layouts.app')
@section ("content")
<script src="https://js.paystack.co/v1/inline.js"></script>

<form  method="post" action="/deposit/store">
@csrf
<div class="form-group row">
<label for="transactAmt" class="col-md-4 col-form-label text-md-right">Enter Deposit Amount</label>
<input type="number" name="amount" value="amount">
<input type="submit">
<button type="button" onclick="payWithPaystack()"> Pay </button> 
  </div> 
</form>
<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

@endsection 





