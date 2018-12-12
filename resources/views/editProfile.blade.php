@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="/" class="btn btn-default"> Go back </a>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/update-profile">
                            {{ csrf_field() }}
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                @endforeach
                            @endif


                                <div class="profile-image">
                                 <?php
                                    $url= asset('images/' . Auth::user()->picfile);
                                    echo "<img style=\"width: 150px; height:150px; border-radius: 50%;
                                 position:relative; display:block; left:80px;\" src='$url'>";
                                 ?>

                                 <!--src="<?php echo Storage::url(Auth::user()->picfile); ?>">-->
                                     <div class="form-group">
                                         <label for="title" class="col-md-4 control-label">Upload Profile Picture</label>

                                         <div class="col-md-6">
                                             <input type="file" name="image" id="image" value="<?php Auth::user()->picfile?>">
                                         </div>

                                     </div>
                                </div>


                                <div class="form-group">
                                    <label for="about" class="col-md-4 control-label"><h4>About yourself</h4></label>

                                    <div class="col-md-6">
                                       <textarea name="about" rows="5" cols="47" ><?php echo Auth::user()->about?>


                                    </textarea>


                                    </div>
                                </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
