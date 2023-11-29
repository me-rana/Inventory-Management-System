<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\base\Products;

class BackendController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard');
    }
    public function products(){
        $perpage = 9;
        $shop = new Products();
        $products = $shop->read($perpage);
        return view('backend.products', compact('products'))->with('i',(request()->input('page',1)-1)*$perpage);
    }
    public function addproduct(){
        return view('backend.addproduct');
    }
    public function updateproduct($id){
        $shop = new Products();
        $product = $shop->read_one($id);
        return view('backend.addproduct', compact('product'));
    }
    public function submitted(Request $req) : RedirectResponse {
        $req->validate(
            [
                'name'  =>  'required',
                'quantity' => 'required|integer',
                'price' => 'required|integer',
            ]);
        $datas = ['name', 'quantity', 'price'];
        $product = new products();
        $action = $product->submitted($req, $datas);
        if ($action == true){
            $key = 'success';
            $message = "Product Added Successful";
        }else{
            $key = 'failed';
            $message = "Operation Unsuccessful";
        }
        return redirect()->back()->with($key, $message);
    }
    public function resubmitted(Request $req, $id)  : RedirectResponse {
        $req->validate(
            [
                'name'  =>  'required',
                'quantity' => 'required|integer',
                'price' => 'required|integer',
            ]);
        $datas = ['name', 'quantity', 'price'];
        $product = new products();
        $action = $product->resubmitted($req, $datas, $id);
        if ($action == true){
            $key = 'success';
            $message = "Product Updated Successful";
        }else{
            $key = 'failed';
            $message = "Operation Unsuccessful";
        }
        return redirect()->back()->with($key, $message);
    }
    public function remove_product($id){
        $product = new Products();
        $action = $product->delete($id);
        if ($action == true){
            $key = 'success';
            $message = "Product Updated Successful";
        }else{
            $key = 'failed';
            $message = "Operation Unsuccessful";
        }
        return redirect()->back()->with($key, $message);
    }

}
