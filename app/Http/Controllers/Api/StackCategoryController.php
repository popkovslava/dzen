<?php

namespace App\Http\Controllers\Api;

use App\Models\StackCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StackCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = $request->input('perpage') ?? 25;
        $response = StackCategory::with('stacks')->paginate($perpage);

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
     * @param  \App\Models\StackCategory  $stackCategory
     * @return \Illuminate\Http\Response
     */
    public function show(StackCategory $stackCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StackCategory  $stackCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(StackCategory $stackCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StackCategory  $stackCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StackCategory $stackCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StackCategory  $stackCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(StackCategory $stackCategory)
    {
        //
    }
}
