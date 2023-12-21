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
                <div class="buy-ticket">
                    <form action="{{ route('insertOrder') }}" method="POST">
                        @csrf
                        <select name="size">
                            @for ($i = 1; $i <= 9; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                        </select>
                        <input type="hidden" name="username" value="{{ $username }}">
                        <input type="hidden" name="event_title" value="{{ $event->title }}">
                        <input type="hidden" name="id" value="{{ $event->id }}">
                        <input type="hidden" name="price" value="{{ $event->price }}">
                        <button type="submit" class="custom-button">Buy Ticket</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env("STRIPE_KEY") }}');

    var elements = stripe.elements();

    var style = {
        base: {
            fontSize: '16px',
            color: '#32325d',
        },
    };

    var card = elements.create('card', { style: style });

    card.mount('#card-element');

    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        stripe.createToken(card).then(function (result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

    }
</script>
@endsection