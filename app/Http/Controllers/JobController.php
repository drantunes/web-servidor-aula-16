<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index()
    {
        return view('job_list', ['jobs' => Job::lista()]);
    }

    public function show($id)
    {
        Carbon::setLocale('pt');
        return view('job_show', ['job' => Job::get($id)]);
    }

    public function create()
    {
        return view('job_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vaga' => 'required',
            'tipo' => 'required',
            'descricao' => 'required',
            'empresa' => 'required',
            'tags' => 'required|json'
        ]);

        $job = new Job();
        $job->id = Str::random(9);
        $job->vaga = $request->input('vaga');
        $job->tipo = $request->input('tipo');
        $job->salario = $request->input('salario');
        $job->empresa = $request->input('empresa');
        $job->site = $request->input('site');
        $job->descricao = $request->input('descricao');
        $job->publicado = Carbon::now();

        $job->tags = array_values(json_decode($request->input('tags')));

        $job->save();

        return redirect('/');
    }
}
