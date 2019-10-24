<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Lesson;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GameController extends Controller
{
    public function addGames()
    {
        $layout = 'admin';
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        return view('dashboard.admin.add-games')
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('layout', $layout);
    }
    public function saveGames(Request $request)
    {
        $request->merge(['image' => $this->image($request)]);
//        dd($request->except(['file','_token','file_path']));
        $game =new Game($request->except(['file','_token','file_path']));
        $game->save();
        return redirect()->back()->with('message', 'Game Added Successfully!');
    }

    public function listGames()
    {
        $layout = 'admin';
        $new_educators = User::where('user_regster_type', 'educator')->where('status', 0)->get();
        $new_lessions = Lesson::where('status', 0)->get();
        $games = Game::all();
        return view('dashboard.admin.list-game')
            ->with('layout', $layout)
            ->with('new_educators', $new_educators)
            ->with('new_lessions', $new_lessions)
            ->with('games', $games);

    }

    public function deleteGame($id){
        Game::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Game deleted Successfully!');
    }

    public function image($request)
    {
        $dir = './uploads/game/';
        $file = $request->file; //file field
        $ext = $file->guessExtension(); //get file extenstion
        $name = 'game-' . uniqid() . '.' . $ext; //create file name
        $res = Input::file('file')->move($dir . '/' . $request->lesson_type, $name); //path to save file

        $request->merge(['file_path' => $dir . '/' . $request->lesson_type . '/' . $name]);
        return $name;
    }

}
