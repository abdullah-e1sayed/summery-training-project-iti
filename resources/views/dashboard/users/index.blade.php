@extends('layouts.dashboard')
@section('title','/ Students')


@section('content')
<h2 style="text-align: center">Students</h2>

<x-alert type="success"/>
<x-alert type="info"/>

{{-- <div class="mb-5">
    <a href="{{ route('dashboard.users.create') }}" class="btn btn-sm btn-outline-primary">Create user</a>
</div> --}}
<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">

    <x-form.input name="national_id" placeholder="National ID" class="mx-2" :value="request('national_id')"/>
    
    <button class="btn btn-dark" class="mx-2">Fillter</button>

</form>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>National ID</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user) 
        <tr>
            <td></td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>            
            <td>{{ $user->email }}</td>            
            <td>{{ $user->national_id }}</td>            
            <td>
                <a href="{{ route('dashboard.users.show',$user->id) }}" class="btn btn-sm btn-outline-success">view</a>
            </td>

        </tr>
        @empty
        <td colspan="7">No users defined</td>      
        @endforelse            
        
    </tbody>
</table>
{{ $users->withQueryString()->links() }}

@endsection
