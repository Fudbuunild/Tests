<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Book;

class BooksController extends Controller
{
    public function store()
    {
        $book = Book::create($this->validateRequest());

        return redirect($book->path());
    }

    public function updated(Book $book)
    {
        $book->update($this->validateRequest());

        return redirect($book->path());
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author_id' => 'required',
        ]);
    }
}
