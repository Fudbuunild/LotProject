<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotRequest;
use App\Models\Category;
use App\Models\Lot;
use App\Services\LotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class LotController extends Controller
{
    public $lotService;

    public function __construct()
    {
        $this->lotService = new LotService();
    }

    public function index() {
       return $this->lotService->showIndexPage();
    }

    public function create() {
        return $this->lotService->showCreatePage();
    }

    public function edit($lot_id) {
        return $this->lotService->editLot($lot_id);
    }

    public function store(LotRequest $request) {
        return $this->lotService->storeLot($request);
    }

    public function update(LotRequest $request, $category_id) {
        return $this->lotService->updateLot($request, $category_id);
    }

    public function delete($lot_id) {
        return $this->lotService->deleteLot($lot_id);
    }

    public function filterData(LotRequest $request) {
        return $this->lotService->filter($request);
    }
}
