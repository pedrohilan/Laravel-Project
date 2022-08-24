@extends('layouts.main')
@section('title', 'Criar Projeto')
    
@section('content')

<div class="col-md-6 offset-md-3" id="project-create-container">
    <h1>Crie um projeto</h1>
    <form action="/projects" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do projeto:</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="name">Projeto:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do projeto">
        </div>
        <div class="form-group">
            <label for="date">Data de realização do projeto:</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Data de realização do projeto">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição do projeto"></textarea>
        </div>
        <div class="form-group">
            <label for="languages">Adicione tecnologias:</label>
            <div class="form-group">
                <input type="checkbox" name="languages[]" value="PHP"> PHP
            </div>
            <div class="form-group">
                <input type="checkbox" name="languages[]" value="Laravel"> Laravel
            </div>
            <div class="form-group">
                <input type="checkbox" name="languages[]" value="MySQL"> MySQL
            </div>
            <div class="form-group">
                <input type="checkbox" name="languages[]" value="Javascript"> Javascript
            </div>
            <div class="form-group">
                <input type="checkbox" name="languages[]" value="React"> React
            </div>
        </div>
        <div class="form-group">
            <label for="link">Link:</label>
            <input type="text" class="form-control" id="link" name="link" placeholder="Link do projeto">
        </div>
        <div class="form-group">
            <label for="private">O projeto é privado?</label>
            <select name="private" id="private" class="form-select">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Criar projeto">
        </div>
    </form>
</div>

@endsection