@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-8 offset-2">
            @include('../errors')

            <form method="POST" enctype="multipart/form-data" action="/project">
            @csrf


            <p>{{auth()->user()->profile}}</p>

            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control" name="image">
                <small class="form-text text-muted">default image will be used if none is added</small>
            </div>

            <div class="form-group">
                <label for="title">title</label>
                <input class="form-control" type="text" name="title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Project Link</label>
                <input type="text" name="url" class="form-control" placeholder="url...">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>

    </div>



</div>


@endsection