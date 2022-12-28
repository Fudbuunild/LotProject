<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CategoryService
{
    function showIndexPage() {
        $lots = Lot::all();

        return Response::view('category.index', compact('lots'));
    }

    function showCreatePage() {
        $categories = Category::all();

        return Response::view('category.create', compact('categories'));
    }

    function storeCategory($request) {
        DB::beginTransaction();

        try {
//            dd($request->title);

            Category::create([
                'title' => $request->title,
            ]);



            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->route('home');
    }

    function updateCategory($request) {
        DB::beginTransaction();

        try {
            $category = Category::update([
                'title' => $request->title,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->route('home');
    }

    function deleteCategory($request) {
        DB::beginTransaction();

        try {
            $lot = Category::findOrFail($request->id);

            $lot->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->route('home');
    }
}
