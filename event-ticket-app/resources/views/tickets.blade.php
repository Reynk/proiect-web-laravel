@extends('layouts.app')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<header>
    <nav>

    </nav>
</header>
<h1>Upcoming events</h1>
<div class="event-list">
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>About</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->about }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->price }}</td>
                <td>
                    <a href="{{ route('eventInfo', ['id' => $event->id]) }}" class="btn btn-info">Event Info</a>
                </td>
                <td>
                    <div class="buy-ticket">
                        <form action="{{ route('handlePayment') }}" method="POST">
                            @csrf
                            <!-- ... existing fields ... -->
                            <label for="size">Size</label>
                            <select name="size" id="size">
                                @for ($i = 1; $i <= 9; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                            <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>

                    <button type="submit" class="btn btn-primary">Buy Ticket</button>
                    </form>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Creatpe client.
    var stripe = Stripe('{{ env("STRIPE_KEY") }}');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    var style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: '#32325d',
        },
    };

    // Create an instance of the card Element.
    var card = elements.create('card', { style: style });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        stripe.createToken(card).then(function (result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the          form.submit();
    }
</script>
@endsection