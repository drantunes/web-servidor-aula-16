@extends('layouts.app')

@section('titulo', 'Lista de Jobs')

@section('slogan')                   
    <div class="header__title">
        <div class="header__slogan">ONDE VOCÊ IRÁ <span>CRESCER</span> AMANHÃ?</div>
        <h1>Oportunidades para Desenvolvedores Web</h1>
    </div>
@endsection

@section('conteudo')
        @forelse ($jobs as $job)
            
        <div class="job container">
            <div class="job__inner">
                <div class="row center">
                    <div class="col job__col--company "><img
                            src="https://loremflickr.com/120/120?random={{ $loop->iteration }}"></div>
                    <div class="col job__col--caption">
                        <a href="/job/{{ $job->id }}" class="job__position">{{ $job->vaga }}</a>
                        <div class="job__company">Empresa {{ $job->empresa }}</div>
                    </div>
                    <div class="col-6 job__col--tags ">
                        <div class="job__tags">
                            <div class="tags text-right">
                                @for ($i=0; $i < sizeof($job->tags); $i++)
                                    <a href="/{{ $job->tags[$i]->value }}" class="tags__tag">{{ $job->tags[$i]->value }}</a>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="job__col--type">{{ $job->tipo }}</div>
                </div>
            </div>
        </div>
        
        @empty
            <h2 style="text-align: center">🙁 Nenhuma vaga postada!</h2>   
        @endforelse
        

@endsection