<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Content_detail;
use App\Content;

class AdminFoodsController extends Controller
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
            'page_name' => 'foods',
            'page_title' => 'Prophetic Food',
            'foods' => Content::where('type', 'food')->get()
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
            'page_name' => 'foods_create',
            'page_title' => 'Create Prophetic Food'
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
            'type' => 'food',
            'title' => $request->title,
            'trans_arabic' => $request->trans_arabic,
            'trans_eng' => $request->trans_eng,
            'trans_malay' => $request->trans_malay
        ];

        $content = Content::create($content_input);

        $keys = ['def_title', 'definition', 'desc_title', 'description'];

        foreach($keys as $key)
            $content->details()->create(['key' => $key, 'value' => $request->$key]);

        if($file = $request->file('image')) {
            $file_name = time() . $file->getClientOriginalName();
            $content->details()->create(['key' => 'image', 'value' => $file_name]);
            $file->move('public/uploads', $file_name);
        } else
            $content->details()->create(['key' => 'image']);

        $request->session()->flash('success_message', 'Prophetic Food created successfully!');

        return redirect('/admin/foods');
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
            'page_name' => 'foods_edit',
            'page_title' => 'Edit Prophetic Food',
            'food' => Content::findOrFail($id)
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
            'title' => $request->title,
            'trans_arabic' => $request->trans_arabic,
            'trans_eng' => $request->trans_eng,
            'trans_malay' => $request->trans_malay
        ];

        $content = Content::findOrFail($id);
        $content->update($content_input);

        $keys = ['def_title', 'definition', 'desc_title', 'description'];

        foreach($keys as $key)
            $content->details()->where('key', $key)->update(['value' => $request->$key]);

        if($file = $request->file('image')) {
            // DELETE OLD IMAGE
            $image = $content->details()->where('key', 'image')->value('value');

            if($image)
                unlink(public_path() . '/uploads/' . $image);

            // UPLOAD NEW IMAGE
            $file_name = time() . $file->getClientOriginalName();
            $content->details()->where('key', 'image')->update(['value' => $file_name]);
            $file->move('public/uploads', $file_name);
        }

        $request->session()->flash('success_message', 'Prophetic Food updated successfully!');

        return redirect('/admin/foods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Content::findOrFail($id)->details()->where('key', 'image')->value('value');

        if($image)
            unlink(public_path() . '/uploads/' . $image);

        Content::destroy($id);

        Session::flash('success_message', 'Prophetic Food deleted successfully!');

        return redirect('/admin/foods');
    }
}