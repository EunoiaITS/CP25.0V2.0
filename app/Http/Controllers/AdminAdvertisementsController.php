<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Advertisement;

class AdminAdvertisementsController extends Controller
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
            'page_name' => 'advertisements',
            'page_title' => 'Advertisements',
            'advertisements' => Advertisement::all()
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
            'page_name' => 'advertisements_create',
            'page_title' => 'Create Advertisement'
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
        $input = $request->all();
        
        if($file = $request->file('image')) {
            $file_name      = time() . $file->getClientOriginalName();
            $input['image'] = $file_name;
            $file->move('public/uploads', $file_name);
        }

        Advertisement::create($input);

        $request->session()->flash('success_message', 'Advertisement created successfully!');

        return redirect('/admin/advertisements');
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
            'page_name' => 'advertisements_edit',
            'page_title' => 'Edit Advertisement',
            'advertisement' => Advertisement::findOrFail($id)
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
        $input = $request->except(['_method', '_token']);
        
        if($file = $request->file('image')) {
            // DELETE OLD IMAGE
            $image = Advertisement::findOrFail($id)->image;

            if($image)
                unlink(public_path() . '/uploads/' . $image);

            // UPLOAD NEW IMAGE
            $file_name      = time() . $file->getClientOriginalName();
            $input['image'] = $file_name;
            $file->move('public/uploads', $file_name);
        }

        Advertisement::where('id', $id)->update($input);

        $request->session()->flash('success_message', 'Advertisement updated successfully!');

        return redirect('/admin/advertisements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE EVENT IMAGE
        $image = Advertisement::findOrFail($id)->image;

        if($image)
            unlink(public_path() . '/uploads/' . $image);

        Advertisement::destroy($id);

        Session::flash('success_message', 'Advertisement deleted successfully!');

        return redirect('/admin/advertisements');
    }
}