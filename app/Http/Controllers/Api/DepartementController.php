<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::all();
        return response()->json([
            'success' => true,
            'data' => $departements
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $departement = Departement::create([
            'name' => $request->name,
        ]);

        return response()->json(['success' => true, 'message' => 'Departemen berhasil ditambahkan', 'data' => $departement], 201);
    }

    public function show($id)
    {
        $departement = Departement::find($id);
        if (!$departement) {
            return response()->json(['message' => 'Departemen tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'message' => 'Berhasil Mengambil Data Departemen', 'data' => $departement]);
    }

    public function update(Request $request, $id)
    {
        $departement = Departement::find($id);
        if (!$departement) {
            return response()->json(['message' => 'Departemen tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $departement->update([
            'name' => $request->name,
        ]);

        return response()->json(['success' => true, 'message' => 'Departemen berhasil diperbarui', 'data' => $departement]);
    }

    public function destroy($id)
    {
        $departement = Departement::find($id);
        if (!$departement) {
            return response()->json(['message' => 'Departemen tidak ditemukan'], 404);
        }

        $departement->delete();

        return response()->json(['success' => true, 'message' => 'Departemen berhasil dihapus']);
    }
}
