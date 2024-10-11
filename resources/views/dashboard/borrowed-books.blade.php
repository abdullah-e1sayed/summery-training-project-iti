@extends('layouts.dashboard')
@section('title','/ Student')


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
            <th>Borrwed to </th>
            <th>Student ID </th>
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
            <td>{{ $borrowedBook->user->name }}</td>           
            <td>{{ $borrowedBook->user->national_id }}</td>  
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
