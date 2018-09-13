<?php

namespace App\Http\Controllers;

use App\Models\ClientsSection;
use App\Models\Config;
use App\Models\Page;
use App\Models\Work;
use App\Models\Stack;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $this->dzensoft_data['page'] = $page;
        $this->dzensoft_data['works'] = Work::with('page')
            ->orderBy('position', 'asc')
            ->where(['public' => true])
            ->get();
        $this->dzensoft_data['stacks'] = Stack::orderBy('position', 'asc')->where(['public' => true])->get();
        $this->dzensoft_data['config'] = Config::all();

        //main page
        if ($page->slug == null) {
            $page_main = Page::where(['main_page' => true, 'public' => true])->get()->first();
            if ($page_main != null) {
                $this->dzensoft_data['page'] = $page_main;
                $page = $page_main;
            } else {
                abort(404);
            }
        }

        if ($page->public != true) {
            abort(404);
        }

        $return = $this->dzensoft_data;

        if ($this->dzensoft_data['page']->work) {
            return view('pages.single-product', $this->dzensoft_data)->render();
        }
        //Override base template
        if (view()->exists('pages.static.' . $page->slug)) {
            return view('pages.static.' . $page->slug, $this->dzensoft_data)->render();
        }

        return view('pages.page', $this->dzensoft_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
