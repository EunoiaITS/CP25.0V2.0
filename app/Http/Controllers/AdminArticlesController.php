<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Content_detail;
use App\Content;

class AdminArticlesController extends Controller
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
            'page_name' => 'articles',
            'page_title' => 'Scientific Articles',
            'articles' => Content::where('type', 'article')->get()
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
            'page_name' => 'articles_create',
            'page_title' => 'Create Scientific Article'
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
            'type' => 'article',
            'title' => $request->title
        ];

        $content = Content::create($content_input);

        $keys = ['author', 'url', 'disease_1', 'disease_2', 'abstract', 'concept'];

        foreach($keys as $key)
            $content->details()->create(['key' => $key, 'value' => $request->$key]);

        $request->session()->flash('success_message', 'Scientific Article created successfully!');

        return redirect('/admin/articles');
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
            'page_name' => 'articles_edit',
            'page_title' => 'Edit Scientific Article',
            'article' => Content::findOrFail($id)
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
            'title' => $request->title
        ];

        $content = Content::findOrFail($id);
        $content->update($content_input);

        $keys = ['author', 'url', 'disease_1', 'disease_2', 'abstract', 'concept'];

        foreach($keys as $key)
            $content->details()->where('key', $key)->update(['value' => $request->$key]);

        $request->session()->flash('success_message', 'Scientific Article updated successfully!');

        return redirect('/admin/articles');
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

        Session::flash('success_message', 'Scientific Article deleted successfully!');

        return redirect('/admin/articles');
    }
}