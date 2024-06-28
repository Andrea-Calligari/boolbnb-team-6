<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Promotion;
use App\Models\Service;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $services = Service::all();
        $promotions = Promotion::all();

        return response()->json(compact('categories', 'services', 'promotions'));
    }
}
