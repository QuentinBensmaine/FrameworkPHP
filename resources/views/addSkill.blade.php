@extends('layouts.app')

@section('content')
<?php

use App\User;
$a = DB::table('skill_user')->join('users', 'users.id','skill_user.user_id')->where('users.id',51)->pluck('skill_id');
$skills = DB::table('skills')->whereNotIn('skills.id', [$a])->orderBy('name')->get();
?>
<div>
    <h1>Veuillez sélectionner la compétence à ajouter</h1>
    <div class="dropdown">
        <form action="{{ URL::route('addSkill_done') }}" method="POST">
        @method('POST')
            @csrf
            <select name="skill">
                @foreach($skills as $skill)
                <option name="{{ $skill->id }}" id="{{$skill->id}}">{{ $skill->name }}</option>
                @endforeach
            </select>
            <select name="level">
                <option name="1" id="1">1</option>
                <option name="2" id="2">2</option>
                <option name="3" id="3">3</option>
                <option name="4" id="4">4</option>
                <option name="5" id="5">5</option>
            </select>
            <button type="submit" id="go" class="btn"><span>Ajouter</span></button>        
        </form>
    </div>
</div>
@endsection