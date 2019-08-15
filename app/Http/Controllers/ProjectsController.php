<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Profile;
use App\User;


class ProjectsController extends Controller
{

public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
   

    public function index($id , $p_id) {

        $user = User::findOrFail($id);
        $project = $user->projects->where('id', $p_id)->first();
        
        return view('project.index', compact('project'));
    }

    public function create() {
        return view('project.create');
    }


    public function store(Request $request)
    {
        $data = request()->validate([
            'image' => 'required|image',
            'title' => 'required',
            'description' => 'required',
            'url' => 'required'
        ]);

        $imagePath = request('image')->store('uploads', 'public');
    
        auth()->user()->projects()->create([
            'title' => $data['description'],
            'description' => $data['description'],
            'image' => $imagePath,
            'url' => $data['url']
        ]);

        $param = auth()->user()->id;
        return redirect('/profile/'.$param)->with('success', 'Project Created');

    }

    public function edit($user, $id){
        
        $project = auth()->user()->projects->where('id', $id)->first();

        return view('project.edit', compact('project'));
    }

    public function update($user_id, $p_id)
    {
      
        $user = User::findOrFail($user_id);

        $project = $user->projects->where('id', $p_id)->first();

        $data = request()->validate([
            'image' => 'required|image',
            'title' => 'required',
            'description' => 'required',
            'url' => 'required'
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $project->image = $imagePath;
        $project->title = request('title');
        $project->description = request('description');
        $project->url = request('url');

        $project->save();

        return redirect('profile/'.$user->id)->with('success', 'Project Updated');

    }


    public function destroy($user_id, $project_id) {
        $user = User::findOrFail($user_id);
        $project = $user->projects->where('id', $project_id)->first();
        $project->delete();
        return redirect('/profile/'.$user_id)->with('success', 'Project Deleted');
    }











}
