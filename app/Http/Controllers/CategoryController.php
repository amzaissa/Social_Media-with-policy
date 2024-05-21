<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryStoreRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = CategoryResource::collection(Category::all());
        return  response()->json($category);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoryStoreRequest $request)
    {
      $validated= $request->validated();
       Category::create([
        'name'=>$validated['name']
       ]);
       return response()->json('category added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return response()->json(new CategoryResource($category));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryStoreRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update([
            'name' => $validated['name']
        ]);
        return response()->json('category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
       $category->delete();
       return response()->json('category deleted successfully');
    }
}
