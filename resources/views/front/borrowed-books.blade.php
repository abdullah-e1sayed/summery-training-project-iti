@extends('layouts.front')
@section('title','/ Borrwed Books')


@section('content')
<h2 style="text-align: center"> Borrowed Books</h2>

<x-alert type="success"/>
<x-alert type="info"/>

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
        @php
            $counter = 1;
        @endphp
        @forelse ($borrowedBooks as $borrowedBook) 
        <tr>
            <td></td>
            <td>{{ $counter }}</td>           
            <td>{{ $borrowedBook->book->name }}</td>           
            <td>{{ $borrowedBook->created_at}}</td>           
            <td>{{ $borrowedBook->returned_at?? '' }}
                @if ($borrowedBook->returned_at == null)
                    <form action="{{ route('front.borrowed-books.update',$borrowedBook->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <button type="submit"  class="btn btn-primary mt-auto align-self-center">Return to the shelf</button>
                    </form>
                @endif
            </td>           
        </tr>
        @php
            $counter++;
        @endphp
        @empty
        <td colspan="7">No Borrowed Books</td>      
        @endforelse            
        
    </tbody>
</table>
{{ $borrowedBooks->withQueryString()->links() }}

@endsection
