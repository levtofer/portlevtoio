<?php
namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    public function index()
    {
        $notes = Guestbook::latest()->paginate(24);
        return view('guestbook.guestbook', compact('notes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'nullable|string|max:100',
            'message' => 'required|string|max:500',
        ]);

        Guestbook::create($validated);

        return redirect()->route('guestbook')->with('success', 'note left (◠w◠)');
    }
}