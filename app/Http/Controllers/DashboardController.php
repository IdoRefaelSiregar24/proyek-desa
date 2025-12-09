<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Proyek;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        // Ambil semua proyek terbaru (limit 12)
        $dataProyek = Proyek::latest()->take(12)->get();

        // Ambil thumbnail utama untuk setiap proyek
        $thumbnails = Media::where('ref_table', 'proyek')
            ->whereIn('ref_id', $dataProyek->pluck('proyek_id'))
            ->where('sort_order', 0)
            ->get()
            ->keyBy(fn($item) => (int) $item->ref_id);

        return view("pages.index", compact('dataProyek', 'thumbnails'));
    }




    public function about()
    {
        return view("pages/about");
    }

    public function detailPengembang()
    {
        return view("pages/detail-pengembang");
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
    public function destroy(string $id)
    {
        //
    }
}
