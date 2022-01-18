<?php

namespace App\Http\Controllers;

use App\Models\menu;

use App\Models\Front;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class FrontController extends Controller
{
    public function login(Request $request)
    {
        if($request->session()->has('USER_LOGIN')){
            return redirect('front');
        }
        else{
            return view('front.login');
        }
        return view('front.login');
    }
    public function sign_up(Request $request)
    {
        if($request->session()->has('USER_LOGIN')){
            return redirect('front');
        }
        else{
            return view('front.signup');
        }
    }

    public function user_auth(Request $request)
    {
        $name=$request->post('email');
        $password=$request->post('password');

        $result=DB::table('customers')->where(['user_email'=>$name])->get();
        if(isset($result[0]))
        {
            $db_pass = Crypt::decrypt($result[0]->user_pass);
            if($db_pass== $password){
                $request->session()->put('USER_LOGIN',true);
                $request->session()->put('USER_ID',$result[0]->id);
                $request->session()->put('USER_NAME',$result[0]->user_name);
                $request->session()->put('USER_EMAIL',$result[0]->user_email);
                return redirect('front');
            }else{
                $request->session()->flash('error','Please enter Valid password');
                return redirect('/');
            }

        }else{
            $request->session()->flash('error','Please enter Valid login details');
            return redirect('/');
        }
    }
    public function index(Request $request)
    {
        $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');
        $result['home_catagory']=DB::table('food__catagories')->get();
        $result['trend_res']=DB::table('restaurants')->where(['trending'=>1,'status'=>1])->get();
        $result['all_res']=DB::table('restaurants')->where(['status'=>1])->get();
        return view('front.index',$result);
    }
    public function trending(Request $request)
    {
        $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');
        $result['home_catagory']=DB::table('food__catagories')->get();
        $result['trend_res']=DB::table('restaurants')->where(['trending'=>1,'status'=>1])->get();
        return view('front.trending',$result);
    }
    public function all_pop(Request $request)
    {
        $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');

        $result['home_catagory']=DB::table('food__catagories')->get();
        $result['all_res']=DB::table('restaurants')->where(['status'=>1])->get();
        return view('front.all_pop',$result);
    }
    public function catagory(Request $request, $catagory_slug)
    {
         $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');

            $result['home_catagory']=DB::table('food__catagories')->get();
            $result['all_res']=DB::table('restaurants')->where(['food_catagory'=>$catagory_slug,'status'=>1])->get();
            return view('front.catagory',$result);

    }
    public function res(Request $request, $id)
    {
         $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');

        $result['all_res']=DB::table('restaurants')->where(['status'=>1])->get();
        $result['home_catagory']=DB::table('food__catagories')->get();
        $result['starters']=menu::where(['res_id'=>$id,'menu_catagory'=>'starters'])->get();
        $result['starter']='Starters';

        $result['mains']=menu::where(['res_id'=>$id,'menu_catagory'=>'main'])->get();
        $result['main']='Main Course';
        $result['desserts']=menu::where(['res_id'=>$id,'menu_catagory'=>'dessert'])->get();
        $result['dessert']='Desserts';
        $result['res']=DB::table('restaurants')->where(['status'=>1,'res_id'=>$id])->get();
        $result['res_name']= $result['res']['0']->restaurant_name;
        $result['res_id']=$id;
        $result['cart']=DB::table('carts')->get();
        $result['cart_total']=DB::table('carts')->sum('price');
        $total=DB::table('carts')->sum('price');
        $total= $total+50+50;
        $result['total'] = $total;

        return view('front.restaurant',$result);
    }
    public function checkout(Request $request)
    {
         $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');

       $result['cart']=DB::table('carts')->get();
       $result['cart_total']=DB::table('carts')->sum('price');
       $total=DB::table('carts')->sum('price');
       $total= $total+50+50;
       $result['total'] = $total;
       return view('front.checkout',$result);
    }
    public function checkout_process(Request $request)
    {
         $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');

       $result=DB::table('carts')->get();

       $arr=[
           "user_name"=>$request->user_name,
           "number"=>$request->number,
           "email"=>$request->email,
           "address"=>$request->address,
           "instruction"=>$request->instruction,
           "total_price"=>$request->price,
           "payment_type"=>$request->payment_type,
           "order_status"=>'1',
           "added_on"=>date('Y-m-d h:i:s')
       ];
       $order_id= DB::table('order_details')->insertGetId($arr);
       foreach($result as $list)
       {
        $product_details['res_name']=$list->res_name;
        $product_details['dish_name']=$list->dish_name;
        $product_details['quantity']=$list->quantity;
        $product_details['size']=$list->size;
        $product_details['price']=$list->price;
        $product_details['res_id']=$list->res_id;
        $product_details['food_type']=$list->food_type;
        $product_details['order_id']=$order_id;
        DB::table('orders')->insert($product_details);
       }
       DB::table('carts')->delete();
       return redirect('front/success');
    }
    public function success(Request $request)
    {
         $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');

        return view('front.success',$result);
    }
    public function profile(Request $request,$id='')
    {
         $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');
        if($id>0){
            $arr=DB::table('customers')->where(['id'=>$id])->get();
            $result['user_name']=$arr['0']->user_name;
            $result['user_no']=$arr['0']->user_no;
            $result['id']=$arr['0']->id;
            $result['user_email']=$arr['0']->user_email;
            $result['first_name']=$arr['0']->first_name;
            $result['last_name']=$arr['0']->last_name;
            $result['user_img']=$arr['0']->user_img;
        }
        $result['user_email'] = $request->session()->get('USER_EMAIL');

        $result['user_data']=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        return view('front.profile',$result);

    }

    public function my_order(Request $request)
    {
         $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');

        $result['order_details']=DB::table('order_details')->get();
        $result['order']=DB::table('orders')
        ->get();
        $result['atrr'] = [];
        foreach($result['order'] as $data)
        {
            $result['atrr'][$data->order_id][] = $data->dish_name;
        }
        $result['atrr'];
        $result['all_res']=DB::table('restaurants')
        ->join('orders','restaurants.restaurant_name',"=",'orders.res_name')
        ->join('order_details','orders.order_id',"=",'order_details.id')
        ->groupBy('orders.order_id')
        ->get();

        return view('front.order',$result);
    }
    public function order_status(Request $request, $id)
    {
         $result['user_email'] = $request->session()->get('USER_EMAIL');
        $arr=DB::table('customers')->where(['user_email'=> $result['user_email']])->get();
        $result['user_name']=$arr['0']->user_name;
        $result['user_no']=$arr['0']->user_no;
        $result['id']=$arr['0']->id;
        $result['user_email']=$arr['0']->user_email;
        $result['first_name']=$arr['0']->first_name;
        $result['last_name']=$arr['0']->last_name;
        $result['user_img']=$arr['0']->user_img;
        $result['user_id'] = $request->session()->get('USER_ID');

        $result['order']=DB::table('orders')
        ->join('order_details','orders.order_id',"=",'order_details.id')
        ->where(['order_id'=>$id])
        ->groupBy('orders.order_id')
        ->get();
        $result['orders']=DB::table('orders')
        ->where(['order_id'=>$id])
        ->get();

        return view('front.order_status',$result);
    }

}

