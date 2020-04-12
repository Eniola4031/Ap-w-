@extends('layouts.app')
@section ("content")

{!! Form::open(['action' => 'DepositController@store', 'method' => 'post']) !!}
<div class="form-group row">
{{Form::label('amount','Amount')}}
{{ Form::text('amount',['class' => 'form-control', 'placeholder' => 'Enter Amount']) }}
</div>
{{!! Form::close() !!}}


@endsection 





