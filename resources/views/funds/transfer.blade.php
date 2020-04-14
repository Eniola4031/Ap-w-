@extends('layouts.app')
@section ("content")
<form  method="post" action="/transfer/store">
@csrf
<div class="form-group row">
<label for="amount" class="col-md-4 col-form-label text-md-right">Enter Transfer Amount</label>
<input type="number" name="amount" value="amount">
<input type="submit">
</div>

  <h6>Click here to choose a user to send money to:<h6>
  <div class="row">
  <select name="user_id" > 
       @foreach($users as $user)
           <option value="{{ $user->id }}" > {{ $user->name }} </option> 
      @endforeach
</select>
  </div>
  </div>
  </form>
@endsection 
