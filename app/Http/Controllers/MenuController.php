<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $request['res_id'] = $request->session()->get('RES_ID');
        $request['data']=menu::where(['res_id'=> $request['res_id']])->get();
        return view('admin.res_menu',$request);
    }

    public function manage_menu(Request $request,$id='')
    {
        $val_name = $request->session()->get('RES_NAME');
        $val_id = $request->session()->get('RES_ID');

        if($id>0){
            $arr=menu::where(['id'=>$id])->get();
            $result['res_name']=$arr['0']->res_name;
            $result['res_id']=$arr['0']->res_id;
            $result['dish_name']=$arr['0']->dish_name;
            $result['id']=$arr['0']->id;
            $result['food_type']=$arr['0']->food_type;
            $result['food_desc']=$arr['0']->food_desc;
            $result['menu_catagory']=$arr['0']->menu_catagory;

            $result['base_price']=$arr['0']->base_price;
            $result['small_price']=$arr['0']->small_price;
            $result['large_price']=$arr['0']->large_price;

        }
        else{
            $result['res_name']=$val_name;
            $result['res_id']=$val_id;
            $result['dish_name']='';
            $result['id']='';
            $result['food_type']='';
            $result['food_desc']='';

            $result['menu_catagory']='';
            $result['base_price']='';
            $result['small_price']='';
            $result['large_price']='';


        }




        return view('admin.add_menu',$result);
    }
    public function menu_process(Request $request)
    {

        $request->validate([
            'image'=>'mimes:jpeg,jpg,png,ico',
            'dish_name'=>'required',
            'res_name'=>'required',
        ]);

        if($request->id>0)
        {
            $model=menu::find($request->id);
            $msg="Menu Updated";
        }
        else
        {
            $model = new menu();
            $msg="Menu Inserted";
        }
        if($request->hasFile('food_image'))
        {
            Storage::delete('/public/media/Menu/'.$model->food_image);
            $file=$request->file('food_image');
            $ext=$file->extension();
            $image=time().'.'.$ext;
            $file->storeAs('/public/media/Menu',$image);
            $model->food_image=$image;
        }
        $model->dish_name=$request->dish_name;
        $model->res_name=$request->res_name;
        $model->res_id=$request->res_id;
        $model->food_type=$request->food_type;
        $model->menu_catagory=$request->menu_catagory;

        $model->food_desc=$request->food_desc;
        $model->base_price=$request->base_price;
        $model->small_price=$request->small_price;
        $model->large_price=$request->large_price;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('res_admin/menus');

    }
    public function delete_data(Request $request, $id)
    {
        $model = menu::find($id);
        $arr=menu::where(['id'=>$id])->get();
        $model->delete();
        Storage::delete('/public/media/Menu/'.$arr['0']->food_image);
        $request->session()->flash('message','Menu Deleted');
        return redirect('res_admin/menus');

    }
}
