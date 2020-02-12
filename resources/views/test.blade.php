@extends('layouts.app')

@section('content')
<?php
$user = DB::table('users')->orderBy('name')->get();
$selected = Auth::user()->id;
$skill;
?>
<div>
    <h1>Veuillez sélectionner un utilisateur pour voir ses compétences</h1>
    <div class="dropdown">
        <form action="{{ URL::route('select') }}" method="GET">
            @method('GET')
            @csrf
            <select name="user">
                <option name="{{ Auth::user()->id }}" id="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                @foreach($user as $user)
                <option name="{{ $user->id }}" id="{{$user->id}}">{{ $user->name }}</option>
                @endforeach
            </select>
            <button type="submit" id="go" class="btn"><span>Sélectionner</span></button>
        </form>
    </div>
</div>
<?php
$skills = DB::table('users')
    ->join('skill_user', function ($join) {
        $join->on('users.id', '=', 'skill_user.user_id');
    })
    ->join('skills', function ($join2) {
        $join2->on('skill_user.skill_id', '=', 'skills.id');
    })
    ->select('skills.name', 'skill_user.level')
    ->where('users.id', '=', $selected)
    ->get();
?>
<div style="float: right">
    @foreach($skills as $skill)
    {{ $skill->name }} Niveau : {{ $skill->level }} <br>
    @endforeach
    @if (Route::has('login'))
    <a href="{{ route('addSkill') }}"> Ajouter</a>
    <a href="{{ route('suppSkill') }}"> Supprimer</a>
    <a href="{{ route('modifSkill') }}"> Modifier</a>
    @endif
</div>
@endsection