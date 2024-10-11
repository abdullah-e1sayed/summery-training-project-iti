<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request= request();
        if($request->user()->type == 'admin'){
            $borrowedBooks=BorrowedBook::paginate();
            return view('dashboard.borrowed-books',compact('borrowedBooks'));
        }
        $borrowedBooks=BorrowedBook::where('user_id',"{$request->user()->id}")->paginate();
        return view('front.borrowed-books',compact('borrowedBooks'));
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
        $request->validate(BorrowedBook::rules());
        $request->merge([
            'user_id'=>$request->user()->id,
        ]);
        $book = Book::find($request->book_id);
        $book->update([
            'status'=>'borrowed',
        ]);
        BorrowedBook::create($request->all());
        return redirect()->route('front.borrowed-books.index')->with([
            'success'=>'Borrowed Book success !'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BorrowedBook $borrowedBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BorrowedBook $borrowedBook)
    {
        // dd($request->user()->id);
        if(!$request->user()->id  == $borrowedBook->user_id){
            abort(403);
        }
        $borrowedBook->update([
            'returned_at' =>Carbon::now() , 
        ]);
        $book = Book::find($borrowedBook->book_id);
        $book->update([
            'status'=>'on the shelf',
        ]);
        return redirect()->route('front.borrowed-books.index')->with([
            'success'=>'Book returned to the shelf success !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BorrowedBook $borrowedBook)
    {
        //
    }
}
