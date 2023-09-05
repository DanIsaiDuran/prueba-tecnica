<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::with('tasks')->get();
        return response()->json($companies);
    }
}
