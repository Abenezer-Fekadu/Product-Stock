<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\InterestHistory;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Index Page 
        if (Auth::user()){
            $products = Product::latest()->where('user_id', Auth::id())->paginate(6);
            $product_count = Product::all()->where('user_id', Auth::id())->count();
            return view('product.index', compact('products', 'product_count'));    
        }
        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create Page
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'kilo' => 'required|numeric',
            'price' => 'required|numeric',
            'main_image' => 'required|mimes:jpeg,png,jpg',
            'images.*' => 'required|mimes:jpeg,png,jpg'
        ]);

        //handle main image
        $main_image = $request->file('main_image');
        if($main_image)
        {
             // Make Unique Name for Image 
            $currentDate = Carbon::now()->toDateString();
            $main_image_name = $currentDate.'-'.uniqid().'.'.$main_image->getClientOriginalExtension();

          // Check if the Dir is exists
            if (!Storage::disk('public')->exists('main_product')) {
                Storage::disk('public')->makeDirectory('main_product');
            }
              // Resizing the Image  and upload
            $croppedImage = Image::make($main_image)->resize(400,300)->stream();
            Storage::disk('public')->put('main_product/'.$main_image_name, $croppedImage);

        }

        // if there are multiple images 
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $file)
            {
                $name = time() . '-'. uniqid() . '.'.$file->extension();
                $file->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }

        }
        Product::where('user_id', Auth::id())->create([
            'name' => $request->name,
            'address' => $request->address,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->price,
            'kilo' => $request->kilo,
            'images' => json_encode($data),
            'main_image' => $main_image_name
        ]);

        return redirect(route('product.index'))->with('success', 'Product Added Successfully');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::where('user_id', Auth::id())->FindOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::FindOrFail($id)->where('user_id', Auth::id());

        return view('product.edit', compact('product'));
    }
    

    /**
    * Show the form for editing the specified product status.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function change($id) {
        $product = Product::find($id)->where('user_id', Auth::id());
        if ($product->status == 1){
            $product->status = 0;
        }else{
            $product->status = 1;
        }
        $product->save();
        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'kilo' => 'required|numeric',
            'main_image' => 'mimes:jpeg,png,jpg',
            'images.*' => 'mimes:jpeg,png,jpg'
        ]);


        $product = Product::FindOrFail($id)->where('user_id', Auth::id());


        $main_image = $request->file('main_image');
        if($main_image){
            $currentDate = Carbon::now()->toDateString();
            $main_image_name =$currentDate.'-'.uniqid().'.'.$main_image->getClientOriginalExtension();

             // Check dir is exists
            if (!Storage::disk('public')->exists('main_product')) {
                Storage::disk('public')->makeDirectory('main_product');
            }

            $croppedImage = Image::make($main_image)->resize(400,300)->stream();
            Storage::disk('public')->put('main_product/'.$main_image_name,$croppedImage);


            if(Storage::disk('public')->exists('main_product/'.$product->main_image)){
                Storage::disk('public')->delete('main_product/'.$product->main_image);
            }

            $product->main_image = $main_image_name;
        }

        if($request->hasFile('images')){
            foreach(json_decode($product->images) as $pic){
                @unlock("images/". $pic);
            }

            foreach($request->file('images') as $file)
            {
                $name = time() . '-'. uniqid() . '.'.$file->extension();
                $file->move(public_path().'/images/', $name);  
                $data[] = $name;  
            } 

            $product->images=json_encode($data);
        }

        $product->name = $request->name;
        $product->address = $request->address;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->kilo = $request->kilo;

        $product->save();
        
        return redirect(route('product.index'))->with('success', "Product Successfully updated");

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::FindOrFail($id)->where('user_id', Auth::id());

        foreach(json_decode($product->images) as $pic){
            @unlink("images/". $pic);
        }

        if(Storage::disk('public')->exists('main_product/'.$product->main_image)){
            Storage::disk('public')->delete('main_product/'.$product->main_image);
        }

        $product->delete();
        return redirect(route('product.index'))->with('success', "Product Deleted Successfully");
    }
}
