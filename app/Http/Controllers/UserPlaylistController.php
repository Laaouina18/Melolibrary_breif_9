<?php 
namespace App\Http\Controllers;

use App\Models\UserPlaylist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Song;
use App\Models\artist;
use App\Models\genre;
use App\Models\Commentaire;
class UserPlaylistController extends Controller
{
    public function index(){
        if(auth()->user()){
        $play=UserPlaylist::all();
        return view('welcome')->with('play',$play);}
        else{
            return view('auth.login');
        }
    
    }
    public function addSongToPlaylist(Request $request)
    {
        if(auth()->user()){
        $user = auth()->user();
        $songId = $request->input('song_id');

        $userPlaylist = new UserPlaylist([
            'user_id' => $user->id,
            'song_id' => $songId,
        ]);

        $userPlaylist->save();

        return redirect()->back()->with('success', 'La chanson a été ajoutée à votre playlist.');}
        return view ('auth.login');
    }
}
