<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    public function index()
    {
        $request['data']=Order::all();
        return view('admin.delivery',$request);
    }
    public function delivery_signup(Request $request)
    {

        $request->validate([

            'delivery_name'=>'required',
            'delivery_id'=>'required|unique:delivery_man,delivery_id,'.$request->id,
            'delivery_email'=>'required|email|unique:delivery_man,delivery_email,'.$request->id,
            'delivery_no'=>'required|numeric|digits:10',
            'delivery_address'=>'required',
            'image'=>'mimes:jpeg,jpg,png,ico',
        ]);


        if($request->id>0)
        {
            $model=Order::find($request->id);
            $msg="Profile Updated";
            $model->delivery_pass=$model->delivery_pass;
        }
        else
        {
            $model = new Order();
            $msg="Delivery Man Added";
            $model->delivery_pass=Crypt::encrypt($request->delivery_pass);
        }
        if($request->hasFile('image'))
        {
            Storage::delete('/public/media/delivery/'.$model->delivery_img);
            $file=$request->file('image');
            $ext=$file->extension();
            $image=time().'.'.$ext;
            $file->storeAs('/public/media/delivery',$image);
            $model->delivery_img=$image;
        }


        $model->delivery_name=$request->delivery_name;
        $model->delivery_id=$request->delivery_id;
        $model->delivery_address=$request->delivery_address;
        $model->delivery_email=$request->delivery_email;
        $model->delivery_no=$request->delivery_no;

        $model->save();
        $request->session()->flash('message',$msg);

        return redirect('admin/delivery');

    }
    public function manage_delivery(Request $request,$id='')
    {
        if($id>0){
            $arr=Order::where(['id'=>$id])->get();
            $result['delivery_name']=$arr['0']->delivery_name;
            $result['delivery_id']=$arr['0']->delivery_id;
            $result['id']=$arr['0']->id;
            $result['delivery_no']=$arr['0']->delivery_no;
            $result['delivery_address']=$arr['0']->delivery_address;
            $result['delivery_email']=$arr['0']->delivery_email;
            $result['delivery_pass']=$arr['0']->delivery_pass;


        }
        else{
            $result['delivery_name']='';
            $result['delivery_id']='';
            $result['id']='';
            $result['delivery_no']='';
            $result['delivery_address']='';
            $result['delivery_email']='';
            $result['delivery_pass']='';

        }

        return view('admin.add_delivery',$result);
    }
}
