<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cart_process(Request $request)
    {
        $arr=DB::table('carts')->get();
        if($arr->isNotEmpty() && $arr['0']->res_name!==$request->res_name)
        {
            $request->session()->flash('error','The Cart Is Already Have Dishes From Different Restaurant Empty or Proceed To Checkout');
           return redirect('front');
        }
       else  if($arr->isEmpty()){
        $model = new Cart();
        $msg=" Added to Cart";
        $model->quantity=$request->quantity;
        $model->res_name=$request->res_name;
        $model->res_id=$request->res_id;
        $model->dish_name=$request->dish_name;
        $model->food_type=$request->food_type;
        $model->price=$request->price * $request->quantity;
        $model->size=$request->size;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('front/restaurant/'.$request->res_id);
        }
        $res=Cart::where(['dish_name'=>$request->dish_name,'size'=>$request->size])->get();
        if(!$res->isEmpty())
        {
            $q=$res['0']->quantity + $request->quantity;
            $p=$request->price * $q;
            $msg="Cart Updated ";
           $res['0']->quantity=$q;
           $res['0']->res_name=$request->res_name;
           $res['0']->dish_name=$request->dish_name;
           $res['0']->food_type=$request->food_type;
           $res['0']->price=$p;
           $res['0']->size=$request->size;
           $res['0']->save();
           $request->session()->flash('message',$msg);
           return redirect('front/restaurant/'.$request->res_id);
        }
        else
        {
            $model = new Cart();
            $msg=" Added to Cart";
            $model->quantity=$request->quantity;
            $model->res_name=$request->res_name;
            $model->dish_name=$request->dish_name;
            $model->food_type=$request->food_type;
            $model->price=$request->price * $request->quantity;
            $model->size=$request->size;
            $model->save();
            $request->session()->flash('message',$msg);
            return redirect('front/restaurant/'.$request->res_id);
        }

    }
    public function delete_data(Request $request, $id)
    {
        $model = Cart::where(['id'=>$id])->delete();
        $request->session()->flash('message','Cart Is Empty');
        return redirect('front');

    }
    public function delete(Request $request, $id)
    {
        $model = Cart::where(['id'=>$id])->delete();
        $request->session()->flash('message','Dish Is Removed');
        return redirect('front/checkout');

    }
    public function delete_all(Request $request)
    {
        $model =DB::table('carts')->delete();
        $request->session()->flash('message','Cart Is Empty');
        return redirect('front');

    }

}

