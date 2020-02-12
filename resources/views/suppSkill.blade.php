@extends('layouts.app')

@section('content')
<?php

use App\User;

$skills = User::find(Auth::user()->id)->skills;

?>
<div>
    <h1>Veuillez sélectionner la compétence à supprimer</h1>
    <div class="dropdown">
        <form action="{{ URL::route('suppSkill_done') }}" method="POST">
            @method('DELETE')
            @csrf
            <select name="id">
                @foreach($skills as $skill)
                <option name="{{ $skill->id }}" id="{{$skill->id}}" value="{{$skill->id}}">{{ $skill->name }}</option>
                @endforeach
            </select>
            <button type="submit" id="go" class="btn"><span>Supprimer</span></button>
        </form>
    </div>
</div>
@endsection