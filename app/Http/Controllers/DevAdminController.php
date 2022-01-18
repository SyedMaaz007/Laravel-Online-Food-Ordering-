<?php

namespace App\Http\Controllers;

use App\Models\DevAdmin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DevAdminController extends Controller
{

    public function index(Request $request)
    {
        if($request->session()->has('DELIVERY_LOGIN')){
            return redirect('dev_admin/dashboard');
        }
        else{
            return view('admin.dev_login');
        }
        return view('admin.dev_login');
    }

    public function dev_auth(Request $request)
    {
        $name=$request->post('name');
        $password=$request->post('password');

        $result=DB::table('delivery_man')->where(['delivery_id'=>$name])->get();
        if(isset($result[0]))
        {
            $db_pass = Crypt::decrypt($result[0]->delivery_pass);
            if($db_pass== $password){
                $request->session()->put('DELIVERY_LOGIN',true);
                $request->session()->put('DELIVERY_NAME',$result[0]->delivery_name);
                $request->session()->put('DELIVERY_ID',$result[0]->delivery_id);
                return redirect('dev_admin/dashboard');
            }else{
                $request->session()->flash('error','Please enter Valid password');
                return redirect('dev_admin');
            }

        }else{
            $request->session()->flash('error','Please enter Valid login details');
            return redirect('dev_admin');
        }
    }

    public function dashboard(Request $request)
    {
        $result['delivery_name'] = $request->session()->get('DELIVERY_NAME');
        $result['delivery_id'] = $request->session()->get('DELIVERY_ID');
        $result['order']=DB::table('orders')
        ->join('restaurants','restaurants.restaurant_name',"=",'orders.res_name')
        ->join('order_details','orders.order_id',"=",'order_details.id')
        ->where(['order_details.delivery_id'=> $result['delivery_id']])
        ->where('order_details.order_status',"!=",'4')
        ->groupBy('orders.order_id')
        ->get();
        $result['order_completed']=DB::table('orders')
        ->join('order_details','orders.order_id',"=",'order_details.id')
        ->where(['order_details.delivery_id'=> $result['delivery_id']])
        ->where(['order_details.order_status'=>'4'])->groupBy('orders.order_id')->get();
        return view('admin.dev_dashboard',$result);
    }
    public function complete(Request $request,$id)
    {

       $arr= DB::table('order_details')
        ->where(['id'=>$id])
        ->update(['order_status'=>'4']);
        $request->session()->flash('message','Ordered Successfully Deliverd');
        return redirect('dev_admin/dashboard');

    }
    public function manage_delivery(Request $request,$id)
    {
            $arr=Order::where(['delivery_id'=>$id])->get();
            $result['delivery_name']=$arr['0']->delivery_name;
            $result['delivery_id']=$arr['0']->delivery_id;
            $result['id']=$arr['0']->id;
            $result['delivery_no']=$arr['0']->delivery_no;
            $result['delivery_address']=$arr['0']->delivery_address;
            $result['delivery_email']=$arr['0']->delivery_email;

        return view('admin.update_delivery',$result);
    }
    public function delivery_update(Request $request)
    {

        $request->validate([

            'delivery_name'=>'required',
            'delivery_email'=>'required|email|unique:delivery_man,delivery_email'.$request->id,
            'delivery_no'=>'required|numeric|digits:10',
            'delivery_id'=>'required|unique:delivery_man,delivery_id,'.$request->id,
            'image'=>'mimes:jpeg,jpg,png,ico',
        ]);


            $model=Order::find($request->id);
            $msg="Profile Updated";

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

        return redirect('dev_admin/dashboard');

    }
}
