<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PythonController extends Controller
{
    public function index(){
        $detek = exec('python python/feature_extraction_gray_level_co_occurrence_matrix_(glcm)_with_python.py');
        return $detek;
    }
}
