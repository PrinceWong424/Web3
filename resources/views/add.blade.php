@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="/" class="btn btn-default">  Go back  </a></div>

                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('/insert')}}">
                            {{ csrf_field() }}
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                @endforeach
                            @endif

                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" id="title" name="title" placeholder="Title">


                                </div>
                            </div>


                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Upload Featured Image</label>

                                <div class="col-md-6">
                                <input type="file" name="image" id="image">
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="text" class="col-md-4 control-label">Content</label>

                                <div class="col-md-6">
                                    <textarea name="text" rows="5" cols="47">


                                    </textarea>

                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" id="author" name="author" value="{{ Auth::user()->name }}">
                                        Submit
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
