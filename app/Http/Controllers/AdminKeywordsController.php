<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Keyword;
use App\Link;

class AdminKeywordsController extends Controller
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
            'page_name' => 'keywords',
            'page_title' => 'Keywords',
            'keywords' => Keyword::all()
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
            'page_name' => 'keywords_create',
            'page_title' => 'Create Keyword'
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
        Keyword::create($request->all());

        $request->session()->flash('success_message', 'Keyword created successfully!');

        return redirect('/admin/keywords');
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
            'page_name' => 'keywords_edit',
            'page_title' => 'Edit Keyword',
            'keyword' => Keyword::findOrFail($id)
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
        Keyword::where('id', $id)->update($request->except(['_method', '_token']));

        $request->session()->flash('success_message', 'Keyword updated successfully!');

        return redirect('/admin/keywords');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keyword::destroy($id);

        Session::flash('success_message', 'Keyword deleted successfully!');

        return redirect('/admin/keywords');
    }

    public function manage($id) {
        $keyword            = Keyword::findOrFail($id);
        $quran_links        = $keyword->links()->where('content_type', 'quran')->get();
        $hadith_links       = $keyword->links()->where('content_type', 'hadith')->get();
        $manuscript_links   = $keyword->links()->where('content_type', 'manuscript')->get();
        $article_links      = $keyword->links()->where('content_type', 'article')->get();

        $page_data = [
            'page_name' => 'keywords_manage',
            'page_title' => 'Manage Keyword : ' . Keyword::findOrFail($id)->name,
            'keyword_id' => $id,
            'quran_links' => $quran_links,
            'hadith_links' => $hadith_links,
            'manuscript_links' => $manuscript_links,
            'article_links' => $article_links
        ];

        return view(Auth::user()->role . '/' . $page_data['page_name'], compact('page_data'));
    }

    public function link(Request $request) {
        Link::create($request->all());
        
        Session::flash('success_message', 'Link created successfully!');

        return redirect()->back();
    }

    public function unlink($id) {
        Link::destroy($id);

        Session::flash('success_message', 'Unlinked successfully!');

        return redirect()->back();
    }
}