<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.book.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' =>'required',
            'cover' =>'required',
            'lang' =>'required',
            'subject' =>'required',
            'class' =>'required',
            'status' => 'required', 
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");     
        }
        else{
            $data = $request->input();
            try{
                $book = new Book($data);
                $cover = $data['cover'];
                $book->cover = parse_url($cover, PHP_URL_PATH);
                $book->save();
                return redirect(route('book.index'))->with('status',"Book added successfully");
            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
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
        return view('admin.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'name' =>'required',
            'cover' =>'required',
            'lang' =>'required',
            'subject' =>'required',
            'class' =>'required',
            'status' => 'required', 
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            dd($validator);
            return back()
                ->withInput()
                ->withErrors($validator)->with('error',"Please check the field below *");     
        }
        else{
            $data = $request->input();
            try{
                $book->fill($data);
                $cover = $data['cover'];
                $book->cover = parse_url($cover, PHP_URL_PATH);
                $book->save();
                return back()->with('status',"Book updated successfully");

            }
            catch(Exception $e){
                return back()->with('failed',"Operation failed");
            }
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
        
        $audios = Audio::query()->where('book_id', $book->id)->get();
        foreach($audios as $audio){
            $audio->delete();
        }
        $book->delete();
        return back()->with('status',"Book Deleted successfully");
    }
}
