@extends('layouts.app')

@section('content')
<h1>Checkout</h1>

<form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
    @csrf

    <div>
        <label for="card-element">Credit or Debit Card</label>
        <div id="card-element"><!-- A Stripe Element will be inserted here. --></div>
        <div id="card-errors" role="alert"></div>
    </div>
    
    <button type="submit" class="btn btn-primary">Checkout</button>
</form>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env("STRIPE_PUBLIC") }}');
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    var form = document.getElementById('checkout-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.confirmCardPayment("{{ $paymentIntent->client_secret }}").then(function(result) {
            if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                document.getElementById('card-errors').textContent = result.error.message;
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    form.submit();
                }
            }
        });
    });
</script>
@endsection
