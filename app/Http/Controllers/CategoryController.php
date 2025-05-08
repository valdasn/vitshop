<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function __construct(){
        session_start();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $_SESSION['chain'] = [];
        $categories = Category::whereNull('category_id' )->get();
        $chain = [];
        $chain[]= $categories; 
         return view('categories.index',['categories'=>$categories, 'chain'=>$_SESSION['chain']]);
    }

    public function map(Category $category)
    {
        $_SESSION['chain'][] = $category;
        $tmpSs = [];

        foreach ($_SESSION['chain'] as $ssCat){
            $tmpSs[] = $ssCat;
            if($ssCat->id == $category->id){
                break;
            }
        }
        $_SESSION['chain'] = $tmpSs;
        $categories = Category::where('category_id','=',$category->id)->get();
        return view('categories.index',["categories"=>$categories,'chain'=>$_SESSION['chain']]);
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
    public function store(StoreCategoryRequest $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
