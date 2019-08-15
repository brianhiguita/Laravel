@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="jumbotron w-100">

        <h1>{{$user->name}}</h1>

        @if ($user->profile)

        @if (!Auth::guest())
            @if (Auth::user()->id == $user->id)
                <div class="float-right">
                        <a href="/profile/{{$user->id}}/edit" class="btn btn-primary">Edit profile</a>
                </div>
            @endif
        @endif



            <img src="/storage/{{$user->profile->image}}" alt="">


            <p class="lead">{{$user->profile->description}}</p>

            <a href="{{$user->profile->url}}">{{$user->profile->url}}</a>

            <hr class="my-4">
            <div>
            <p>contact number : 07925632456</a>
            </div>
            <div class="pt-4">
            <a class="" href="#" role="button">email :  {{$user->email}}</a>
            </div>


            




           

            @foreach ($user->projects as $project)
            
                title : {{$project->title}}
                <br>    
                descrition : {{$project->description}}
                <br>
                image : {{$project->image}}
                <br>

                <a href="/profile/{{$user->id}}/project/{{$project->id}}">link</a>
            @endforeach
            

        @else

            {{-- create profile if user doesnt have one  --}}
            <div class="float-right">
                <a href="/profile/{{$user->id}}/create" class="btn btn-primary">create profile</a>
            </div>
        @endif


        </div>
    </div>

    <div class="row">   

    @if (!Auth::guest())
        @if (Auth::user()->id == $user->id)
            @if ($user->profile)
                <a href="/project/create">create new post</a>
            @endif
        @endif
    @endif
     

    </div>
       
       
        
   
</div>
@endsection