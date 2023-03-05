<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Book;

class BooksController extends Controller
{
    public function store(StoreRequest $request) {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        Book::create($data);
    }

    public function updated(Book $book) {
        $book->update($this->validateRequest());
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
