<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('status', 1)->get();
        return view('books.index', compact('books'));
    }


    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
             'title' => 'required',
            'author' => 'required',
            'year_published' => 'required|integer'
        ]);

        Book::create($request->only([
            'title',
            'author',
             'year_published'
        ]));

        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
         $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year_published' => 'required|integer'
         ]);

        $book = Book::findOrFail($id);

        $book->update($request->only([
            'title',
            'author',
            'year_published'
        ]));

        return redirect()->route('books.index');
    }

     public function destroy($id)
     {
        Book::findOrFail($id)
            ->update(['status' => 0]);

        return redirect()->route('books.index');
     }
}