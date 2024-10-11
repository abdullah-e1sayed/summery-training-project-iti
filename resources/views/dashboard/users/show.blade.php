@extends('layouts.dashboard')
@section('title','/ Student')


@section('content')
<h2 style="text-align: center">{{ $user->name }} Details</h2>

<x-alert type="success"/>
<x-alert type="info"/>

<div class="card" style="width: 18rem; width:100%">
    
    <div class="card-body">
      <h5 class="card-title">Name : {{ $user->name }}</h5>
      <p class="card-text">Email : {{ $user->email }}</p>
      <p class="card-text">National ID : {{ $user->national_id }}</p>
    </div>
  </div>
  <h3 style="text-align: center">Borrwed Books</h3>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Book</th>
            <th>Borrwed at </th>
            <th>Puted on the shelf at </th>
            </tr>
    </thead>
    <tbody>
        @forelse ($borrowedBooks as $borrowedBook) 
        <tr>
            <td></td>
            <td>{{ $borrowedBook->id }}</td>           
            <td>{{ $borrowedBook->book->name }}</td>           
            <td>{{ $borrowedBook->created_at}}</td>           
            <td>{{ $borrowedBook->returned_at?? 'Still Borrowed' }}</td>           
        </tr>
        @empty
        <td colspan="7">No Borrowed Books</td>      
        @endforelse            
        
    </tbody>
</table>
{{ $borrowedBooks->withQueryString()->links() }}

@endsection
