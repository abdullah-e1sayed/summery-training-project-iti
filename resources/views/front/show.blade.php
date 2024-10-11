@extends('layouts.front')

@section('content')
<div style="background-color:#e2a0a8 ; border-radius: 20%;">
  <div>
      <h1 style="text-align:center ;">{{ $book->name }}</h1>
      <p   style="text-align:center ;">{{ $book->description }}    </p>
      <h1 style="text-align:center ;">
        <form action="{{ route('front.borrowed-books.store') }}" method="POST">
          @csrf
          <input type="hidden" name="book_id" value="{{ $book->id }}">
        <button type="submit"  class="btn btn-primary mt-auto align-self-center">Borrow now</button>
        </form>
      </h1>

  </div>
</div>

@endsection