@extends('layouts.main')
@section('title', 'Dashboard')
    
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus projetos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-projects-container">
    @if (count($projects) > 0 )
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Link</th>
                    <th scope="col">Data de realização</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td scope="row">{{$loop->index+1}}</td>
                        <td><a href="/projects/{{$project->id}}">{{$project->name}}</a></td>
                        <td>{{$project->link}}</td>
                        <td>{{ date('d/m/Y', strtotime($project->date)) }}</td>
                        <td>
                            <a href="/projects/edit/{{$project->id}}" class="btn btn-info edit-info-btn"><ion-icon name="create-outline"></ion-icon>Editar</a> 
                            <form action="/projects/{{$project->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                            </form>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não tem projetos <a href="/projects/create">Criar projeto</a> </p>
    @endif
</div>

@endsection