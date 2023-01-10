<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class EloquentController extends Controller
{

    public function index(Request $request)
    {
        // $product=Product::with(['tag','category','image'])->first();
        // // $product=Product::find(10);
        //  dd($product);

        // $name=$request->name;
        // $age=$request->age;
        // echo $name,$age;

        // $product=new Product;
        // //dd($product);
        // $product->name=$request->name;
        // $product->tag_id=$request->tag_id;
        // $product->category_id=$request->category_id;
        // $product->price=$request->price;
        // $product->status=$request->status;

        // $product=Product::find(23);
        // $product->name=$request->name;

        // $product->save();

       // $product=Product::find(22);
       // $product->delete();

       //queary

    //    $product=Product::where('status',1)->orderBy('name')->take(5)->get();

    // $product=Product::where('name','Nikey')->where('status',1)->value('price');

    // $product=Product::pluck('price');

    // foreach($product as $list){
    //     dd($list);
    // }
    // $product=Product::pluck('price','id');
    // $product=Product::orderBy('id')->chunk(5,function($p){
    //     $price=$p->value('price');
    //     dd($price);
    // });
   // dd($price);

//    $product=Product::pluck('price','id');
//    dd($product->max());
//    dd($product->count());

// $product=Product::max('id');
//dd($product);

      //  $product=Product::with(['tag','category'])->first();
       // $arr=$product->toArray();
       // dd($arr[1]['tag']['name']);
       // dd($arr[5]['category']['name']);
       /* foreach ($product as $list){
            $name=$list->tag->name;
        }
        dd($name);*/
      //  dd($product);
       /* $tag=Tag::with('product')->find(1);
        dd($tag->product ?? '');*/

        /*$category=Category::with('product')->find(16);
        $product=$category->product->where('status',1)->first();
        dd($product->name);*/
        /*foreach($category->product as $list){
            $product= $list->name;
            dd($product);
        };*/
        //dd($product);

//        $json=$product->toJson(JSON_PRETTY_PRINT);
//        dd($json);

        /*$user=User::find(1)->tag;
        dd($user);*/

        //belongTo

        /*$product = Product::with('tag','category')->first();
        dd($product->tag->name);*/

        //Many To Many

       // $tag=Tag::with('users')->find(15);
        //dd($tag->users);
        /*foreach ($tag->users as $list){
            dd($list->password);
        }*/
     /* $user=  $tag->users->where('name','asif')->first();
        dd($user->name);*/

        //$user=User::with('tag')->get(['id','name']);
        $user=User::with('tag')->orderBy('name','desc')->pluck('name','id');
      /*  foreach ($user as $item){
            dd($item);
        }*/
       $arr= $user->toArray();
       dd($arr[2]);
        /*foreach($user->tag as $list){
            dd($list->name);
        }*/
       /* $tag=$user->tag->where('id',15)->first();
        dd($tag->name);
        foreach ($user as $item){
            dd($item);
        }*/

         return view('eloquent');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
