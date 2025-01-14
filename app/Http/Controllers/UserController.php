<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BorrowedBook;

class UserController extends Controller
{
    
 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request= request();       
        $users=User::filter($request->query())->where('type','student')->paginate();
        return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // dd($user);
        $borrowedBooks=BorrowedBook::where('user_id',"$user->id")->paginate();
        return view('dashboard.users.show',compact('user','borrowedBooks'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
