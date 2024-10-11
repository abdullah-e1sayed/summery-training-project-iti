@extends('layouts.dashboard')
@section('title',' / Edit Book')

@section('content')

<form action="{{ route('dashboard.books.update',$book->id) }}" method="POST">
    @method('PUT')
    @include('dashboard.books._form',[
        'button_label'=>'Update'
    ])
</form>

@endsection
