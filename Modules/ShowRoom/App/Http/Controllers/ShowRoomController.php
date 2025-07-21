<?php

namespace Modules\ShowRoom\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Modules\ShowRoom\App\Models\ShowRoom;
use Illuminate\Support\Facades\Storage;

class ShowRoomController extends Controller
{
    public function index()
    {
        $data = ShowRoom::all();
        return view('showroom::index', compact('data'));
    }

    public function create()
    {
        return view('showroom::create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'required|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('showroom/images', 'public');
                $imagePaths[] = $path;
            }
        }

        ShowRoom::create([
            'title' => $request->title,
            'description' => $request->description,
            'images' => implode(',', $imagePaths),
            'active' => $request->active,
        ]);

        return redirect()->route('admin.showroom.index')->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        $data = ShowRoom::findOrFail($id);
        return view('showroom::show', compact('data'));
    }

    public function edit($id)
    {
        $data = ShowRoom::findOrFail($id);
        return view('showroom::edit', compact('data'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'required|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = ShowRoom::findOrFail($id);
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('showroom/images', 'public');
                $imagePaths[] = $path;
            }
        }

        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'images' => count($imagePaths) ? implode(',', $imagePaths) : $data->images,
            'active' => $request->active,
        ]);

        return redirect()->route('admin.showroom.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $data = ShowRoom::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.showroom.index')->with('success', 'Data berhasil dihapus.');
    }
}
