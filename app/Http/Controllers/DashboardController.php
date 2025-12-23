<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // 1️⃣ Ambil 12 proyek terbaru
        $dataProyek = Proyek::latest()->take(12)->get();

        // 2️⃣ Statistik utama (MULTIPLE ROW FUNCTION)
        $totalProyek = Proyek::count();
        $totalAnggaran = Proyek::sum('anggaran');
        $rataAnggaran = Proyek::avg('anggaran');
        $anggaranMax = Proyek::max('anggaran');
        $anggaranMin = Proyek::min('anggaran');

        // 3️⃣ Proyek per tahun
        $proyekPerTahun = Proyek::select(
            'tahun',
            DB::raw('count(*) as total')
        )
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->get();

        // 4️⃣ Proyek per sumber dana
        $proyekPerSumberDana = Proyek::select(
            'sumber_dana',
            DB::raw('count(*) as total')
        )
            ->groupBy('sumber_dana')
            ->get();

        // 5️⃣ Ambil thumbnail utama untuk setiap proyek
        $thumbnails = Media::where('ref_table', 'proyek')
            ->whereIn('ref_id', $dataProyek->pluck('proyek_id'))
            ->where('sort_order', 0)
            ->get()
            ->keyBy(fn($item) => (int) $item->ref_id);

        return view('pages.index', compact(
            'dataProyek',
            'thumbnails',
            'totalProyek',
            'totalAnggaran',
            'rataAnggaran',
            'anggaranMax',
            'anggaranMin',
            'proyekPerTahun',
            'proyekPerSumberDana'
        ));
    }


    public function contact()
    {
        return view("pages/contact");
    }
    public function about()
    {
        return view("pages/about");
    }

    public function developer()
    {
        return view("pages/developer");
    }

    public function services()
    {
        return view("pages/services");
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
