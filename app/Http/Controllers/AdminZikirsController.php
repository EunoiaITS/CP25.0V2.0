<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Content_detail;
use App\Content;

class AdminZikirsController extends Controller
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
            'page_name' => 'zikirs',
            'page_title' => 'Zikir',
            'zikirs' => Content::where('type', 'zikir')->get()
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
            'page_name' => 'zikirs_create',
            'page_title' => 'Create Zikir'
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
            'type' => 'zikir',
            'title' => $request->title
        ];

        $content = Content::create($content_input);

        $keys = [];

        foreach($keys as $key)
            $content->details()->create(['key' => $key, 'value' => $request->$key]);

        $request->session()->flash('success_message', 'Zikir created successfully!');

        return redirect('/admin/zikirs');
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
            'page_name' => 'zikirs_edit',
            'page_title' => 'Edit Zikir',
            'zikir' => Content::findOrFail($id)
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

        $keys = [];

        foreach($keys as $key)
            $content->details()->where('key', $key)->update(['value' => $request->$key]);

        $request->session()->flash('success_message', 'Zikir updated successfully!');

        return redirect('/admin/zikirs');
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

        Session::flash('success_message', 'Zikir deleted successfully!');

        return redirect('/admin/zikirs');
    }
}