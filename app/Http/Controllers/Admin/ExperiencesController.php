<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Experience;
use Auth;
use Session;
use Validator;

class ExperiencesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'asc')->get();

        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $experience = new Experience();
        return view('admin.experiences.create', compact('experience'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'job' => 'required',
            'society' => 'required',
            'link' => 'required'
        ]);

        if($validator->fails()) {
            return redirect(route('admin.experiences.create'))
                        ->withErrors($validator, 'experience')
                        ->withInput();
        } else {
            if(!empty($request->all())) {
                $data = $request->all();
                $data['start_date'] = $data['start_date_submit'];
                $data['end_date'] = $data['end_date_submit'];

                $experience = Experience::create($data);
            }
            return redirect(route('admin.experiences.index'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = Experience::findOrFail($id);

        return view('admin.experiences.edit', compact('experience'));
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
        $experience = Experience::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'job' => 'required',
            'society' => 'required',
            'link' => 'required'
        ]);

        if($validator->fails()) {
            return redirect(route('admin.experiences.edit', $id))->withErrors($validator->errors());
        } else {
            if(!empty($request->all())) {
                $data = $request->all();
                $data['start_date'] = $data['start_date_submit'];
                $data['end_date'] = $data['end_date_submit'];

                $experience->update($data);
            }

            return redirect(route('admin.experiences.index'));
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
        $experience = Experience::findOrFail($id);

        if(!$experience) {
            return $data->message = "Échec de la suppression : Expérience introuvable !";
        }

        $success = $experience->delete();

        if(!$success) {
            return $data->message = "Échec de la suppression !";
        }

        $data->message = "Suppression de l'expérience effectuée !";

        return response()->json([
            'data' => $data
        ]);
    }
}