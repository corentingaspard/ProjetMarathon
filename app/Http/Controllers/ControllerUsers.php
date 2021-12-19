<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerUsers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $comment = Comment::all();
        $series = Serie::all();
        $seen = User::select('*')->from('seen')->where('user_id', $id)->orderBy('date_seen', 'desc');
        return view('users.show', ['user' => $user, 'comment' => $comment, 'series' => $series, 'seen' => $seen]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name =  $request->name;
        $email = $request->email;
        $avatar = $request->avatar;
        //User::update('update users set name=? where id = ?',[$name,$id]);
        if(DB::table('users')->where('id', $id)->update(['name' => $name, 'email' => $email, 'avatar' => $avatar])) {
            return 'Profil mis à jour !';
        } else {
            return 'Erreur';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function userSeries($id) {
        $user = User::findOrFail($id);
        $id_series = [];
        foreach ($user->seen as $episode) {
            if (!in_array($episode->serie->id, $id_series)) {
                $id_series[] = $episode->serie->id;
            }
        }
        return $id_series;
    }
}
