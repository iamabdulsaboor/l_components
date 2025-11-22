<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryItemController extends Controller
{
    // Show all gallery items
    public function index()
    {
        $galleryItems = GalleryItem::latest()->get();
        return view('gallery.index', compact('galleryItems'));
    }

    // Show create form
    public function create()
    {
        return view('gallery.create');
    }

    // Store gallery item
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'size' => 'nullable|string|max:50',
            'crop' => 'nullable|boolean',
            'show_description' => 'nullable|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $data['crop'] = $request->has('crop') ? true : false;
        $data['show_description'] = $request->has('show_description') ? true : false;

        GalleryItem::create($data);

        return redirect()->route('gallery.index')->with('success', 'Gallery item created successfully.');
    }

    // Show edit form
    public function edit(GalleryItem $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    // Update gallery item
    public function update(Request $request, GalleryItem $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'size' => 'nullable|string|max:50',
            'crop' => 'nullable|boolean',
            'show_description' => 'nullable|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $data['crop'] = $request->has('crop') ? true : false;
        $data['show_description'] = $request->has('show_description') ? true : false;

        $gallery->update($data);

        return redirect()->route('gallery.index')->with('success', 'Gallery item updated successfully.');
    }

    // Delete gallery item
    public function destroy(GalleryItem $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Gallery item deleted successfully.');
    }
}
