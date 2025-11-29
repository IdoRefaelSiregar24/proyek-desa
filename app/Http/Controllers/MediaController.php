<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function upload(Request $request)
    {
        $refTable = $request->ref_table;
        $refId = $request->ref_id;

        // --- Upload thumbnail ---
        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail');
            $thumbPath = $thumb->store('media', 'public');

            Media::create([
                'ref_table' => $refTable,
                'ref_id' => $refId,
                'file_name' => $thumbPath,
                'mime_type' => $thumb->getClientMimeType(),
                'sort_order' => 0, // thumbnail selalu urutan 0
            ]);
        }

        // --- Upload multiple files ---
        if ($request->hasFile('media_files')) {
            foreach ($request->file('media_files') as $index => $file) {
                $path = $file->store('media', 'public');

                Media::create([
                    'ref_table' => $refTable,
                    'ref_id' => $refId,
                    'file_name' => $path,
                    'mime_type' => $file->getClientMimeType(),
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return back()->with('success', 'Files uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        // Hapus file dari storage
        if (\Storage::disk('public')->exists($media->file_name)) {
            \Storage::disk('public')->delete($media->file_name);
        }

        // Hapus record dari database
        $media->delete();

        return back()->with('success', 'Media berhasil dihapus!');
    }

}
