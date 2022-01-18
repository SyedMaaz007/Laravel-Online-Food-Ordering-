<?php

namespace App\Http\Controllers;

use App\Models\Restaurants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request['data']=Restaurants::all();
        return view('admin.restaurant',$request);
    }

    public function manage_res(Request $request,$id='')
    {
        if($id>0){
            $arr=Restaurants::where(['id'=>$id])->get();
            $result['restaurant_name']=$arr['0']->restaurant_name;
            $result['res_id']=$arr['0']->res_id;
            $result['id']=$arr['0']->id;
            $result['restaurant_loc']=$arr['0']->restaurant_loc;
            $result['address']=$arr['0']->res_address;
            $result['food_catagory']=$arr['0']->food_catagory;
            $result['trending']=$arr['0']->trending;
            $result['res_sign']=$arr['0']->res_sign;
            $result['res_pass']=$arr['0']->res_pass;


        }
        else{
            $result['food_catagory']='';
            $result['restaurant_name']='';
            $result['res_id']='';
            $result['id']=0;
            $result['restaurant_loc']='';
            $result['address']='';
            $result['res_sign']='';
            $result['trending']='';
            $result['res_pass']='';

        }
        $result['f_catagory']=DB::table('food__catagories')->get();


        return view('admin.add_restaurant',$result);
    }
    public function res_process(Request $request)
    {
        $request->validate([
            'image'=>'mimes:jpeg,jpg,png,ico',
            'restaurant_name'=>'required',
            'address'=>'required',
            'food_catagory'=>'required',
            'restaurant_loc'=>'required',
            'res_id'=>'required|unique:restaurants,res_id,'.$request->id,
        ]);

        if($request->id>0)
        {
            $model=Restaurants::find($request->id);
            $msg="Reataurant Updated";
            $model->res_pass=$model->res_pass;
        }
        else
        {
            $model = new Restaurants();
            $msg="Restaurant Inserted";
            $model->res_pass=Crypt::encrypt($request->res_pass);
        }


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
        return redirect('admin/restaurants');

    }
    public function delete_data(Request $request, $id)
    {
        $model = Restaurants::find($id);
        $arr=Restaurants::where(['id'=>$id])->get();
        $model->delete();
        Storage::delete('/public/media/Restaurants/'.$arr['0']->image);
        $request->session()->flash('message','Restaurant Deleted');
        return redirect('admin/restaurants');

    }
    public function status(Request $request,$type, $id)
    {
        $model = Restaurants::find($id);
        $model->status=$type;
        $model->save();
        $request->session()->flash('message','Status Updated');
        return redirect('admin/restaurants');

    }
}
