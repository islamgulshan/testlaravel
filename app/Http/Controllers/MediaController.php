<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Session;
class MediaController extends Controller
{
	/**
	* Display a listing of the Media.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $Photos =  Photo::all();
        return view('admin.media.index',compact('Photos'));
        //
    }


    public function create () {

    	return view('admin.media.create',compact('Photos'));
    	
    }

    public function store(Request $request){

    	if($file=$request->file('file')){

            $name=time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

        
            //return 'photo id is ok';
        }
    }

    public function destroy($id){
      	
      	$Photo =  Photo::findOrFail($id);
       
        unlink(public_path($Photo->file));

        $Photo->delete();

        Session::flash('delete_photo','Photo has been deleted successfully !');

        return redirect('/admin/media');
    }
}
