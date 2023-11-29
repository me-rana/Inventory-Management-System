<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\base\Products;

class FrontendController extends Controller
{
    //
    public function index(){
        $perpage = 9;
        $shop = new Products();
        $products = $shop->read($perpage);
        return view('frontend.home', compact('products'))->with('i',(request()->input('page',1)-1)*$perpage);
    }
    public function myquery(Request $request){
        $perpage = 9;
        $products = Product::where('name','LIKE','%'.$request->myquery.'%')->latest()->paginate($perpage);
        return view('frontend.home',compact('products'))->with('i',(request()->input('page',1)-1)*$perpage);
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function contact_submitted(Request $request) : RedirectResponse{
        $request->validate(
                [
                    'name'  =>  'required',
                    'email' => 'required|email',
                    'subject' => 'required',
                    'message' => 'required'
                ]);
        $datas = ['name', 'email', 'subject', 'message'];
        $contact = new Contact();
        foreach ($datas as $data){
            $contact->$data = $request->$data;
        }
        $contact->save();
        return redirect()->back()->with('message','Your form submitted Successfully');
    }
    public function product_details($id){
        $product = Product::where('id',$id)->first();
        $products = Product::latest()->limit(4)->get();
        return view('frontend.view', compact('product','products'));
    }

}