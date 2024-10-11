@extends('layouts.dashboard')
@section('title','/ Create Level')

@section('content')

<form action="{{ route('dashboard.books.store') }}" method="POST">
    @include('dashboard.books._form',[
        'button_label'=>'Add'
    ])
</form>

@endsection
