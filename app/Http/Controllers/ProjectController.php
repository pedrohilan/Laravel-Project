<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function index(){
        
        $search = request('search');

        if($search){
            $projects = Project::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $projects = Project::all();
        }

        return view('welcome', ['projects' => $projects, 'search' => $search]);
    }

    public function create(){
        return view('projects.create');
    }

    public function store(Request $request){
        
        $projects = new Project;

        $projects->name = $request->name;
        $projects->date = $request->date;
        $projects->description =  $request->description;
        $projects->link =  $request->link;
        $projects->private =  $request->private;
        $projects->languages = $request->languages;

        //Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $request_Image = $request->image;
            $extension = $request_Image->extension();
            $img_name = md5($request_Image->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $request->image->move(public_path('/img/projects'), $img_name);
            $projects->image = $img_name;
        }else{
            $projects->image = "default.png";
        }
        //

        $user = auth()->user();
        $projects->user_id = $user->id;

        $projects->save();
        return redirect('/')->with('msg', 'Projeto criado com sucesso!');     
    }

    public function show($id){
        
        $project = Project::findOrFail($id);

        $projectOwner = User::where('id', $project->user_id)->first()->toArray();

        return view('projects.show', ['project' => $project, 'projectOwner' => $projectOwner]);
    }

    public function dashboard(){
        
        $user = auth()->user();
        $projects = $user->projects;
        return view('projects.dashboard', ['projects' => $projects]); 
    }

    public function destroy($id){
        
        $project = Project::findOrFail($id);
        File::delete( public_path('/img/projects/'.$project->image) );
        $project->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso');
    }

    public function edit($id){
        
        $project = Project::findOrFail($id);

        return view('projects.edit', ['project' => $project]);
    }

    public function update(Request $request){
        $data = $request->all();
        //Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $request_Image = $request->image;
            $extension = $request_Image->extension();
            $img_name = md5($request_Image->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $request->image->move(public_path('/img/projects'), $img_name);
            $data['image'] = $img_name;
        }else{
            $data['image'] = "default.png";
        }
        //
        Project::findOrFail($request->id)->update($data);
    
        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso');
    }
}