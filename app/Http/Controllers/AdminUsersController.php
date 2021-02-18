<?php


namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Photo;

use App\Http\Requests\UserRequests;
use App\Http\Requests\UserEditRequests;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();

       // print_r($users);exit();

        return view('admin.users.index',compact('users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $roles  = Role::pluck('name','id')->all();  
        
        //print_r($roles);exit();


        return view('admin.users.create',compact('roles'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequests $request)
    {

        if(trim($request->password)=='')
        {
            $input = $request->except();

        }else{

            $input = $request->all();
            $input['password']  = bcrypt($input['password']);

    
        }

        
        

        if($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id']  = $photo->id;

            
            //return 'photo id is ok';
        }

        
        User::create($input);


        return redirect('/admin/user');
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
       
        $user = User::findOrFail($id);

        $roles  = Role::pluck('name','id')->all();  
        

     

        return view('admin.users.edit',compact('user','roles'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequests $request, $id)
    {

        $user = User::findOrFail($id);

        $input = $request->all();
        
        if($file=$request->file('photo_id')){
            
            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo=Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;

        }

        if($input['password'])
        {
            $input['password'];
        }
        else{
            $input['password']    =$user->password;
        }

        $user->update($input);

        return redirect('/admin/user');


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
       $user =  User::findOrFail($id);

       
       if(isset($user->photo))
       {
         unlink(public_path($user->photo->file));
       
       }

       //unlink(public_path('images/'.$user->))

        Session::flash('delete_user','user has been deleted successfully !');

        return redirect('/admin/user');
        //
    }
}
