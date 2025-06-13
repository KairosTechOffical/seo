<?php

namespace KairosTechOffical\Seo\Http\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use KairosTechOffical\Seo\Models\Seo;

class SeoController extends Controller
{
    public function index()
    {
        $seos = Seo::latest()->paginate(10);
        return view('seo.index', compact('seos'));
    }

    public function create()
    {
        return view('seo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required|string|unique:seos,page',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|url',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|url',
        ]);

        try {
            Seo::create($request->all());
            return redirect()->route('seo.index')->with('success', 'SEO meta created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create SEO meta: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $seos = Seo::findOrFail($id);
        return view('seo.create', compact('seos'));
    }

    public function update(Request $request, $id)
    {
        $seo = Seo::findOrFail($id);

        $request->validate([
            'page' => 'required|string|unique:seos,page,' . $seo->id,
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|url',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|url',
        ]);

        try {
            $seo->update($request->all());
            return redirect()->route('seo.index')->with('success', 'SEO meta updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update SEO meta: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Seo::findOrFail($id)->delete();
            return redirect()->route('seo.index')->with('success', 'SEO meta deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete SEO meta: ' . $e->getMessage());
        }
    }
}
