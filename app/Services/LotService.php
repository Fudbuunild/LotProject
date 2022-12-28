<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class LotService
{
    function showIndexPage() {
        $lots = Lot::with('categories')->get();
        $categories = Category::all();

        return Response::view('lots.index', compact('lots', 'categories'));
    }

    function showCreatePage() {
        $categories = Category::all();

        return Response::view('lots.create', compact('categories'));
    }

    function storeLot($request) {

        DB::beginTransaction();

        try {
            $lot = new Lot;
            $lot->title = $request->title;
            $lot->description = $request->description;
            $lot->save();

            $category = new Category();
            $category->title = Category::findOrFail($request->category)['title'];
            $category->lot_id = $lot->id;

            $lot->categories()->save($category);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->route('home')->with('message', 'Lot Created');
    }

    function editLot($lot_id) {

        $lot = Lot::with('categories')->where('id', '=', $lot_id)->first();
        $categories = $lot->categories;

        return Response::view('lots.edit', compact('lot', 'categories'));
    }

    function updateLot($request, $category_id) {
        DB::beginTransaction();

        try {
            $lot = Category::findOrFail($category_id)->lot()->where('id', '=', $request->id)->first();
            $lot->title = $request->title;
            $lot->description = $request->description;

            $lot->update();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->route('home')->with('message', 'Lot Updated');
    }

    function deleteLot($lot_id) {
        DB::beginTransaction();

        try {
            $lot = Lot::findOrFail($lot_id);

            $lot->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }

        return redirect()->route('home')->with('message', 'Lot Deleted');
    }

    function filter($lot_id) {
        Lot::whereHas('categories', function($q) use($lot_id) {
            $q->where('lot_id', $lot_id);
        })->get();

        return Response::view('lot.index');
    }
}
