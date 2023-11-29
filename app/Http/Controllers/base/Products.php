<?php

namespace App\Http\Controllers\base;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class Products extends Controller
{
    //
    protected function image_store($req_file){
        if($req_file != null){
            $img_name = $req_file->getClientOriginalName();
            $image = date("Y-m-d_H-i-s")."_".rand(11111,99999).$img_name;
            $req_file->storeAs('public/products', $image);
            return 'storage/products/'.$image;
        }
    }
    protected function image_delete($file_path){
        $image_path = $file_path; 
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        return 0;
    }
    public function read($perpage){
        $products = Product::latest()->paginate($perpage);
        return $products;
    }

    public function read_one($id){
        $product = Product::where('id', $id)->first();
        return $product;
    }

    public function submitted($request, $datas){
            $product = new Product();
            foreach ($datas as $data){
                $product->$data = $request->$data;
            }
           if (!is_null($request->file('image'))){
                $image = $this->image_store($request->file('image'));
                $product->image_path= $image;
           }
            $product->save();
            return true;
  
    }
    public function resubmitted($request, $datas, $id){
        $product = Product::where('id', $id)->first();
        foreach ($datas as $data){
            $product->$data = $request->$data;
        }
       if (!is_null($request->file('image'))){
            if(!is_null($product->image_path)){
                $this->image_delete($product->image_path);
            }
            $image = $this->image_store($request->file('image'));
            $product->image_path= $image;
       }
        $product->update();
        return true;
    }
    //Delete Notice Management System
    public function delete($id){
        $product = Product::where('id',$id)->first();
        if(!is_null($product->image_path)){
            $this->image_delete($product->image_path);
        }
        $product->delete();
        return true;
    }

}
