@extends('layouts.app')
@section('content')
<div class="accueil">
    <h3>Trier les séries</h3>
    <form method="post" action="/series/">
        @csrf
        <div class="triseries">
            <a href="/tri/nom">Nom - </a>
            <a href="/tri/genre">Genre - </a>
            <a href="/tri/premiere">Date de sortie - </a>
            <a href="/tri/note">Note</a>
        </div>
    </form>
    <div class="allseries">
        @foreach($series as $s)
            @include('vignette')
        @endforeach
    </div>
</div>
@endsection

