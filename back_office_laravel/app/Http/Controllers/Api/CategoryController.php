<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
      
        return response()->json(compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $category = Category::create($form_data);

        return response()->json(
            compact('category')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where('id', $id)->first();
        //dump($category);

        return response()->json(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //prendere i dati del form
        $form_data = $request->all();

        $category = Category::where('id', $form_data['id'])->first();

        $category->update($form_data);

        return response()->json([
            'msg'=>'categoria aggiornata'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
