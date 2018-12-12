@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="/" class="btn btn-default"> Go back </a></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <?php

                        use App\PW;
                        use App\User;
                        use Illuminate\Support\Facades\Storage;


                        $articles = App\PW::where('id',$id)->get();


                        foreach ($articles as $article) {
                            echo "<h1>$article->Title</h1>";
                            $authors = App\User::where('name',$article->author)->get();
                            foreach ($authors as $author){
                                $authorId = $author->id;
                            }


                            if($article->Picfile != null)
                            {
                                //echo "<img src=\"{{asset('images/' . $article->Picfile)}}\" height=\"480\" width=\"640\" />";

                                $url = asset('images/' . $article->Picfile);
                                //$url = Storage::url($article->Picfile);
                                echo "<img src='$url' height=\"400\" width=\"640\"/>";

                            }

                            echo "<p>$article->Text</p><br><br>";
                            echo "<p><small><small>Created: $article->creation_date <br>Last updated: $article->last_update<br><a href='/profile/{$authorId}'>Author: $article->author</a></small></small></p>";
                            echo "<a href='/generatePDF/$article->id'>Download this article as PDF</a>";


                        }
                        ?>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h3 class="comment-title">{{$pw->comments()->count()}} Comments</h3>
                            @foreach($pw->comments as $comment)

                                <div class="comment">
                                    <div class="author-info">
                                        <?php
                                            $authors = App\User::where('name', $comment->name)->get();
                                            foreach($authors as $author){
                                                $image = $author->picfile;
                                                $authorId = $author->id;
                                            }

                                            $url= asset('images/' . $image);
                                        echo "<a href='/profile/{$authorId}'><img src='$url' class='author-image'></a>";

                                        ?>

                                        <div class="author-name">
                                            <h4>{{$comment->name}}</h4>
                                            <p class="author-timestamp">Posted on: {{date('F nS, Y - G:i',strtotime($comment->created_at))}}</p>
                                        </div>

                                    </div>
                                    <div class="comment-content">
                                        {{$comment->comment}}
                                    </div>
                                </div>
                                @endforeach

                        </div>
                    </div>

                    <div class="row">
                        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top:10px;">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('/comments', array($pw->id))}}">
                                {{ csrf_field() }}
                                <div class="row">

                                    <hr>
                                    <div class="col-md-12">
                                        <label for='comment' class='col-md-4 control-label'>Leave A Comment</label>
                                        <?php
                                        if(Auth::check()){
                                        echo "<textarea class='form-control' id='comment' name='comment'>
                                            </textarea>";
                                        $userId = Auth::user()->name;
                                        echo "<button type='submit' class='btn btn-success btn-block' style='margin-top:10px; margin-bottom:10px;' id='name' name='name' value='$userId'>
                                             Submit Comment
                                            </button>";}

                                        else{
                                            echo"<textarea class='form-control' disabled></textarea>";
                                            echo"<button class='btn btn-primary btn-block disabled' style='margin-top:10px; margin-bottn:10px;'>Login to comment</button>";
                                        }
                                         ?>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection