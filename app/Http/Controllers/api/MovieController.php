<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller {
    public function index() {
        return Movie::where('user_id', Auth::id())->get();
    }

    public function store(Request $request) {
        return Movie::updateOrCreate(
            ['user_id' => Auth::id(), 'tmdb_id' => $request->tmdb_id],
            [
                'title' => $request->title,
                'poster_path' => $request->poster_path,
                'notes' => 'Belum ada catatan'
            ]
        );
    }

    public function update(Request $request, $id) {
        $movie = Movie::where('user_id', Auth::id())->findOrFail($id);
        $movie->update(['notes' => $request->notes]);
        return response()->json(['message' => 'Sukses']);
    }

    public function destroy($id) {
        Movie::where('user_id', Auth::id())->findOrFail($id)->delete();
        return response()->json(['message' => 'Dihapus']);
    }
}