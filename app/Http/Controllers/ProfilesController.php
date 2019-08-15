<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Profile;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }


    public function index($id) {

        $user = User::findOrFail($id);

        return view('profile.index', compact('user'));
    }

    public function create($user) {
        return view('profile.create');
    }

    
    public function store(Request $request)
    {

        $data = request()->validate([
            'image' => 'required|image',
            'description' => 'required',
            'url' => 'required'
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        auth()->user()->profile()->create([
            'description' => $data['description'],
            'image' => $imagePath,
            'url' => $data['url']
        ]);

        $param = auth()->user()->id;
        return redirect('/profile/'.$param)->with('success', 'Profile Created');

    }

    public function edit($user){
        return view('profile.edit');
    }

    public function update(Request $request, Profile $profile)
    {

        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        $data = request()->validate([
            'image' => 'required|image',
            'description' => 'required',
            'url' => 'required'
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $user->profile->image = $imagePath;
        $user->profile->description = request('description');
        $user->profile->url = request('url');

        $user->profile->save();

        return redirect('profile/'.$user->id)->with('success', 'Profile Updated');

    }

}
