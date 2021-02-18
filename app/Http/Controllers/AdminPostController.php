<?php
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Post;
use App\Photo;
use App\Category;
use Auth;
use App\Http\Requests\CreatePostRequests;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::all();
        return view('admin.posts.index',compact('posts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category  = Category::pluck('name','id')->all();  
        return view('admin.posts.create',compact('Category'));

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequests $request)
    {

        $user = Auth::user();
        
        $input = $request->all();

        if($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']  = $photo->id;

            
            //return 'photo id is ok';
        }

        $user->posts()->create($input);


        return redirect('/admin/posts');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo $id;exit;
        $post = Post::findOrFail($id);
        $Category  = Category::pluck('name','id')->all();  
        return view('admin.posts.edit',compact('Category','post'));

        //return view('admin.posts.edit');

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = Auth::user();
        
        //$input = $request->except('_token');

        $input = $request->all();  
        
        $input = $request->except(['_token', '_method' ]);

        if($file=$request->file('photo_id')){
            //echo 'da';exit;
            $name=time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']  = $photo->id;

            
            //return 'photo id is ok';
        }
        //echo 'da';exit;
        $user->posts()->whereId($id)->first()->update($input);

        return redirect('/admin/posts');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::findOrFail($id);
        
        unlink(public_path().$post->photo->file);

        $post->delete();

        return redirect('/admin/posts');

        //
    }
}
