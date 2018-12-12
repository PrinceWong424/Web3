<?php
/**
 * Created by PhpStorm.
 * User: PrinceWong
 * Date: 2017/12/4
 * Time: 3:14
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showIndex()
    {
        return view('index');
    }
}
