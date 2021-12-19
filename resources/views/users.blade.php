@extends('layouts.app')

@section('content')
    @guest
        Tu n'as pas l'autorisation d'accéder à cette page !
    @else
        <table>
            <tr>
                <td>
                    <img src="{{ Auth::user()->avatar }}" /><br />
                    <b>{{ Auth::user()->name }}</b>
                </td>
                <td>
                    Adresse mail : {{ Auth::user()->email }}
                </td>
            </tr>
        {{$user->seen()}}
        </table>
    @endguest
@endsection
