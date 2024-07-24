<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageText;
use Illuminate\Support\Facades\Storage;
use App\Helpers\FileHelper;

class ImageTextController extends Controller
{
    public function create()
    {
        $imageText = ImageText::first();
        return view('admin.banner', compact('imageText'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'heading' => 'required|string|max:255',
            'sub_head' => 'required|string|max:255',
        ]);

        // Store the image
        $imagePath = FileHelper::uploadFile($request->file('image'), 'images');

        // Check if there's already a record in the table
        $imageText = ImageText::first();

        if ($imageText) {
            // Update the existing record
            $imageText->filename = $imagePath;
            $imageText->heading = $request->heading;
            $imageText->sub_head = $request->sub_head;
            $imageText->save();
        } else {
            // Create a new record
            $imageText = new ImageText();
            $imageText->filename = $imagePath;
            $imageText->heading = $request->heading;
            $imageText->sub_head = $request->sub_head;
            $imageText->save();
        }

        return redirect()->back()->with('success', 'File uploaded successfully');
    }
}
