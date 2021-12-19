@extends('layouts.app')

@section('content')
<div class="accueil">
    @guest()
        <p class="titreallseries">Les derniers ajouts :</p>
        <br>
        <div class="allseries">

            @foreach($series->all() as $s)

                <div>
            <div class="hover">
                <a href="./series/{{$s->id}}"><img src="{{$s-> urlImage}}"/>
                <span class="serie-hover">
                    <p>{{$s->genre}}</p>
                    <p>{{$s->langue}}</p>
                    <p>{{count($s->episodes->unique('saison'))}} saison(s)</p>
                    <p class="ensavoir">En savoir +</p>
                </span>
            </div>
            <p class="nom_serie">{{$s->nom}}</p>
        </div>
        </a>

            @endforeach
            <div class="voirplus">
                <form method="post" action="/series/">
                    <div><a href="/tri/premiere">Voir +</a></div>
                </form>
            </div>
        </div>
        <br>
        <p class="titreallseries" >Les mieux notées :</p>
        <br>
        <div class="allseries">

            @foreach($series2->all() as $c)

            <div>
            <div class="hover">
            <a href="./series/{{$c->id}}"><img src="{{$c-> urlImage}}"/>
                <span class="serie-hover">
                <p>{{$c->genre}}</p>
                <p>{{$c->langue}}</p>
                <p>{{count($c->episodes->unique('saison'))}} saison(s)</p>
                <p class="ensavoir">En savoir +</p>
                </span>
            </div>
            <p class="nom_serie">{{$c->nom}}</p>
        </div>
        </a>
                
            @endforeach
            <div class="voirplus">
                <form method="post" action="/series/">
                <div><a href="/tri/note">Voir +</a></div>
                </form>
            </div>
        </div>


        <br>
        <p class="titreallseries" >Par genre :</p>
        <br>
        <div class="allseries">
            @foreach($series3->all() as $v)

                 <div>
            <div class="hover">
            <a href="./series/{{$v->id}}"><img src="{{$v-> urlImage}}"/>
                <span class="serie-hover">
                <p>{{$v->genre}}</p>
                <p>{{$v->langue}}</p>
                <p>{{count($v->episodes->unique('saison'))}} saison(s)</p>
                <p class="ensavoir">En savoir +</p>
                </span>
            </div>
            <p class="nom_serie">{{$v->nom}}</p>
        </div>
        </a>
            @endforeach
            <div class="voirplus">
                <form method="post" action="/series/">
                <div><a href="/tri/genre">Voir +</a></div>
                </form>
            </div>
        </div>
        <br>



    @else
        <p class="titreallseries" >Les derniers ajouts:</p>
        <br>
        <div class="allseries">

            @foreach($series->all() as $s)
            <div>
            <div class="hover">
            <a href="./series/{{$s->id}}"><img src="{{$s-> urlImage}}"/>
                <span class="serie-hover">
                <p>{{$s->genre}}</p>
                <p>{{$s->langue}}</p>
                <p>{{count($s->episodes->unique('saison'))}} saison(s)</p>
                <p class="ensavoir">En savoir +</p>
                </span>
            </div>
            <p class="nom_serie">{{$s->nom}}</p>
        </div>
        </a>
            @endforeach
            <div class="voirplus">
                <form method="post" action="/series/">
                    <div><a href="/tri/premiere">Voir +</a></div>
                </form>
            </div>
        </div>
        <br>


        <p class="titreallseries" >Les mieux notées :</p>
        <br>
        <div class="allseries">

            @foreach($series2->all() as $c)

            <div>
            <div class="hover">
            <a href="./series/{{$c->id}}"><img src="{{$c-> urlImage}}"/>
                <span class="serie-hover">
                <p>{{$c->genre}}</p>
                <p>{{$c->langue}}</p>
                <p>{{count($c->episodes->unique('saison'))}} saison(s)</p>
                <p class="ensavoir">En savoir +</p>
                </span>
            </div>
            <p class="nom_serie">{{$c->nom}}</p>
        </div>
        </a>            
        @endforeach
        <div class="voirplus">
                <form method="post" action="/series/">
                <div><a href="/tri/note">Voir +</a></div>
                </form>
            </div>
        </div>
        <br>


        
        <p class="titreallseries" >Par genre :</p>
        <br>
        <div class="allseries">
            @foreach($series3->all() as $v)
            <div>
            <div class="hover">
            <a href="./series/{{$v->id}}"><img src="{{$v-> urlImage}}"/>
                <span class="serie-hover">
                <p>{{$v->genre}}</p>
                <p>{{$v->langue}}</p>
                <p>{{count($v->episodes->unique('saison'))}} saison(s)</p>
                <p class="ensavoir">En savoir +</p>
                </span>
            </div>
            <p class="nom_serie">{{$v->nom}}</p>
        </div>
        </a>           
         @endforeach
         <div class="voirplus">
                <form method="post" action="/series/">
                <div><a href="/tri/genre">Voir +</a></div>
                </form>
            </div>
        </div>
        <br>
    @endguest
</div>
@endsection
