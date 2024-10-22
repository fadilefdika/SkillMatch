<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // 1. lakukan validasi
        
        // 2. insert data ke database
        // 3. kembalikan uset kepada index
        // closure based transaction
        FacadesDB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons','public');
                $validated['icon'] = $iconPath;
            }

            $validated['slug']=Str::slug($validated['name']);

            $newCategory = Category::create($validated);
        });

        return redirect()->route('admin.categories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        FacadesDB::transaction(function () use ($request, $category) {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons','public');
                $validated['icon'] = $iconPath;
            }

            $validated['slug']=Str::slug($validated['name']);

            $category->update($validated);
        });

        return redirect()->route('admin.categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        dd($category);

        FacadesDB::beginTransaction();

        try{

            $category->delete();
            FacadesDB::commit();
            return redirect()->route('admin.categories.index');
        }catch(\Exception $e){
            FacadesDB::rollBack();
            return redirect()->route('admin.categories.index');
        }
    }
}