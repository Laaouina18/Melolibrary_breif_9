<?php 
namespace App\Http\Controllers;

use App\Models\UserPlaylist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class UserPlaylistController extends Controller
{
    public function index(){
        $play=UserPlaylist::all();
        return view('welcome')->with('play',$play);
    
    }
    public function addSongToPlaylist(Request $request)
    {
        $user = auth()->user();
        $songId = $request->input('song_id');

        $userPlaylist = new UserPlaylist([
            'user_id' => $user->id,
            'song_id' => $songId,
        ]);

        $userPlaylist->save();

        return redirect()->back()->with('success', 'La chanson a été ajoutée à votre playlist.');
    }
}
