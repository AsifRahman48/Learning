<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {

         if ($request->ajax()) {
        //     $test=Product::all();
        //     foreach($test as $list){
                //    // dd($list->name);
                // }
                // dd($list->name);
            // $test=Product::get(['name','price']);
            // foreach($test as $list){
            //    // dd($list->name);
            // }
            // dd($list->name);
            //   $test=Product::where('name' , 'Peter Morse')->first('id');  
            //     dd($test->id);

            // $test=Product::where('id',20)->value('name');
            // dd($test);

            // $collection = collect([
            //     ['name' => 'test', 'email' => 'test@gmail.com'],
            //     ['name' => 'test1', 'email' => 'test1@gmail.com'],
            // ]);
            // dd($collection->pluck('name','email'));
            // $test=Product::pluck('price')->first();
            // dd($test);
        //     $tut = collect([a, b, c, d, e, f, g, h]);
        //    //$tut= $tut->chunk(3)->toArray();
        //    dd($tut->chunk(3));
        // $avg = collect([10, 20, 50, 30, 40]);
        // dd($avg->avg());
        // $first = collect([1, 2, 3, 4, 5]);
        // dd($first->first());
        //  $last = collect([1, 2, 3, 4, 5]);
        // dd($last->last());
        // $collection = collect(['1', '2']);
        // $merged = $collection->merge(['3', '5']);
        // dd($merged->all());

    //     $max= collect(['1', '2', '3', '4', '5', '6']);
    //   dd($max->max());



            $data = Product::with('tag', 'category','image')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', 'Product.action')
                ->addColumn('tag', function ($row) {
                    return $row->tag ? $row->tag->name : '';
                })
                ->addColumn('category', function ($row) {
                    return $row->category ? $row->category->name : '';
                })
                ->addColumn('image', function (Product $row) {
                    $p='';
                    foreach ($row->image as $image)
                    {
                      $p .= "<img src='{$image->file_path}' width='70px' height='70px'  /> ";
                    }
                    return $p;
                })
                ->addColumn('status', function ($row) {
                    return $row->status ? Product::STATUS_RADIO[$row->status] : 'Inactive';
                })
                ->addColumn('gender', function ($row) {
                    return $row->gender ? json_decode($row->gender) : '';
                })
                ->rawColumns(['action', 'tag', 'category','image'])
                ->make(true);
        }
        return view('Product.index');
    }
    public function create()
    {
        $tag = Tag::all();
        $category = Category::all();
        return view('Product.create', compact('tag', 'category'));
    }

    public function store(Request $request)
    {
      $product=  Product::create($request->only('name', 'tag_id', 'category_id', 'price','status'));
      

        if ($images = $request->file('image')) {
            foreach ($images as $image) {
                $image->store('product', 'public');
                $product->image()->create([
                    'product_id' => $product->id,
                    'file_path' => "storage/product/" . $image->hashName()
                ]);
            }
        }
        $product->gender=json_encode($request->gender);

      $product->save();
        return redirect()->route('products.index')->with('success', 'Product has been created successfully.');
    }

    public function show($id)
    {
        $product=Product::findOrFail($id);

        return view('Product.show',compact('product'));
    }

    public function edit($id)
    {
        $tag = Tag::all();
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('Product.edit', compact('product', 'tag', 'category'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->tag_id = $request->tag_id;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->gender=json_encode($request->gender);
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product has been created successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->image()->delete();
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product has been deleted successfully.');

    }
}
