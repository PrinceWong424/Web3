<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\PW;
use App\User;
use View;
use Image;
use Auth;
use PDF;

class CreatesController extends Controller
{
    public function  home(){
        $pw = PW::paginate(5);

        return view('home',['pw'=> $pw]);
    }
    public function article($id){
        $pw = PW::find($id);
        return view('article', ['pw'=> $pw])->with('id',$id);
    }

    //add article
    public function add(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required'
        ]);
        $pw = new PW;


        //image upload
        if ($request->hasFile('image')){
            $file = $request->file('image');

            //Unique image filename
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $location = public_path('images/' . $filename);

            //resize image, and save
            $watermark = Image::make(public_path('/images/fontyslogo.png'));
            Image::make($file)->resize(640, 400)->insert($watermark, 'bottom-right', 10, 10)->save($location);

            $pw->Picfile = $filename;
        }


        //$filename = "ProfilePicture/".$id.'-Pic.jpg';


        /*if($file != null)
        {
            $filename = "ArticlePicture/".$request['title'].".".$file->getClientOriginalExtension();
            Storage::disk('public')->put($filename,File::get($file));
            $pw->Picfile = $filename;

        }*/

        $pw->title = $request->input('title');
        $pw->text = $request->input('text');
        $pw->author = $request->input('author');

        $pw->save();

        return redirect('/')->with('status','Article Created');
    }
    public function update($id){
        $pw = PW::find($id);
        return view('update', ['pw'=> $pw]);
    }

    public function edit(Request $request,$id){
        $this->validate($request,[
            'title' => 'required',
            'text' => 'required'
        ]);
        $data = array(
            'title' =>$request->input('title'),
            'text' =>$request->input('text')
        );
        PW::where('id',$id)
            ->update($data);

        return redirect('/')->with('status','Article Updated');
    }

    public function editPicture($id){
        $user = User::find($id);
        return view('uploadPicture',['user'=>$user]);
    }
    

    public function updateProfile(Request $request){
        $this->validate($request,[
            'about' => 'required',

        ]);


        if ($request->hasFile('image')){
            $file = $request->file('image');

            //Unique image filename
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $location = public_path('images/' . $filename);

            //resize image, and save
            Image::make($file)->resize(150, 150)->save($location);

            Auth::user()->picfile = $filename;
        }else{
            $filename = Auth::user()->picfile;
        }
        $data = array(
            'about' =>$request->input('about'),
            'picfile' => $filename
        );
        User::where('id',Auth::user()->id)
            ->update($data);

        return redirect('/profile/'.Auth::user()->id)->with('status','Profile updated'); //profile should be returned with a id.
    }
    public function delete($id){
        PW::where('id',$id)
            ->delete();
        return redirect('/')->with('status','Article deleted');
    }

    public function profileFinder($id)
    {

    }

    public function generatePDF($id){
        $article = PW::find($id);

        $pdf = PDF::loadView('pdf',compact('article'));

        return $pdf->download('Article.pdf');

    }

    /*public function updatePicture(Request $request,$id){
        $this->validate($request,[
            'picture' => 'required'
        ]);

          $file = $request->file('picture');

        //$filename = "ProfilePicture/".$id.'-Pic.jpg';
        $filename = "ProfilePicture/".$id.".".$file->getClientOriginalExtension();

        if($file != null)
        {
            Storage::disk('public')->put($filename,File::get($file));

            $data = array(
                'picfile' =>$filename
            );
            User::where('id',$id)
                ->update($data);
        }



        return redirect('/profile')->with('status','Picture uploaded');
    }*/



}
