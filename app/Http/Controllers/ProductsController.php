<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ContactFormRequest;
use Session;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(3);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        return view('products.create', ["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
          'name' => 'required',
          'code' => 'required|unique:products',
          'description' => 'required',
          'price' => 'required|numeric',
          'quantity' => 'required|numeric',
        );
        $customMessages = array(
          'name.required' => 'Este campo es requerido',
          'code.required' => 'Este campo es requerido y debe ser único',
          'description.required' => 'Este campo es requerido',
          'price.required' => 'Este campo es requerido',
          'quantity.required' => 'Este campo es requerido',
        );
        $validator = Validator::make(Input::all(), $rules, $customMessages);
        if($validator->fails()){
          return Redirect::to('products/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        else{
          $product = new Product;
          $product->name = $request->name;
          $product->code = $request->code;
          $product->description = $request->description;
          $product->price = $request->price;
          $product->quantity = $request->quantity;
          $product->save();
          Session::flash('message', 'Product saved!');
          return Redirect::to('/products');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::find($id);
      return view("products.edit",["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $product = Product::find($id);
      $product->name = $request->name;
      $product->code = $request->code;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;

      if($product->save()){
          return redirect("/products");
      }else {
          return view("products.edit",["product" => $product]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::findOrFail($id);

      $product->delete();

      return redirect()
          ->route('products.index');
    }
}
