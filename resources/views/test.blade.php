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
        <form action="selectuser.php" method="POST">
            <select name="user">
                <option name="{{ Auth::user()->id }}" id="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                @foreach($user as $user)
                <option name="{{ $user->id }}" id="{{$user->id}}">{{ $user->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
</div>
<?php
$idcomp = 1;
$level = 3;
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

function addcomp($idcomp, $level)
{
    DB::table('skill_user')->insert(
        ['skill_id' => $idcomp, 'user_id' => '{{ Auth::user()->id }}', 'level' => $level]
    );
}

function suppcomp($idcomp)
{
    DB::table('skill_user')->where('skill_id', $idcomp)->delete();
}

function modifcomp($idcomp, $level)
{
    DB::table('skill_user')
        ->where('skill_id', $idcomp)
        ->where('user_id', '{{ Auth::user()->id }}')
        ->update(['level' => $level]);
}
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