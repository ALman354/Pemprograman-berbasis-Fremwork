<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class books extends Controller
{
    public function index(){
        $books = book::all();
        return view('books.index',['books' => $books]);
    }
    
    public function store(Request $request)
{
        book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'publisher' => $request->input('publisher'),
            'stock' => $request->input('stock'),
        ]);

    return redirect('/books')->with('success', 'Book created successfully.');
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => ['required', 'string',"email", 'max:255'],
        'author' => ['required', 'string', 'max:255'],
        'publisher' => ['required', 'string', 'max:255'],
        'stock' => ['required', 'integer', 'min:0'],
    ]);

    $book = book::findOrFail($id);
    $book->update($validated);

    return redirect('/books')->with('success', 'Book updated successfully.');
}

public function destroy($id)
{
    $book = book::findOrFail($id);
    $book->delete();

    return redirect('/books')->with('success', 'Book deleted successfully.');
}
public function edit($id)
{
    $book = book::findOrFail($id);
    return view('books.edit', ['book' => $book]);
}
}