@extends('layouts.app')

@section('content')
    <div class="container">
        <?php

        use App\User;
        use Illuminate\Database\Eloquent\Collection;

        $users = App\User::where('id',$id)->get();

        foreach ($users as $user)
        {
            $userID = $user->id;
        }
        //this is the one!

        ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>{{$user->name}}'s Profile</h4>
                        <a href="{{ URL::previous() }}" id="profile-return" class="btn btn-default"> Go back </a>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="profile-image">

                                <?php
                                    $url= asset('images/' . $user->picfile);
                                    echo "<img style=\"width: 150px; height:150px; border-radius: 50%;
                                                        position:relative;display:block;left:40px;\"
                                           src='$url'>";
                                ?>
                            </div>



                            <div class="about">

                                <h3>About Me</h3><br>
                                <p>{{$user->about}}</p>

                                <hr>
                            </div>
                        <div>Date created:&nbsp;{{str_limit($user->created_at, $limit = 10, $end='')}}</div>
                                <?php

                                if(Auth::user() != null){



                                if($userID == Auth::user()->id){
                                    echo"<a href='/edit-profile' class='btn btn-primary'> Edit Profile </a>";
                                }
                                }

                                ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection