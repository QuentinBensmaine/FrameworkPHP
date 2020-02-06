@extends('layouts.app')

@section('content')
<?php

use App\User;
$skills = DB::table('skills')->join('skill_user','skill_user.skill_id','skills.id')->where('skill_user.user_id',Auth::user()->id)->orderBy('name')->get();

?>
<div>
    <h1>Veuillez sélectionner la compétence à supprimer</h1>
    <div class="dropdown">
        <form action="selectuser.php" method="POST">
            <select name="user">
                @foreach($skills as $skill)
                <option name="{{ $skill->id }}" id="{{$skill->id}}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
</div>
@endsection