@extends('layouts.app')

@section('content')
<div class="accueil">
    @guest
        Tu n'as pas l'autorisation d'accéder à cette page !
    @else
    <div class="user">
        <img src="../{{ Auth::user()->avatar }}" height="75px" width="75px" />
        <p class="profilnom">{{ Auth::user()->name }}</p> <br/>
    </div>
        <hr> <br/>
        <h2>Séries vues récemment</h2><br/>
        <div class="allseries">
        @foreach(\App\Http\Controllers\ControllerUsers::userSeries(Auth::user()->id) as $c)
            @include('vignette', ['s' => \App\Models\Serie::find($c)])

        
        @endforeach
</div>
        <hr>
        <h2 class="top">Préférences</h2>
        <form action="/profile/{{ Auth::user()->id }}" method="post">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td>Nom :</td>
                    <td>
                        <input type='text' name='name' value='{{ Auth::user()->name }}'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Adresse mail :<br />
                        Vérifié le : {{ Auth::user()->email_verified_at }}
                    </td>
                    <td>
                        <input type='text' name='email' value='{{ Auth::user()->email }}'/>
                    </td>
                </tr>
                <tr>
                    <td>Changer son avatar :</td>
                    <td>
                        <input type='text' name='avatar' value='{{ Auth::user()->avatar }}'/>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <input class="button-35" type='submit' value ="Modifier" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    @endguest
@endsection
