<?php

namespace App\Http\Controllers;

use App\Models\Res_admin;
use App\Models\Restaurants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('RES_LOGIN')){
            return redirect('res_admin/dashboard');
        }
        else{
            return view('admin.res_login');
        }
        return view('admin.res_login');
    }

    public function res_auth(Request $request)
    {
        $name=$request->post('name');
        $password=$request->post('password');

        $result=DB::table('restaurants')->where(['res_id'=>$name])->get();
        if(isset($result[0]))
        {
            $db_pass = Crypt::decrypt($result[0]->res_pass);
            if($db_pass== $password){
                $request->session()->put('RES_LOGIN',true);
                $request->session()->put('RES_NAME',$result[0]->restaurant_name);
                $request->session()->put('RES_ID',$result[0]->res_id);
                return redirect('res_admin/dashboard');
            }else{
                $request->session()->flash('error','Please enter Valid password');
                return redirect('res_admin');
            }

        }else{
            $request->session()->flash('error','Please enter Valid login details');
            return redirect('res_admin');
        }
    }


    public function dashboard(Request $request)
    {
        $result['res_name'] = $request->session()->get('RES_NAME');
        $result['res_id'] = $request->session()->get('RES_ID');
        $result['order']=DB::table('orders')
        ->join('order_details','orders.order_id',"=",'order_details.id')
        ->where(['orders.res_id'=> $result['res_id']])
        ->where('order_details.order_status',"!=",'4')
        ->get();
        $result['order_completed']=DB::table('orders')
        ->join('order_details','orders.order_id',"=",'order_details.id')
        ->where(['orders.res_id'=> $result['res_id']])
        ->where(['order_details.order_status'=>'4'])->get();
        $result['res']=DB::table('restaurants')->get();
        $result['cus']=DB::table('customers')->get();
        return view('admin.res_dashboard',$result);
    }

    public function order_process(Request $request,$id)
    {
        $result['res_name'] = $request->session()->get('RES_NAME');
        $result['res_id'] = $request->session()->get('RES_ID');
        $arr=DB::table('order_details')
        ->where(['id'=>$id])
        ->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->number;
        $result['email']=$arr['0']->email;
        $result['address']=$arr['0']->address;
        $result['instruction']=$arr['0']->instruction;
        $result['total']=$arr['0']->total_price;
        $result['payment']=$arr['0']->payment_type;
        $result['time']=$arr['0']->added_on;
        $result['status']=$arr['0']->order_status;
        $result['orders']=DB::table('orders')
        ->join('order_details','orders.order_id',"=",'order_details.id')
        ->where(['order_id'=> $id])
        ->get();
        $result['order_status']=DB::table('order_status')->get();
        return view('admin.order_process',$result);
    }
    public function order_status(Request $request)
    {

        DB::table('order_details')
        ->where(['id'=>$request->order_id])
        ->update(['order_status'=>$request->order_status]);
        $request->session()->flash('message','Status Updated');
        return redirect('res_admin/manage_order/'.$request->order_id);

    }
    public function manage_res(Request $request,$id)
    {
        $result['res_name'] = $request->session()->get('RES_NAME');
        $result['res_id'] = $request->session()->get('RES_ID');
            $arr=Restaurants::where(['res_id'=>$id])->get();
            $result['restaurant_name']=$arr['0']->restaurant_name;
            $result['res_id']=$arr['0']->res_id;
            $result['id']=$arr['0']->id;
            $result['restaurant_loc']=$arr['0']->restaurant_loc;
            $result['address']=$arr['0']->res_address;
            $result['food_catagory']=$arr['0']->food_catagory;
            $result['trending']=$arr['0']->trending;
            $result['res_sign']=$arr['0']->res_sign;
            $result['res_pass']=$arr['0']->res_pass;

        return view('admin.update_restaurant',$result);
    }
    public function res_update(Request $request)
    {
        $result['res_name'] = $request->session()->get('RES_NAME');
        $result['res_id'] = $request->session()->get('RES_ID');
        $request->validate([
            'image'=>'mimes:jpeg,jpg,png,ico',
            'restaurant_name'=>'required',
            'address'=>'required',
            'restaurant_loc'=>'required',
            'res_id'=>'required|unique:restaurants,res_id,'.$request->id,
        ]);

            $model=Restaurants::find($request->id);
            $msg="Reataurant Updated";

        if($request->hasFile('image'))
        {

            Storage::delete('/public/media/Restaurants/'.$model->image);
            $file=$request->file('image');
            $ext=$file->extension();
            $image=time().'.'.$ext;
            $file->storeAs('/public/media/Restaurants',$image);
            $model->image=$image;
        }
        $model->restaurant_name=$request->restaurant_name;
        $model->restaurant_loc=$request->restaurant_loc;
        $model->res_id=$request->res_id;
        $model->food_catagory=$request->food_catagory;
        $model->res_address=$request->address;
        $model->status=1;
        $model->trending=$request->trending;
        $model->res_sign=$request->res_sign;

        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('res_admin/dashboard');

    }

}
