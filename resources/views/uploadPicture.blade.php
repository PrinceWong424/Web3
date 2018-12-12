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

                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('/uploadPicture', array($user->id))}}">
                            <label> select image to upload</label>

                            <input type="file" name="picture" id="picture">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="btn btn-primary" type="submit" value="upload" name="submit">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
