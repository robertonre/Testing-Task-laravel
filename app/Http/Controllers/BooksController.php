<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Author;
use App\Models\Book;
use http\Env\Request;
use Illuminate\Support\Facades\Storage;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view all books
        $books = Book::paginate(10);
        return view('books/index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $authors = Author::all();
        return view('books/create')->with('authors',$authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {
        // store book
        $request->validated();



        try{
            $book = new Book();
            $book->name = $request->name;
            $book->price = $request->price;
            $book->description = $request->description;
            if ($request->image) {
                $newImageName = $this->storeImage($request);
            }
            $book->image = $newImageName ? $newImageName : '';
            $book->author_id = $request->author_id;
            $book->save();

            return redirect()->back()->with('success', 'Book Created!');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Fail to Create!');
        }






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        $authors = Author::all();
        return view('books/show')->with(['book'=> $book,'authors'=>$authors]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookStoreRequest $request, Book $book)
    {
        //
        $request->validated();

        try{


            $book->name = $request->name;
            $book->price = $request->price;
            $book->description = $request->description;
            if ($request->image){

                $newImageName =$this->storeImage($request);
                $book->image = $newImageName;
            }
            $book->author_id = $request->author_id;
            $book->save();


            return redirect()->back()->with('success', 'Book Updated!');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Fail to Update!');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        try{
            $book->delete();

            return redirect()->back()->with('success', 'Book Deleted!');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Fail to Delete!');
        }

    }

    public function storeImage(BookStoreRequest $request)
    {
        $newImageName = time().'-'.$request->name . '.'. $request->image->getClientOriginalExtension();
        Storage::disk('local')->put("public/$newImageName", file_get_contents($request->image));
        return $newImageName;
    }
}
