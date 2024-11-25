<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product_tag;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Size;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create', [
            'collections' => Collection::all(),
            'categories' => Category::all(),
            'colors' => Color::all(),
            'sizes' => Size::all(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'sku' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'tags' => 'required',
            'primary_image' => 'required|image',
            'secondary_image' => 'nullable|image'
        ]);
        $product = Product::create($request->except('_token', 'tags', 'color_id', 'size_id', 'purchase_price', 'selling_price', 'offer_price', 'quantity') + [
            'slug' => Str::slug($request->name),
            'user_id' => auth()->id(),
            'primary_image_public_id' => 'primary_image_public_id',
        ]);
        foreach ($request->tags as $tag) {
            if ((int)$tag == 0) {
                // conversion giving zero that means it is coming as string so a new tag
                $tag = Tag::create([
                    'name' => $tag
                ]);

                Product_tag::create([
                    'product_id' => $product->id,
                    'tag_id' => $tag->id
                ]);
            } else {
                // conversion giving any value than zero that means it is already existed in the database
                Product_tag::create([
                    'product_id' => $product->id,
                    'tag_id' => $tag
                ]);
            }
        }
        //image upload start
        $upload = $request->primary_image->storeOnCloudinary(env('CLOUDINARY_FOLDER_NAME') . '/product_images');
        $product->primary_image = $upload->getSecurePath();
        $product->primary_image_public_id = $upload->getPublicId();
        if ($request->hasFile('secondary_image')) {
            $upload = $request->secondary_image->storeOnCloudinary(env('CLOUDINARY_FOLDER_NAME') . '/product_images');
            $product->secondary_image = $upload->getSecurePath();
            $product->secondary_image_public_id = $upload->getPublicId();
        }
        $product->save();
        //image upload end

        //if initial inventory added start
        if ($request->color_id) {
            if (Inventory::where('product_id', $product->id)->exists()) {
                $lot_no = Inventory::where('product_id', $product->id)->count() + 1;
            } else {
                $lot_no = 1;
            }
            Inventory::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'purchase_price' => $request->purchase_price,
                'selling_price' => $request->selling_price,
                'offer_price' => $request->offer_price,
                'quantity' => $request->quantity,
                'lot_no' => $lot_no
            ]);
        }
        //if initial inventory added end
        return back()->with('success', 'Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit', [
            'collections' => Collection::all(),
            'categories' => Category::all(),
            'colors' => Color::all(),
            'sizes' => Size::all(),
            'tags' => Tag::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->hasFile('primary_image')) {
            //delete the old photo
            Cloudinary::destroy($product->primary_image_public_id);
            //upload the new photo start
            $upload = $request->primary_image->storeOnCloudinary(env('CLOUDINARY_FOLDER_NAME') . '/product_images');
            $product->primary_image = $upload->getSecurePath();
            $product->primary_image_public_id = $upload->getPublicId();
            //upload the new photo end
        }
        //Tag related activity start
        Product_tag::where('product_id', $product->id)->forceDelete();
        foreach ($request->tags as $tag) {
            if ((int)$tag == 0) {
                // conversion giving zero that means it is coming as string so a new tag
                $tag = Tag::create([
                    'name' => $tag
                ]);

                Product_tag::create([
                    'product_id' => $product->id,
                    'tag_id' => $tag->id
                ]);
            } else {
                // conversion giving any value than zero that means it is already existed in the database
                Product_tag::create([
                    'product_id' => $product->id,
                    'tag_id' => $tag
                ]);
            }
        }
        //Tag related activity end
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->collection_id = $request->collection_id;
        $product->status = $request->status;
        $product->sku = $request->sku;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->save();
        return back()->with('success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', $product->name . ' Deleted Successfully!');
    }
    public function product_manage_inventory(Product $product)
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('backend.product.manage_inventory', compact('product', 'colors', 'sizes'));
    }
    public function product_manage_inventory_post(Request $request, Product $product)
    {
        if (Inventory::where('product_id', $product->id)->exists()) {
            $lot_no = Inventory::where('product_id', $product->id)->count() + 1;
        } else {
            $lot_no = 1;
        }
        Inventory::create($request->except('_token') + [
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'lot_no' => $lot_no
        ]);
        return back()->with('success', 'Inventory Added Successfully!');
    }
}
