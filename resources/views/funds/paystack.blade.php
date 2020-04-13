@extends('layouts.app')
@section ("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <form action="/deposit/store" method="POST" class="mx-auto">
        @csrf
        <script
            src="https://js.paystack.co/v1/inline.js" 
            data-key="pk_test_58aa36ad1e9aaea6bf1b169f6256c5d9a40767d6"
            data-email="<?= Auth()->user()->email ?>"
            data-amount="<?= $amount."00" ?>"
        >
        </script>
        <input type="hidden" name="amount" value="<?= $amount ?>">
        </form>
        </div>
    </div>
</div>

@endsection
