<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    private $rules;

    public function __construct(){
        $this->rules = [
            'nombre' => 'required|string',
            'codigo' => 'required|digits:9|unique:estudiantes,codigo',
            'carrera' => 'string|nullable',
            'credito' => 'integer|min:0',
            'correo' => 'nullable|string|unique:estudiantes,correo',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiante.estudianteIndex', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiante.estudianteForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        Estudiante::create($request->all());
        return redirect()->route('estudiante.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        $materias = Materia::get();
        return view('estudiante.estudianteShow', compact('estudiante', 'materias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        return view('estudiante.estudianteForm', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate($this->rules);

        Estudiante::where('id',$estudiante->id)->update($request->except('_token','_method'));
        return redirect()->route('estudiante.show', $estudiante);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect()->route('estudiante.index');
    }

    public function addMateria(Request $request, Estudiante $estudiante)
    {
        $estudiante->materias()->sync($request->materia_id);
        return redirect()->route('estudiante.show', $estudiante);
    }
}
