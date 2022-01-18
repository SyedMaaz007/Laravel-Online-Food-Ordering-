<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\menu;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }
        else{
            return view('admin.login');
        }
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $name=$request->post('name');
        $password=$request->post('password');

        $result=Admin::where(['name'=>$name])->first();
        if($result){
            if(Hash::check($password,$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error','Please enter Valid password');
                return redirect('admin');
            }

        }else{
            $request->session()->flash('error','Please enter Valid login details');
            return redirect('admin');
        }
    }
    public function dashboard()
    {
        $result['all_res']=DB::table('restaurants')->count('id');
        $result['order_price']=DB::table('order_details')->sum('total_price');
        $result['orders']=DB::table('order_details')->count('id');
        $result['customer']=DB::table('customers')->count('id');
        $result['order']=DB::table('order_details')->get();
        $result['res']=DB::table('restaurants')->get();
        $result['cus']=DB::table('customers')->get();

        return view('admin.dashboard',$result);
    }
    public function menu()
    {
        $request['data']=menu::all();
        return view('admin.menu',$request);
    }
    public function customer()
    {
        $request['data']=Customer::all();
        return view('admin.customer',$request);
    }
    public function assign(Request $request,$id)
    {
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
        $result['delivery']=DB::table('delivery_man')->get();
        return view('admin.assign_man',$result);
    }
    public function assign_id(Request $request)
    {

        DB::table('order_details')
        ->where(['id'=>$request->order_id])
        ->update(['delivery_id'=>$request->delivery_id]);
        $request->session()->flash('message','Delivery Man Successfully Assigned');
        return redirect('admin/dashboard');

    }
}
