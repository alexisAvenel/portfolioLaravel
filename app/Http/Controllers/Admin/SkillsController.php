<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Skill;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::get();
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skill = new Skill();
        return view('admin.skills.create', compact('skill'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1',
            'value' => 'required',
            'description' => 'max:500'
        ]);
        if($validator->fails()) {
            return redirect(route('admin.skills.create'))->withErrors($validator)->withInput();
        } else {
            $skillRequest = $request->all();

            if($skillRequest) {
                $skill = Skill::create($skillRequest);
            }
            return redirect(route('admin.skills.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);

        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'value' => 'required',
            'description' => 'max:500'
        ]);
        if($validator->fails()) {
            return redirect(route('admin.skills.edit', $id))->withErrors($validator->errors());
        } else {
            $skillRequest = $request->all();
            if($skillRequest) {
                $skill->update($skillRequest);
            }

            return redirect(route('admin.skills.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = new \stdClass();
        $skill = Skill::findOrFail($id);

        if(!$skill) {
            return $data->message = "Échec de la suppression : Compétence introuvable !";
        }

        $success = $skill->delete();
        if(!$success) {
            return $data->message = "Échec de la suppression !";
        }

        $data->message = "Suppression de la compétence effectuée !";
        return response()->json([
            'data' => $data
        ]);
    }
}
