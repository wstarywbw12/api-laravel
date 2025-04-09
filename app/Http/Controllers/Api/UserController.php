<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Ambil semua pengguna
    public function index()
    {
        $users = User::with('departemen')->get();
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    // Simpan pengguna baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'           => 'required|string',
            'email'          => 'required|email|unique:users,email',
            'password'       => 'required|string|min:6',
            'telepon'        => 'required|digits_between:10,15',
            'status_aktif'         => 'required|boolean',
            'departemen_id'  => 'required|exists:departements,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'telepon'       => $request->telepon,
            'status_aktif'        => $request->status_aktif,
            'departemen_id' => $request->departemen_id,
        ]);

        return response()->json(['success' => true, 'message' => 'Pengguna berhasil dibuat', 'data' => $user], 201);
    }

    // Tampilkan detail user berdasarkan ID
    public function show($id)
    {
        $user = User::with('departemen')->find($id);

        if (!$user) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'message' => 'Berhasil Mengambil Data Pengguna', 'data' => $user]);
    }

    // Update data user berdasarkan ID
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name'           => 'sometimes|required|string',
            'email'          => 'sometimes|required|email|unique:users,email,' . $user->id,
            'password'       => 'sometimes|nullable|string|min:6',
            'telepon'        => 'sometimes|required|digits_between:10,15',
            'status_aktif'         => 'sometimes|required|boolean',
            'departemen_id'  => 'sometimes|required|exists:departements,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->update([
            'name'          => $request->name ?? $user->name,
            'email'         => $request->email ?? $user->email,
            'password'      => $request->password ? Hash::make($request->password) : $user->password,
            'telepon'       => $request->telepon ?? $user->telepon,
            'status_aktif'        => $request->status_aktif ?? $user->status_aktif,
            'departemen_id' => $request->departemen_id ?? $user->departemen_id,
        ]);

        return response()->json(['success' => true, 'message' => 'Pengguna berhasil diperbarui', 'data' => $user]);
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $user->delete();

        return response()->json(['success' => true, 'message' => 'Pengguna berhasil dihapus']);
    }
}

