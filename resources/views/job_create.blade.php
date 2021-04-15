@extends('layouts.app')

@section('titulo', 'Publicar Nova Vaga')

@section('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.17.10/tagify.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.17.10/tagify.min.js"></script>
    <link rel="stylesheet" href="/css/tags.css">
@endsection

@section('conteudo')

        <div class="container header--light">
            <div class="header__title">
                <h1 class="header__title-h1-single">🔥 Usuario, adicione um Job!</h1>
                <p class="header__title-h1-sub text-center">
                    Adicione uma oportunidade na sua empresa. O trabalho será listado em vários sites parceiros automaticamente
                    e o número de candidatos será maior!
                </p>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/job/store" method="POST">
            @csrf
            <main>
                <div class="container job-detail">
        
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-8">
                            <div class="content__block">
                                <div class="content-card">
        
                                    <div class="content-card__title">😎 Descrição da Vaga</div>
        
                                    <div class="form-group @error('tipo') is-invalid @enderror">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="tipo-full-time" name="tipo" value="Full Time | 40H" class="form-check-input">
                                            <label for="tipo-full-time" class="form-check-label">Full Time, 40H</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="tipo" id="tipo-part-time" value="Part Time | 20H" class="form-check-input"> 
                                            <label for="tipo-part-time" class="form-check-label">Part Time, 20H</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="tipo" id="tipo-freelancer" value="Freelancer" class="form-check-input"> 
                                            <label for="tipo-freelancer" class="form-check-label">Freelancer</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="tipo" id="tipo-estagio" value="Estágio" class="form-check-input"> 
                                            <label for="tipo-estagio" class="form-check-label">Estágio</label></div>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="vaga">Vaga:</label>
                                        <input type="text" name="vaga" id="vaga" value="" placeholder="Ex: Programador PHP" class="form-control @error('vaga') is-invalid @enderror">
                                    </div>
        
                                    <div class="form-group">
                                        <label for="salario">Salário:</label>
                                        <input type="text" name="salario" id="salario" value="" placeholder="Ex: R$ 2.500 a R$4.000" class="form-control">
                                    </div>
        
                                    <div class="form-group">
                                        <label for="x">Descrição:</label>
                                        <input type="hidden" name="descricao" id="x" value="Descrição da vaga aqui...">
                                        <trix-editor class="trix-list" input="x"></trix-editor>
                                    </div>
        
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-12 col-lg-4">
                            <div class="content-card">
                                <div class="form-group">
                                    <label for="empresa">Empresa:</label>
                                    <input type="text" name="empresa" id="empresa" value="" placeholder="Ex: XYZ" class="form-control">
                                </div>
        
                                <div class="form-group">
                                    <label for="website">WebSite:</label>
                                    <input type="text" name="website" id="website" value="" placeholder="Ex: https://xyz.com" class="form-control">
                                </div>
        
                                <div class="form-group">
                                    <label for="tags">Tags:</label>
                                    <input type="text" name="tags" id="tags" value="tag1, tag2">
                                </div>
        
                            </div>
        
                            <div class="mb-2">
                                <button class="btn btn-danger btn-block button__apply">
                                    CADASTRAR VAGA
                                </button>
                            </div>
        
                        </div>
                    </div>
                </div>
        
            </main>
        </form>
        
        <script>
            var tagify = new Tagify(document.querySelector('#tags'));
        </script>

@endsection