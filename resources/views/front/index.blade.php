@extends('layouts.front')

@section('content')
<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">

  <x-form.input name="name" placeholder="Book name" class="mx-2" :value="request('name')"/>
  
  <button class="btn btn-dark" class="mx-2">Search</button>

</form>
<div class="row">

  
    @forelse ($books as $book) 
    <div class="card" >
    <div class="card-body  d-flex flex-column">
      <h4 class="card-title description">{{ $book->name }} </h4>
      <p class="card-text description mb-3">{{ $book->description }} </p>
      <a href="{{ route('front.book-details',$book->id) }}" class="btn btn-primary mt-auto align-self-center">Borrow now</a>
    </div>
  </div>
  @empty
<h5>No books available</h5>
  @endforelse   

  </div>
  {{ $books->withQueryString()->links() }}
  @endsection