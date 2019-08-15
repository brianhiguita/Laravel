@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-6">
            {{$project->image}}
        </div>
        <div class="col-6">
            {{$project->title}}
            {{$project->description}}
            {{$project->url}}
        </div>
    

        @if (!Auth::guest())
            @if (Auth::user()->id == $project->user->id)
                <div class="float-right">
                    <a href="/profile/{{auth()->user()->id}}/project/{{$project->id}}/edit">edit</a>
                </div>

                <div class="float-right">
                    <form action="/profile/{{auth()->user()->id}}/project/{{$project->id}}" method="POST">
                        @csrf 
                        @method('delete')
                        <input type="Submit" name="submit" value="Delete">
                       
                    </form>
                </div>

            @endif
        @endif


    </div>
</div>

   
      

@endsection