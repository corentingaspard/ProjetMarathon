<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Serie;
use Illuminate\Http\Request;

class VueController extends Controller
{
    public function nouveau($id){
        $userQuiaVue = auth()->user();
        $serieQuiVaEtreVue = Serie::where('id',$id)->firstOrFail();
        return redirect()->back();
    }
    public  function suivis()
    {
        return  $this->hasMany(Serie::class);
    }

}
