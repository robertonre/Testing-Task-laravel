<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorStoreRequest;
use App\Models\Author;

class AuthorsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view all authors
        $authors = Author::paginate(10);
        return view('authors/index')->with('authors', $authors);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('authors/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorStoreRequest $request)
    {
        //
        $request->validated();

        try{
            $author = new Author();
            $author->first_name = $request->first_name;
            $author->last_name = $request->last_name;
            $author->email = $request->email;
            $author->phone = $request->phone;
            $author->save();

            return redirect()->back()->with('success', 'Author Created!');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Fail to Create!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
        dd($author);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
        return view('authors/show')->with('author',$author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorStoreRequest $request, Author $author)
    {
        //
        $request->validated();

        try{

            $author->first_name = $request->first_name;
            $author->last_name = $request->last_name;
            $author->email = $request->email? $request->email : '';
            $author->phone = $request->phone? $request->phone : '';
            $author->save();

            return redirect()->back()->with('success', 'Author Updated!');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Fail to Update!');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        // delete author and his books
        try{
            foreach ($author->books as $book){
                $book->delete();
            }
            $author->delete();


            return redirect()->back()->with('success', 'Author Deleted!');
        }catch (\Exception $exception){
            return redirect()->back()->with('error', 'Fail to Delete!');
        }

    }


    public function apiAuthors()
    {
        return json_decode(Author::all());
    }
}
