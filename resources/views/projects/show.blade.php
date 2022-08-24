@extends('layouts.main')
@section('title', $project->name)
    
@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/projects/{{$project->image}}" class="img-fluid" alt="{{$project->name}}" title="{{$project->name}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$project->name}}</h1>
            <p class="project-link"><ion-icon name="link-outline"></ion-icon><a href="{{$project->link}}" target="_blank">{{$project->link}}</a></p>
            <p class="project-date"><ion-icon name="calendar-outline"></ion-icon>{{date('d/m/Y', strtotime($project->date))}}</p>
            <p class="project-date"><ion-icon name="person-outline"></ion-icon>{{ $projectOwner['name'] }}</p>
            <br>
            <h3>Foi utilizado no projeto:</h3>
            <ul id="languages-list">
                @foreach ($project->languages as $language)
                    <li> <ion-icon name="caret-forward-outline"></ion-icon> <span>{{$language}}</span> </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o projeto:</h3>
            <pre id="project-description">{{$project->description}}</pre>
        </div>
    </div>
</div>

@endsection