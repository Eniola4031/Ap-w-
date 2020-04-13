@extends('layouts.app')
@section ("content")
<form  method="post" action="/transfer/store">
@csrf
<div class="form-group row">
<label for="amount" class="col-md-4 col-form-label text-md-right">Enter Transfer Amount</label>
<input type="number" name="amount" value="amount">
<input type="submit"><br>
  </div> 
  <div>
  <h6>Other users<h6>
  <select name="user_id" > 
       @foreach($users as $user)
           <option value="{{ $user->id }}" > {{ $user->name }} </option> 
      @endforeach
</select>
  </div>
  </form>
@endsection 
