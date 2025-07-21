<?php

namespace Modules\Partners\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\Partners\App\Models\Partners;

class PartnersController extends Controller
{
    public function index()
    {
        $partners = Partners::latest()->get();
        return view('partners::index', compact('partners'));
    }

    public function create()
    {
        return view('partners::create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'website_url' => 'required|url',
            'thumb_image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ]);

        $imagePath = $request->file('thumb_image')->store('partners', 'public');

        Partners::create([
            'website_url' => $request->website_url,
            'thumb_image' => $imagePath,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully.');
    }

    public function show($id)
    {
        $partner = Partners::findOrFail($id);
        return view('partners::show', compact('partner'));
    }

    public function edit($id)
    {
        $partner = Partners::findOrFail($id);
        return view('partners::edit', compact('partner'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $partner = Partners::findOrFail($id);

        $request->validate([
            'website_url' => 'required|url',
            'thumb_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
        ]);

        $data = ['website_url' => $request->website_url];

        if ($request->hasFile('thumb_image')) {
            // Delete old image if exists
            if ($partner->thumb_image && Storage::disk('public')->exists($partner->thumb_image)) {
                Storage::disk('public')->delete($partner->thumb_image);
            }

            $data['thumb_image'] = $request->file('thumb_image')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $partner = Partners::findOrFail($id);

        // Delete image
        if ($partner->thumb_image && Storage::disk('public')->exists($partner->thumb_image)) {
            Storage::disk('public')->delete($partner->thumb_image);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }
}
