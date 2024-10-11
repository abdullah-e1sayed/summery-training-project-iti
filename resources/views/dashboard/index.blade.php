@extends('layouts.dashboard')

@section('content')
<div class="row">

  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><a href="{{ route('dashboard.users.index') }}">Users</a></h5>                  
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><a href="{{ route('dashboard.books.index') }}">Books</a></h5>                  
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><a href="{{ route('dashboard.borrowed-books') }}">Borrowed Books</a></h5>                  
      </div>
    </div>
  </div>

    

  </div>
  @endsection