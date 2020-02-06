@extends('layouts.app')

@section('content')
<?php

use App\User;

$skills = DB::table('skills')->join('skill_user','skill_user.skill_id','skills.id')->where('skill_user.user_id',Auth::user()->id)->orderBy('name')->get();
?>
<div>
    <h1>Veuillez sélectionner la compétence à modifier</h1>
    <div class="dropdown">
        <form action="selectuser.php" method="GET">
            <select name="user">
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
            <button type="submit" id="go" class="btn"><span>Modifier</span></button>
        </form>
    </div>
</div>
@endsection