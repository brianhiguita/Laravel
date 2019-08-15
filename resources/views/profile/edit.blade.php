@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-8 offset-2">

            @include('../errors')
  
            <form method="POST" enctype="multipart/form-data" action="/profile/{{auth()->user()->id}}">
            @csrf
            @method('PATCH')

        
            <div class="form-group">
                <label for="image">image</label>
            <input type="file" class="form-control" name="image">
                <small class="form-text text-muted">default image will be used if none is added</small>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{auth()->user()->profile->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Portfolio URL</label>
                <input type="text" name="url" value="{{auth()->user()->profile->url}}" class="form-control" placeholder="url...">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>

            </form>

            

        </div>

    </div>



</div>


@endsection