@extends('layouts.app')


@section('content')
<div class="serie_seule">

    @guest()
        <div class="serie">
            <img src="../{{$serie-> urlImage}}" />
            <div class="resume">
                <h1>{{$serie->nom}}</h1>
                <p>{{count($serie->episodes->unique('saison'))}} saisons - {{$serie->genre}} - {{$serie->langue}} - {{$serie->note}}/10</p>
                <h3>Resumé : </h3>
                <p>{!!  $serie->resume!!}</p>
                <h3>Première : </h3>{{$serie->premiere}}
                <h3>Statut : </h3>{{$serie->statut}}
            </div>
        </div>
        <label for="toto">Avis de la redaction :</label>
        <table>
            <tr>
                <td>
                    {{$serie->avis}}
                </td>
                @if($serie->nom == "Sherlock")
                    <td><video controls width="500" ><source src="/video/sherlock.mp4"type="video/mp4">cc</video></td>
                @endif

            </tr>
        </table>

        
        <p class="liste_episodes">Liste des épisodes </p>
        <div class="listeEpisode">
            @foreach($episode->all() as $ep)
            <div class="episode">
            <img src="../{{$ep->urlImage}}"/>
                <div class="infos_episode">
                    <p>Saison {{$ep->saison}} Episode {{$ep->numero}}</p>
                    <p>{{$ep->nom}}</p>
                </div>
            </div>
            @endforeach
        </div>



        <br>
        <h3>Avis :</h3>{{$serie->avis}}
        <br>
    @else
        <div class="serie">
            <img src="../{{$serie-> urlImage}}" />
            <div class="resume">
                <h1>{{$serie->nom}}</h1>
                <p>{{count($serie->episodes->unique('saison'))}} saisons - {{$serie->genre}} - {{$serie->langue}} - {{$serie->note}}/10</p>
                <h3>Resumé : </h3>
                <p>{!!  $serie->resume!!}</p>
                <h3>Première : </h3>{{$serie->premiere}}
                <h3>Statut : </h3>{{$serie->statut}}
            </div>
        </div>
        <label for="toto">Avis de la redaction :</label>
        <table>
            <tr>
                <td>
                    {{$serie->avis}}
                </td>
                @if($serie->nom == "Sherlock")
                    <td><video controls width="500" ><source src="/video/sherlock.mp4"type="video/mp4">cc</video></td>
                @endif

            </tr>
        </table>
        @if(Auth::user()->administrateur == 1)
            <form method="post" action="/series/{{$serie->id}}">

                <input type="hidden" name="id" value="{{$serie->id}}" />
                {{csrf_field()}}
                <div>
                    <br>
                    <input id="toto" type="text" name="avisDeLaredaction"  placeholder="Saisir l'avis de la redaction">
                </div>
                <div class="boutons">
                    <button type="reset" class="button-34" role="button">Annuler</button>
                    <button type="submit" class="button-34" role="button">Valider</button>
                    <INPUT type=hidden name=afficher value=ok>
                </div>
            </form>
        @endif



        <p class="liste_episodes">Liste des épisodes </p>
        <div class="listeEpisode">

            @foreach($episode->all() as $ep)
            <div class="episode">
            <img src="../{{$ep->urlImage}}"/>
                <div class="infos_episode">
                    <p>Saison {{$ep->saison}} Episode {{$ep->numero}}</p>
                    <p>{{$ep->nom}}</p>
                </div>
            </div>
            @endforeach
        </div>


        <br>
        <h3>Commentaire :</h3>

        <br>
        @auth
        <form method="post" action="{{route('series.store')}}">
            {{csrf_field()}}
            <div>

                <input type="hidden" value="{{$serie->id}}" name='id'>
                <textarea name="commentaire" placeholder="Laisser un commentaire..."></textarea></p>
            </div>
            <div class="note">
                <span>Note :</span>
                <br>
                <input id="actif_0" type="radio" name="note" value="0" >
                <label for="actif_0">0</label>
                <input id="actif_1" type="radio" name="note" value="1" >
                <label for="actif_1">1</label>
                <input id="actif_2" type="radio" name="note" value="2">
                <label for="actif_2">2</label>
                <input id="actif_3" type="radio" name="note" value="3" >
                <label for="actif_3">3</label>
                <input id="actif_4" type="radio" name="note" value="4">
                <label for="actif_4">4</label>
                <input id="actif_5" type="radio" name="note" value="5" >
                <label for="actif_5">5</label>
            </div>
            <br>
            <div class="boutons">
            <button type="reset" class="button-34" role="button">Annuler</button>
            <button type="submit" class="button-34" role="button">Valider</button>
            <INPUT type=hidden name=afficher value=ok>
            </div>
        </form>
            <table class="commentaire">
                @foreach($commentaire->all() as $c)
                @if($serie->id === $c->serie_id)
                        <tr>
                            <td style="width: 90%">
                                <p class="user_name">Publié par : {!!$c -> utilisateur->name !!}</p>
                                @if($c->validated == 0)
                                    <p class="Valide">Non Validé</p>
                                @endif
                                <br>
                                {!! $c->note !!} étoiles
                                <p class="date_commentaire">Créé le {{ $c->created_at }} (Dernière modification le {{ $c->updated_at }})</p>
                                <hr>
                                {!! $c->content !!}
                                <br>

                            </td>
                        </tr>

                    @endif
                @endforeach
            </table>

            <form method="post" action="/series/{{$serie->id}}/vue">
            @csrf
            <div>
                <button type="submit">Série vue</button>
            </div>
        </form>
        @endauth
    @endguest

    <div> <br/>
            <a class="button-36" href="{{route('series.index')}}">Retour sur les séries</a>
    </div> <br/>

@endsection
