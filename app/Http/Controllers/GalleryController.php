<?php
namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::orderBy('order')->orderByDesc('created_at')->get();
        return view('gallery.gallery', compact('items'));
    }
}