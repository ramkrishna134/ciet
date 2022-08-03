<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audio;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audios = Audio::all();
        return view('admin.audio.index', compact('audios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view('admin.audio.edit', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAudioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' =>'required',
            'book_id' =>'required',
            'file' =>'required',
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
                $audio = new Audio($data);
                $file = $data['file'];
                $audio->file = parse_url($file, PHP_URL_PATH);
                $audio->save();
                return redirect(route('audio.index'))->with('status',"Audio added successfully");
            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio)
    {
        $books = Book::all();
        return view('admin.audio.edit', compact('audio', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAudioRequest  $request
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audio $audio)
    {
        $rules = [
            'name' =>'required',
            'book_id' =>'required',
            'file' =>'required',
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
                $audio->fill($data);
                $file = $data['file'];
                $audio->file = parse_url($file, PHP_URL_PATH);
                $audio->save();
                return back()->with('status',"Audio update successfully");
            }
            catch(Exception $e){  
                return back()->with('failed',"Operation failed");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio)
    {
        $audio->delete();
        return back()->with('status',"Audio file Deleted successfully");
    }

    public function audios(Request $request){


        $query = Book::query()->where('status', 1);
        $params = $this->validate($request, [
            'class' => 'nullable',
            'subject' => 'nullable',
            'lang' => 'nullable',
        ]);

        if( !empty( $params['class'] ) ){
            $query->where('class', $params['class']);
        }

        if( !empty( $params['subject'] ) ){
            $query->where('subject', $params['subject']);
        }

        if( !empty( $params['lang'] ) ){
            $query->where('lang', $params['lang']);
        }
        $books = $query->paginate();

        return view('web.audio')->with([
            'books' => $books,
            'params' => $params
        ]);
    }

    public function audio_book(Book $book){

        $book = Book::query()->where('id', $book->id)->first();
        $audios = Audio::query()->where('book_id', $book->id)->get();
        return view('web.audio-single', compact('book', 'audios'));
    }
}
