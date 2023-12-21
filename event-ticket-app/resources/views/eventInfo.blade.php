@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $event->title }}</h1>
    <p>{{ $event->date }}</p>
    <p>{{ $event->about }}</p>
    <p>{{ $event->description }}</p>
    <p>{{ $event->price }}</p>
</div>
@endsection