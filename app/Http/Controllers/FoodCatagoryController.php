<?php

namespace App\Http\Controllers;

use App\Models\Food_Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodCatagoryController extends Controller
{
    public function index(Request $request)
    {
        $request['data']=Food_Catagory::all();
        return view('admin.food_catagory',$request);

    }

    public function manage_catagory(Request $request,$id='' )
    {
        if($id>0){
            $arr=Food_Catagory::where(['id'=>$id])->get();
            $result['catagory_name']=$arr['0']->catagory_name;
            $result['catagory_slug']=$arr['0']->catagory_slug;
            $result['id']=$arr['0']->id;

        }
        else{
            $result['catagory_name']='';
            $result['catagory_slug']='';
            $result['id']=0;
        }
        return view('admin.add_catagory',$result);
    }
    public function catagory_process(Request $request)
    {
        $request->validate([
            'catagory_image'=>'mimes:jpeg,jpg,png,ico',
            'catagory_name'=>'required',
            'catagory_slug'=>'required|unique:food__catagories,catagory_slug,'.$request->id,
        ]);

        if($request->id>0)
        {
            $model=Food_Catagory::find($request->id);
            $msg="Catagory Updated";
        }
        else
        {
            $model = new Food_Catagory();
            $msg="Catagory Inserted";
        }

        if($request->hasFile('catagory_image'))
        {
            Storage::delete('/public/media/Food_catagory/'.$model->catagory_image);
            $file=$request->file('catagory_image');
            $ext=$file->extension();
            $catagory_image=time().'.'.$ext;
            $file->storeAs('/public/media/Food_catagory',$catagory_image);
            $model->catagory_image=$catagory_image;
        }
        $model->catagory_name=$request->catagory_name;
        $model->catagory_slug=$request->catagory_slug;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/food_catagory');

    }
    public function delete_data(Request $request, $id)
    {
        $model = Food_Catagory::find($id);
        $arr=Food_Catagory::where(['id'=>$id])->get();
        Storage::delete('/public/media/Food_catagory/'.$arr['0']->image);
        $model->delete();
        $request->session()->flash('message','Catagory Deleted');
        return redirect('admin/food_catagory');

    }
}
