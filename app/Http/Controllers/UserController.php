<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userm; //import user model to use its ORM methods
use App\Models\Prodm;
class UserController extends Controller
{
    //
    public function index()
    {
         // Check if the user is authenticated
    if (auth()->check()) {
        // Retrieve the authenticated user's ID
        $userId = auth()->id();
    } else {
        // Set $userId to null or handle the case where the user is not authenticated
        $userId = null;
    }

        $users = Userm::all();
        //dd($users->toarray());
        return view('viewusers')->with(compact('users','userId'));
    }

    public function store(Request $request)
    {   

        // //receive file data
        $file = $request->file('fileupload');

        if($file)
        {
            $filename = $file->getClientOriginalName();
            $path = "uploads/";
            $file->move($path,$filename);
            //echo "File upload has file";
            // echo $file->getClientOriginalName();
            // echo "<br/>";
            // echo $file->getClientOriginalExtension();
            // echo "<br/>";
            // echo $file->getMimeType();               //જો બકા 😎
            // echo "<br/>";
            // echo $file->getSize();
        }
        else
           $filename = "avatar.png";



        $data = Userm::where('email',$request->email)->first();
        if($data)
            return back()->withErrors("Email Already Exists");
        else
        {
            $user = new Userm;
            
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->usertype = $request->usertype;
            $user->profilephoto = $filename;
            $user->save();
            
            return redirect('/viewusers');
        }
    }
    public function delete(Request $r)
    {
       // $id=$r->post('id');
        Userm::where('userid',$r->id)->update([
            'isactive'=>'0'
        ]);
        return redirect('/viewusers');
    }
    public function edit(Request $r)
    {
        
        $userdata=Userm::where('userid',$r->id)->first();
        return view('edituser')->with(compact('userdata'));
        /*$r->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:userm,email',
            'password' => 'required',
            'usertype' => 'required',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust maximum file size and allowed file types as needed
        ]);*/
    }
    public function update(Request $r)
    {

        $file = $r->file('fileupload');
        $path = "uploads/";
        $currentphoto = $r->currentphoto;
        if($r->file('fileupload'))
        {
            $filename = $file->getClientOriginalName();
            $file->move($path,$filename);
        }
        else
            $filename = $currentphoto;


        $status=$r->currentstatus;
        if($r->userstatus=="Active")
            $status=1;
        else if($r->userstatus="Inactive")
            $status=0;
        else    
            $status=$r->currentstatus;

        $usertype=$r->currentusertype;
        if($r->usertype=="Admin")
            $usertype="Admin";
        else if($r->usertype=="Customer")
            $usertype="Customer";
        else
            $usertype=$r->currentusertype;

        Userm::where('userid',$r->userid)->update([
            "fullname"=>$r->fullname,
            "email"=>$r->email,
            "password"=>$r->password,
            "usertype"=>$usertype,
            "isactive"=>$status,
            "profilephoto"=>$filename
        ]);
        return redirect('/viewusers');
    }

    public function register(Request $request)
    {
        $file = $request->file('fileupload');

        if($file)
        {
            $filename = $file->getClientOriginalName();
            $path = "uploads/";
            $file->move($path,$filename);
            //echo "File upload has file";
            // echo $file->getClientOriginalName();
            // echo "<br/>";
            // echo $file->getClientOriginalExtension();
            // echo "<br/>";
            // echo $file->getMimeType();               //જો બકા 😎
            // echo "<br/>";
            // echo $file->getSize();
        }
        else
           $filename = "avatar.png";


    Userm::create([
        'profilephoto' => $filename,
        'fullname' => $request->input('fullname'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'isactive' => true,
        'usertype' => 'customer',
    ]);

    return redirect('/login');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }
}