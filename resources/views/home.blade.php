@extends('layouts.app')

@section('content')




   <div class="container">
       <div class="row">


    @foreach ($profiles as $profile)

    <div class="col-4">

        <a href="/profile/{{$profile->user_id}}">

            <div class="card">
            
                <div class="profile_image">
                    <img class="w-100" src="/storage/{{$profile->image}}" alt="">
                </div>

                <div class="profile_name pt-3">
                    <h5>{{$profile->user->name}}</h5>
                </div>

            </div>
        
        
        </a>      
        


    </div>

 

    @endforeach


           
       </div>
   </div>



@endsection
