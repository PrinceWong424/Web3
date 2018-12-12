@extends('layouts.app')

@section('content')
    <?php $Adminswitch = false;
    if(auth::check())
    {
        if(auth::user()->role == 'admin')
        { $Adminswitch = true;}
    }?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  ><h4>Dashboard</h4>

                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!--<input type="checkbox" onclick="<?php function($switch){$switch=!$switch;} ?>" name="AuthorPicker" id="$AuthorPicker"> Only show my article-->

                        <?php


                        use App\PW;
                        use App\User;

                        //$switch = false;

                        echo '<table class="table table-hover"> <tr><th>Title</th> <th></th><th></th><th></th></tr>';

                        $Admin = App\User::where('role','admin')->get();
                        foreach ($Admin as $admin){

                        }

                         if($Adminswitch){

                             $articles = App\PW::all();

                             foreach ($articles as $article)
                             {
                                 if($article->author == $admin->name){
                                     /*
                                      if($article->author == $admin->name)
                                 {
                                     echo "<tr><td style='color: red;' title='This is a administrative article'> &#9733; $article->Title </td>";
                                 }
                                 else{
                                     echo "<tr> <td> <p> $article->Title </p></td>";
                                 }
                                     */
                                     echo "<tr><td style='color: red;' title='This is a administrative article'> &#9733; $article->Title </td>";

                                 }
                                 else{
                                     echo "<tr><td> <p>$article->Title</p> </td>";
                                 }
                                 echo "
                                           <td><a href='/article/{$article->id}' class='btn btn-primary btn-sm'> View </a></td>
                                           <td><a href='/update/{$article->id}' class='btn btn-warning btn-sm'> Update </a></td>
                                           <td><a href='/delete/{$article->id}' class='btn btn-danger btn-sm'> Delete </a></td>
                                       </tr> ";
                             }
                             echo"</table>";


                         }else{

                             $articles = App\PW::paginate(5);

                             foreach ($articles as $article) {


                                 if($article->author == $admin->name)
                                 {
                                     echo "<tr><td style='color: red;' title='This is a administrative article'> &#9733; $article->Title </td>";
                                 }
                                 else{
                                     echo "<tr> <td> <p> $article->Title </p></td>";
                                 }
                                 echo "
                                       <td><a href='/article/{$article->id}' class='btn btn-primary btn-sm'> View </a></td>";
                                 if(Auth::check()){
                                     if($article->author == Auth::user()->name ){
                                         echo "<td><a href='/update/{$article->id}' class='btn btn-warning btn-sm'> Update </a></td>
                                       <td><a href='/delete/{$article->id}' class='btn btn-danger btn-sm'> Delete </a></td>";
                                     }else{
                                         echo "<td></td><td></td>";
                                     }
                                     echo "</tr> ";
                                 }else{
                                     echo "<td></td><td></td>";
                                 }

                             }
                             echo"</table>";
                         }



                        ?>

                </div>
                <div class="text-center">
                    {!! $pw->links() !!}
                </div>
                <div class="panel-footer">
                    <?php


                        if(Auth::check()){
                            if($Adminswitch){ echo"<a  href='/add' class='btn btn-primary active'>Create Administrative Article</a>";}
                            else { echo"<a  href='/add' class='btn btn-primary active'>Create Article</a>";}
                        }else{
                            echo"<button class='btn btn-primary disabled'>Login to create an article</button>";
                        }
                    ?>
                    

                </div>


            </div>
        </div>
    </div>
</div>
    <div id="footer"></div>
@endsection
