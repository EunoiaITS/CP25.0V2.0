<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Content_detail;
use App\Content;
use App\Surah;

class AdminQuransController extends Controller
{
    public function __construct() {
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_data = [
            'page_name' => 'qurans',
            'page_title' => 'Quran',
            'qurans' => Content::where('type', 'quran')->get()
        ];

        return view(Auth::user()->role . '/' . $page_data['page_name'], compact('page_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_data = [
            'page_name' => 'qurans_create',
            'page_title' => 'Create Quran Ayat',
            'surahs' => Surah::all()
        ];

        return view(Auth::user()->role . '/' . $page_data['page_name'], compact('page_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content_input = [
            'type' => 'quran',
            'trans_arabic' => $request->trans_arabic,
            'trans_eng' => $request->trans_eng,
            'trans_malay' => $request->trans_malay
        ];

        $content = Content::create($content_input);

        $keys = ['verse_no', 'surah_id'];

        foreach($keys as $key)
            $content->details()->create(['key' => $key, 'value' => $request->$key]);

        $request->session()->flash('success_message', 'Quran ayat created successfully!');

        return redirect('/admin/qurans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_data = [
            'page_name' => 'qurans_edit',
            'page_title' => 'Edit Quran Ayat',
            'surahs' => Surah::all(),
            'quran' => Content::findOrFail($id)
        ];

        return view(Auth::user()->role . '/' . $page_data['page_name'], compact('page_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content_input = [
            'trans_arabic' => $request->trans_arabic,
            'trans_eng' => $request->trans_eng,
            'trans_malay' => $request->trans_malay
        ];

        $content = Content::findOrFail($id);
        $content->update($content_input);

        $keys = ['verse_no', 'surah_id'];

        foreach($keys as $key)
            $content->details()->where('key', $key)->update(['value' => $request->$key]);

        $request->session()->flash('success_message', 'Quran ayat updated successfully!');

        return redirect('/admin/qurans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::destroy($id);

        Session::flash('success_message', 'Quran ayat deleted successfully!');

        return redirect('/admin/qurans');
    }
}