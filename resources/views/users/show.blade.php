@extends('layouts.app')

@section('content')
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

    @if(!empty($user->id))
        <img src="../{{ $user->avatar }}" height="50px" width="50px" />
        <b>{{ $user->name }}</b>
        <hr>
        <h2>Series récentes</h2>
        @foreach(\App\Http\Controllers\ControllerUsers::userSeries($user->id) as $c)
            <a href="/series/{{ $c }}"><img src="/{{ \App\Models\Serie::find($c)->urlImage }}" /></a>
        @endforeach
        {{-- @foreach($seen->take(5)->get() as $s)
             <a href="/series/{{ \App\Models\Episode::select('*')->from('episodes')->where('id', $s->episode_id)->get()[0]->serie_id }}"><img src="/{{ \App\Models\Episode::select('*')->from('series')->where('id', \App\Models\Episode::select('*')->from('episodes')->where('id', $s->episode_id)->get()[0]->serie_id)->get()[0]->urlImage }}" /></a>
         @endforeach--}}
        <hr>
        <h2>Episodes récents</h2>
        @foreach($seen->take(5)->get() as $s)
            <a href="/series/{{ \App\Models\Episode::select('*')->from('episodes')->where('id', $s->episode_id)->get()[0]->serie_id }}"><img src="/{{ \App\Models\Episode::select('*')->from('episodes')->where('id', $s->episode_id)->get()[0]->urlImage }}" /></a>
        @endforeach
        <hr>
        <h2>Avis</h2>
        <table>
            @foreach($comment as $c)
                @if($c->user_id === $user->id && $c->validated === 1)
                    <tr>
                        <td>
                            {!! $c->note !!} étoiles
                        </td>
                        <td style="width: 90%">
                            @foreach($series as $s)
                                @if($s->id === $c->serie_id)
                                    <p>{{ $s->nom }}</p>
                                @endif
                            @endforeach
                            <p>Créé le {{ $c->created_at }} (Dernière modification le {{ $c->updated_at }})</p>
                            <hr>
                            {!! $c->content !!}
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
        @guest
        @else
            @if(Auth::user()->administrateur == 1)
                <hr>
                <h2>Avis à valider (ADMIN)</h2>
                <table>
                    @foreach($comment as $c)
                        @if($c->user_id === $user->id && $c->validated === 0)
                            <tr>
                                <td>
                                    {!! $c->note !!} étoiles
                                </td>
                                <td style="width: 90%">
                                    @foreach($series as $s)
                                        @if($s->id === $c->serie_id)
                                            <p>{{ $s->nom }}</p>
                                        @endif
                                    @endforeach
                                    <p>Créé le {{ $c->created_at }} (Dernière modification le {{ $c->updated_at }})</p>
                                    <hr>
                                    {!! $c->content !!}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            @endif
        @endguest
    @else
        Pas d'utilisateur correspondant à cet id
    @endif
@endsection