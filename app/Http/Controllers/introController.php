<?php
/**
 * Created by PhpStorm.
 * User: PrinceWong
 * Date: 2017/12/4
 * Time: 2:55
 */

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class introController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        return view('intro');
    }
}