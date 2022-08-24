@extends('layouts.main')
@section('title', 'Pedro Hilan')

@section('content')

<div id="search-container" class="col-md-12 container-fluid">
    <h1>Busque um projeto</h1>

    <form action="/" method="GET">
        <input type="text" name="search" id="search" class="form-control" placeholder="Busque por projetos, linguagens, frameworks">
    </form>
</div>
<div id="projects-container" class="container-fluid col-md-12">
    @if ($search)
        <h1>Buscando por: {{$search}} ( {{count($projects)}} registro(s) )</h1>
    @else
        <h2>Veja meus projetos ( {{count($projects)}} registro(s) )</h2>
    @endif
    <p>---------------------------</p>
    <div class="row" id="cards-container">
        @foreach ($projects as $project)
            <div class="card col-md-3">
                <img src="/img/projects/{{$project->image}}" title="{{$project->name}}" alt="{{$project->name}}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($project->date)) }}</p>
                    <h5 class="card-title">{{$project->name}}</h5>
                    <a href="{{$project->link}}" class="card-link" target="_blank"><p>{{$project->link}}</p></a>
                    <a href="/projects/{{$project->id}}" class="btn btn-success">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if (count($projects) == 0 && $search)
            <p>Não foi encontrado nenhum projeto com {{$search}}! <a href="/">Ver todos</a> </p>
        @elseif (count($projects) == 0)
            <p>Não existem projetos disponíveis no momento !</p>
        @endif
    </div>
</div>

@endsection