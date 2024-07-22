<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImageText; // Assuming your model is named ImageText
use Illuminate\Http\Request;

class ImageTextController extends Controller
{
    public function index()
    {
        $imageTexts = ImageText::first();
        $imageTexts->filename = "http://localhost/node-js-project/react-back-end/storage/app/public/".$imageTexts->filename;
        return response()->json($imageTexts);
    }
}
