<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h1>{{$article->Title}}</h1>
<?php
if($article->Picfile != null)
{
    $url = asset('images/' . $article->Picfile);
    echo "<img src='$url' height=\"400\" width=\"640\"/>";
}?>

<p>{{$article->Text}}</p><br><br>
<p><small><small>Created: {{$article->creation_date}} <br>Last updated: {{$article->last_update}}<br>Author: {{$article->author}}</small></small></p>

</body>
</html>