@extends('layouts.app')

@section('title', 'Test Bootstrap')

@section('content')
<div class="container">
    <h1 class="mt-4">Test Bootstrap</h1>
    <button class="btn btn-primary">Cliquez-moi</button>
    <div class="alert alert-success mt-3">
        Bootstrap est correctement intégré !
    </div>
</div>
@endsection
