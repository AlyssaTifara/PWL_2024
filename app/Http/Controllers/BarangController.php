<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class BarangController extends Controller
{
    public function index()
    {
        $activeMenu = 'barang';
        $breadcrumb = (object) [
            'title' => 'Data Barang',
            'list' => ['Home', 'Barang']
        ];

        $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();

        return view('barang.index', [
            'activeMenu' => $activeMenu,
            'breadcrumb' => $breadcrumb,
            'kategori' => $kategori
        ]);
    }

    public function list(Request $request)
    {
        $barang = BarangModel::select('barang_id', 'kategori_id', 'barang_kode', 'nama_barang', 'harga_beli', 'harga_jual')
            ->with('kategori');

        if (!empty($request->filter_kategori)) {
            $barang->where('kategori_id', $request->filter_kategori);
        }

        return DataTables::of($barang)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barang) {
                $btn = '<button onclick="modalAction(\'' . url('/barang/' . $barang->barang_id . '/show_ajax'). '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/barang/' . $barang->barang_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/barang/' . $barang->barang_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => ['required', 'integer', 'exists:m_kategori,kategori_id'],
            'barang_kode' => ['required', 'min:3', 'max:10', 'unique:m_barang,barang_kode'],
            'nama_barang' => ['required', 'string', 'max:100'],
            'harga_beli' => ['required', 'numeric'],
            'harga_jual' => ['required', 'numeric'],
        ]);

        BarangModel::create($validated);

        return redirect()->route('barang.index')->with('success', 'Data berhasil disimpan');
    }

    public function show($id)
    {
        $barang = BarangModel::with('kategori')->findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = BarangModel::findOrFail($id);
        $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_id' => ['required', 'integer', 'exists:m_kategori,kategori_id'],
            'barang_kode' => ['required', 'min:3', 'max:10', 'unique:m_barang,barang_kode,' . $id . ',barang_id'],
            'nama_barang' => ['required', 'string', 'max:100'],
            'harga_beli' => ['required', 'numeric'],
            'harga_jual' => ['required', 'numeric'],
        ]);

        $barang = BarangModel::findOrFail($id);
        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = BarangModel::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus');
    }

    public function import()
    {
        return view('barang.import');
    }

    public function importProcess(Request $request)
    {
        $request->validate([
            'file_barang' => ['required', 'file', 'mimes:xlsx,xls', 'max:1024']
        ]);

        $file = $request->file('file_barang');
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        $insert = [];
        $now = now();

        foreach ($data as $index => $row) {
            if ($index === 0) continue; // Skip header row

            if (!empty($row[0])) {
                $insert[] = [
                    'kategori_id' => $row[0],
                    'barang_kode' => $row[1],
                    'nama_barang' => $row[2],
                    'harga_beli' => $row[3],
                    'harga_jual' => $row[4],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        if (!empty($insert)) {
            BarangModel::insert($insert);
        }

        return redirect()->route('barang.index')->with('success', 'Data berhasil diimport');
    }

    public function export()
    {
        // $barang = BarangModel::select('barang_id', 'kategori_id', 'barang_kode', 'nama_barang', 'harga_beli', 'harga_jual')
        // ->orderBy('kategoti_id')
        // ->with('kategori')
        // ->get();
        $barang = BarangModel::with('kategori')
            ->orderBy('kategori_id')
            ->get();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kode Barang');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Harga Beli');
        $sheet->setCellValue('E1', 'Harga Jual');
        $sheet->setCellValue('F1', 'Kategori');
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);

        // Data
        $row = 2;
        foreach ($barang as $index => $item) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $item->barang_kode);
            $sheet->setCellValue('C' . $row, $item->nama_barang);
            $sheet->setCellValue('D' . $row, $item->harga_beli);
            $sheet->setCellValue('E' . $row, $item->harga_jual);
            $sheet->setCellValue('F' . $row, $item->kategori->kategori_nama ?? '');
            $row++;
        }

        // Auto size columns
        foreach (range('A', 'F') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data_Barang_' . date('Y-m-d_His') . '.xlsx';

        return response()->streamDownload(function() use ($writer) {
            $writer->save('php://output');
        }, $filename);
    }
}