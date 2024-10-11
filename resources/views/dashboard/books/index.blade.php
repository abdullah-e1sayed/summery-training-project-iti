@extends('layouts.dashboard')
@section('title','/ Students')


@section('content')
<h2 style="text-align: center">Books</h2>

<x-alert type="success"/>
<x-alert type="info"/>

<div class="mb-5">
    <a href="{{ route('dashboard.books.create') }}" class="btn btn-sm btn-outline-primary">Create Book</a>
</div>
<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">

    <x-form.input name="name" placeholder="Book name" class="mx-2" :value="request('name')"/>
    
    <button class="btn btn-dark" class="mx-2">Fillter</button>

</form>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($books as $book) 
        <tr>
            <td></td>
            <td>{{ $book->id }}</td>
            <td>{{ $book->name }}</td>            
            <td>{{ $book->description }}</td>            
          
            <td>
                <a href="{{ route('dashboard.books.edit',$book->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                <form action="{{ route('dashboard.books.destroy',$book->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>

        </tr>
        @empty
        <td colspan="5">No books defined</td>      
        @endforelse            
        
    </tbody>
</table>
{{ $books->withQueryString()->links() }}

@endsection
