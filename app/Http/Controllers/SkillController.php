<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "hello";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $id)
    {
        // $a = Skill::join("skill_user","skill_user.skill_id","skills.id")->join("users","skill_user.user_id","users.id")->where("users.id","{{ Auth::user()->id }}")->insert(["skill_user.skill_id"=> 1,"level"=>$id->level ]);
        return $id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
    {
        $a = Skill::join("skill_user","skill_user.skill_id","skills.id")->join("users","skill_user.user_id","users.id")->where("users.name",$id->user)->pluck("level","skills.name");
        return $a;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $a = Skill::join("skill_user","skill_user.skill_id","skills.id")->join("users","skill_user.user_id","users.id")->where("skill_user.user_id", 51)->where("skill_user.skill_id",$request->id)->update();
        return $request;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function destroy($id)
    public function destroy(Request $request)
    {
        //l'id est accessible par $request->id (car l'option est nommée comme ça dans le formulaire); 
        $a = Skill::join("skill_user","skill_user.skill_id","skills.id")->join("users","skill_user.user_id","users.id")->where("skill_user.user_id", 51)->where("skill_user.skill_id",$request->id)->delete();
        return $request;
    }
}
