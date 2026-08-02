<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemsModel;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return ItemsModel::all();
    }

    public function create()
    {
        return view('items.create');
    }

    // Menambahkan Data Baru
    public function store(Request $request)
    {
        ItemsModel::create($request->all());
        return response()->json([
            'message' => "data berhasil"
        ]);
    }

    // Mengambil hanya 1 data yang diinginkan
    public function show(string $id)
    {
        return ItemsModel::findOrFail($id);
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    // Update data item
    public function update(Request $request, string $id)
    {
        // Mengambil data yang ingin di update
        $item = ItemsModel::findOrFail($id);

        // Update sesuai data yang ingin di update
        $item->update($request->all());

        return response()->json([
            "message" => "item berhasil di update!"
        ]);
    }

    // Menghapus data item
    public function destroy(string $id)
    {
        // Mengambil data yang ingin di hapus
        ItemsModel::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Item berhasil dihapus '
        ]);
    }
}
