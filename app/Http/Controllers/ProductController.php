<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function add(Request $request)
   {

    $request->validate([
      'name'=>'required|max:150',
      'descrip'=>'required|max:200',
      'price'=>'required|max:100',
      'qty'=>'required|max:50',
    ]);

    $product = new Product;
    $product->name = $request->name;
    $product->description = $request->descrip;
    $product->price = $request->price;
    $product->qty = $request->qty;
    $product->save();
    return response()->json(['message'=>'Product added successfully'],200);
   }


   public function showall(){
    $products = Product::all();
    return response()->json(['products'=>$products],200);
    }

public function show($id){
  $products = Product::find($id);
  if($products)
  {
    return response()->json(['products'=>$products],200);
  }
  else
  {
    return response()->json(['message'=>'No Product Found'],404);
  } 
}

   public function update(Request $request , $id){
    
    $request->validate([
      'name'=>'required|max:150',
      'descrip'=>'required|max:200',
      'price'=>'required|max:100',
      'qty'=>'required|max:50',
    ]);

    
    $product =Product::find($id);
    if($product)
    {
      $product->name = $request->name;
      $product->description = $request->descrip;
      $product->price = $request->price;
      $product->qty = $request->qty;
      $product->update();
  
      return response()->json(['message'=>'Product updated successfully'],200);
    }
    else{
      return response()->json(['message'=>'No product Found'],404);
    }
   }



   public function delete(Request $request, $id){
    $products = Product::find($id);
    if($products)
    {
      $products->delete();
      return response()->json(['message'=>'Product deleted successfully'],200);
    }
    else{
      return response()->json(['message'=>'No product Found'],404);
    }
    
   }
}
