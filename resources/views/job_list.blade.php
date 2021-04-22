@extends('layouts.app')

@section('titulo', 'Lista de Jobs')

@section('slogan')                   
    <div class="header__title">
        <div class="header__slogan">ONDE VOCÊ IRÁ <span>CRESCER</span> AMANHÃ?</div>
        <h1>Oportunidades para Desenvolvedores Web</h1>
    </div>
@endsection

@section('conteudo')
        @if (request()->tag != null)
        <div class="tag_header">
            <h2>Vagas com a tag: <span>{{ request()->tag }}</span></h2>
            <a href="/">Ver todas as vagas</a>
        </div>
        @endif

        @forelse ($jobs as $job)
            
        <div class="job container">
            <div class="job__inner">
                <div class="row center">
                    <div class="col job__col--company "><img
                            src="https://loremflickr.com/120/120?random={{ $loop->iteration }}"></div>
                    <div class="col job__col--caption">
                        <a href="/job/{{ $job->id }}" class="job__position">{{ $job->vaga }}</a>
                        <div class="job__company">Empresa {{ $job->company->nome }}</div>
                    </div>
                    <div class="col-6 job__col--tags ">
                        <div class="job__tags">
                            <div class="tags text-right">
                                @foreach ($job->tags as $tag)
                                    <a href="/{{ $tag->nome }}" class="tags__tag">{{ $tag->nome }}</a>
                                @endforeach
                                
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
        
        {{ $jobs->links() }}

@endsection