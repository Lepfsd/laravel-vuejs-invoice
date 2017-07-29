<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Http\Response;

class CustomerController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }

    public function getData()
    {

        $model = Customer::searchPaginateAndOrder();
        $columns = Customer::$columns;
        return response()
            ->json([
                'model' => $model,
                'columns' => $columns
            ]);       
    }
}
