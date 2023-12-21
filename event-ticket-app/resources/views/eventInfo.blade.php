@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">{{ $event->title }}</h1>
    <p class="mb-1"><strong>Date:</strong> {{ $event->date }}</p>
    <p class="mb-1"><strong>About:</strong> {{ $event->about }}</p>
    <p class="mb-1"><strong>Description:</strong> {{ $event->description }}</p>
    <p class="mb-1"><strong>Price:</strong> {{ $event->price }}</p>
</div>
@endsection