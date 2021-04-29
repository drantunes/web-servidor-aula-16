<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index($tag = null)
    {
        $jobs = Job::with(['company', 'tags']);

        if ($tag != null) {
            $jobs = $jobs->whereHas('tags', fn ($q) => $q->where('nome', $tag));
        }
        
        return view('job_list', ['jobs' => $jobs->simplePaginate(2)]);
    }

    public function show($id)
    {
        Carbon::setLocale('pt');
        return view('job_show', ['job' => Job::with(['company', 'tags'])->find($id)]);
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
        ]);

        $empresa = Company::firstOrCreate([
            'nome' => $request->input('empresa'),
            'site' => $request->input('website'),
            'user_id' => auth()->id()
        ]);

        $job = new Job();
        $job->vaga = $request->input('vaga');
        $job->tipo = $request->input('tipo');
        $job->salario = $request->input('salario');
        $job->descricao = $request->input('descricao');
        $job->company_id = $empresa->id;
        
        $job->save();
        
        $tags = array_values(json_decode($request->input('tags') ?? []));

        foreach($tags as $tag) {
            $job->tags()->attach(Tag::firstOrCreate(['nome' => $tag->value ]));
        }

        return redirect('/');
    }
}
