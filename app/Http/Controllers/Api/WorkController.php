<?php

namespace App\Http\Controllers\Api;

use App\Models\Page;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = $request->input('perpage') ?? 25;
        $response = Work::with('page')
            ->filter($request->all())
            ->orderBy('position', 'asc')
            ->where(['public' => true])
            ->paginate($perpage);

        return response()->json($response);
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
     * @param  \App\Models\Work  $works
     * @return \Illuminate\Http\Response
     */
    public function show(Work $works)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $works
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $works)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $works
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $works)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $works
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $works)
    {
        //
    }
}
