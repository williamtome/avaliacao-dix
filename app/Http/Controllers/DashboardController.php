<?php

namespace App\Http\Controllers;

use App\Models\BlingProduct;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $existsProducts = BlingProduct::exists();

        return view('dashboard', compact('existsProducts'));
    }
}
