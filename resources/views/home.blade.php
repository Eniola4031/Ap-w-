@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if( session()->get('success') != null )

        <p class="text-success font-weight-bold">
        {{ session()->get('success') }}
        </p>
        
        @endif
        @if(session()->get('error') !== null)
      <p class="text-danger font-weight-bold">
            {{ session()->get('error') }}
      </p>
    @endif

            <div class="card">
                <div class="card-header">Welcome, {{ Auth()->user()->name }}</div>
                <div class="card-body">
                <ul>
                    <li>
           Your Current Wallet Balance: {{ App\Wallet::where('users_id', Auth()->user()->id)->first()->current_balance ?? 0 }}
                    </li>
                </ul>
                </div>
                
                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> -->
                
            </div>
        </div>
    </div>
</div>
@endsection
