<div>
            <div class="hover">
            <a href="/series/{{$s->id}}"><img src="{{asset($s->urlImage)}}"/>
                <span class="serie-hover">
                <p>{{$s->genre}}</p>
                <p>{{$s->langue}}</p>
                <p>{{$s->nbSaison()}} saison(s)</p>
                <p class="ensavoir">En savoir +</p>
                </span>
            </div>
                <div class="nom_serie">
                    <p>{{$s->nom}}</p>
                </div>
            </a>
            </div>