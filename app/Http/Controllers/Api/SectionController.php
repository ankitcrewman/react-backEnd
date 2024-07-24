<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{




    public function show()
    {
        $sections = Section::all();
        return response()->json($sections);
    }




}

