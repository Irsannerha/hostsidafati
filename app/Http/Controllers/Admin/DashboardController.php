<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahun;

class DashboardController extends Controller
{
    public function index()
    {   
        $tahun = Tahun::all();
        return view('admin.dashboard', compact('tahun'));
    }
}
