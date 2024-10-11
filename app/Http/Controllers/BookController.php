<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request= request();       
        $books=Book::filter($request->query())->paginate();
        return view('dashboard.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book= new Book;
        return view('dashboard.books.create',compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Book::rules());
        Book::create($request->all());
        return redirect()->route('dashboard.books.index')->with([
            'success'=>'Book Added !'
        ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        if($book->status =="borrowed"){
            abort(404);
        }
        return view('front.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());

        return redirect()->route('dashboard.books.index')->with([
            'success'=>'Book Updated !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('dashboard.books.index')
        ->with(['success'=>'Book deleted success !']);
    }
}
