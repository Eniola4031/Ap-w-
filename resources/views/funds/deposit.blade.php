@extends('layouts.app')
@section ("content")
<form  method="get" action="">
@csrf
<div class="form-group row">
<label for="transactAmt" class="col-md-4 col-form-label text-md-right">Enter Transaction Amount</label>
<input type="text" name="transactAmt">
<input type="submit">
<br>
<label for="transactAmt" class="col-md-4 col-form-label text-md-right">Click here to make payments</label>
  <button type="button" onclick="payWithPaystack()"> Pay </button>
  </div> 
</form>
@endsection 
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_58aa36ad1e9aaea6bf1b169f6256c5d9a40767d6',
      email: 'customer@email.com',
      amount: 10000,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: 'Stephen',
      lastname: 'King',
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
<script src="https://js.paystack.co/v1/inline.js"></script>

