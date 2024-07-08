<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lulus;
use App\Models\Prodi;
use App\Models\Tahun;
use App\Exports\LulusExport;
use App\Imports\LulusImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LulusController extends Controller
{
    public function index()
    {
        $lulus = Lulus::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();
    
        // Menghitung total tiap bulan dan jumlah total per ts_id
        $totals = Lulus::select(DB::raw('ts_id,
            SUM(januari) as januari,
            SUM(februari) as februari,
            SUM(maret) as maret,
            SUM(april) as april,
            SUM(mei) as mei,
            SUM(juni) as juni,
            SUM(juli) as juli,
            SUM(agustus) as agustus,
            SUM(september) as september,
            SUM(oktober) as oktober,
            SUM(november) as november,
            SUM(desember) as desember'))
            ->groupBy('ts_id')
            ->get();
    
        // Menghitung jumlah total per ts_id
        $totals = $totals->map(function ($item) {
            $item->jumlahTotal = $item->januari + $item->februari + $item->maret + $item->april + $item->mei + $item->juni + $item->juli + $item->agustus + $item->september + $item->oktober + $item->november + $item->desember;
            return $item;
        });
    
        $groupedLulus = $lulus->groupBy('ts_id');
    
        return view('admin.lulus.index', compact('lulus', 'prodi', 'tahun', 'totals', 'groupedLulus'));
    }
    
    public function create(Request $request)
    {
        if ($request->tahun_semester_id == null) {
            $prodi = Prodi::all();
        } else {
            $tahun_filter = Lulus::select('prodi_id')->where('ts_id', $request->tahun_semester_id)->get();
            $prodi = Prodi::whereNotIn('id', $tahun_filter)->get();
        }
        $tahun = Tahun::all();
        if ($request->tahun_semester_id == null) {
            return view('admin.lulus.create', compact('prodi', 'tahun'));
        } else {
            return response()->json($prodi);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'januari' => 'nullable',
            'februari' => 'nullable',
            'maret' => 'nullable',
            'april' => 'nullable',
            'mei' => 'nullable',
            'juni' => 'nullable',
            'juli' => 'nullable',
            'agustus' => 'nullable',
            'september' => 'nullable',
            'oktober' => 'nullable',
            'november' => 'nullable',
            'desember' => 'nullable',
        ]);

        $lulus = new Lulus;
        $lulus->prodi_id = $request->prodi_id;
        $lulus->ts_id = $request->ts_id;
        $lulus->januari = $request->januari;
        $lulus->februari = $request->februari;
        $lulus->maret = $request->maret;
        $lulus->april = $request->april;
        $lulus->mei = $request->mei;
        $lulus->juni = $request->juni;
        $lulus->juli = $request->juli;
        $lulus->agustus = $request->agustus;
        $lulus->september = $request->september;
        $lulus->oktober = $request->oktober;
        $lulus->november = $request->november;
        $lulus->desember = $request->desember;
        $lulus->save();

        if(Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.lulus.index')->with('success_create_data', 'Data berhasil ditambahkan');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.lulus.index')->with('success_create_data', 'Data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $lulus = Lulus::find($id);
        $prodi = Prodi::all();
        return view('admin.rekap-lulus.show', compact('lulus', 'prodi'));
    }

    public function edit($id)
    {
        $lulus = Lulus::findOrFail($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        // dd($rekaplulus);
        return view('admin.lulus.edit', compact('lulus', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'januari' => 'nullable',
            'februari' => 'nullable',
            'maret' => 'nullable',
            'april' => 'nullable',
            'mei' => 'nullable',
            'juni' => 'nullable',
            'juli' => 'nullable',
            'agustus' => 'nullable',
            'september' => 'nullable',
            'oktober' => 'nullable',
            'november' => 'nullable',
            'desember' => 'nullable',
        ]);

        $lulus = Lulus::findOrFail($id);
        $lulus->prodi_id = $request->prodi_id;
        $lulus->ts_id = $request->ts_id;
        $lulus->januari = $request->januari;
        $lulus->februari = $request->februari;
        $lulus->maret = $request->maret;
        $lulus->april = $request->april;
        $lulus->mei = $request->mei;
        $lulus->juni = $request->juni;
        $lulus->juli = $request->juli;
        $lulus->agustus = $request->agustus;
        $lulus->september = $request->september;
        $lulus->oktober = $request->oktober;
        $lulus->november = $request->november;
        $lulus->desember = $request->desember;
        $lulus->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.lulus.index')->with('success_update_data', 'Data berhasil diubah');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.lulus.index')->with('success_update_data', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $lulus = Lulus::findOrFail($id);
        $lulus->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.lulus.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.lulus.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }

    public function getChartDataLulus()
{
    $data = Lulus::with('prodi')->get();

    $labels = $data->map(function($item) {
        return $item->prodi->prodi;
    });

    $datasets = [];
    $months = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

    foreach ($months as $month) {
        $datasets[] = [
            'label' => ucfirst($month),
            'data' => $data->pluck($month)->map(function($value) {
                return (int)$value; 
            }),
            'backgroundColor' => '#' . substr(md5(rand()), 0, 6), 
            'borderColor' => '#' . substr(md5(rand()), 0, 6),
            'order' => 1,
        ];
    }

    // Calculate total per program studi
    $totals = [];
    foreach ($data as $item) {
        $total = 0;
        foreach ($months as $month) {
            $total += (int)$item->{$month};
        }
        $totals[] = $total;
    }

    $datasets[] = [
        'label' => 'Total',
        'data' => $totals,
        'backgroundColor' => 'rgba(255, 99, 132, 0.1)', 
        'borderColor' => 'red', 
        'borderWidth' => 2, 
        'fill' => true, 
        'type' => 'line', 
        'order' => 0,
    ];

    return response()->json([
        'labels' => $labels,
        'datasets' => $datasets,
    ]);
}


    public function export()
    {
        return Excel::download(new LulusExport, 'Lulus.xlsx');
    }

    public function downloadTemplate()
    {
        $file = public_path('assets/template/template_Lulus.xlsx');
        return response()->download($file);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new LulusImport, $file);

        return back()->with('success_import_data', 'Data Mhs Lulus berhasil diimport');
    }
}
