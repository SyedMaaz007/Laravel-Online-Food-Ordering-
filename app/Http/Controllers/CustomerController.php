<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
class CustomerController extends Controller
{
    public function user_signup(Request $request)
    {

        $request->validate([

            'user_name'=>'required',
            'user_email'=>'required|email|unique:customers,user_email,'.$request->id,
            'user_no'=>'required|numeric|digits:10|unique:customers,user_no,'.$request->id,
            'user_pass'=>'required',
        ]);


            $model = new Customer();
            $msg="Sign Up Successfull";


        $model->user_name=$request->user_name;
        $model->user_email=$request->user_email;
        $model->user_no=$request->user_no;
        
        $model->user_pass=Crypt::encrypt($request->user_pass);
        $model->save();
        $request->session()->flash('message',$msg);
        $request->session()->put('USER_LOGIN',true);
        $request->session()->put('USER_ID',$request->id);
        $request->session()->put('USER_EMAIL',$request->user_email);
        $request->session()->put('USER_NAME',$request->user_name);
        return redirect('front/profile');

    }
    public function update_process(Request $request)
    {

        $request->validate([
            'image'=>'mimes:jpeg,jpg,png,ico',
        ]);
            $model=Customer::find($request->id);

            if($request->hasFile('image'))
            {
                Storage::delete('/public/media/Customers/'.$model->user_img);
                $file=$request->file('image');
                $ext=$file->extension();
                $image=time().'.'.$ext;
                $file->storeAs('/public/media/Customers',$image);
                $model->user_img=$image;
            }
        $model->user_name=$request->user_name;
        $model->user_email=$request->user_email;
        $model->user_no=$request->user_no;
        $model->first_name=$request->first_name;
        $model->last_name=$request->last_name;
        $model->save();
        $msg="Profile Updated";

        $request->session()->flash('message',$msg);
        return redirect('front/profile/'.$request->id);

    }
}
