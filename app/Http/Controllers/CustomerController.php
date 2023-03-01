<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        $url=url('/form');//url for create form
        $title="Create Customer";
        $data=compact('url','title');
        return view('form')->with($data); 
    }

    public function register(Request $req){
        $req->validate(
            [
                'name' => "required",
                'email'=>"required|email",
                'password'=>"required",
                'gender'=>"required",
                'dob'=>"required"
            ]
        );
        //insert query
        $customer= new Customer;
        $customer->name=$req['name'];
        $customer->email=$req['email'];
        $customer->password=md5($req['password']);
        $customer->address=$req['address'];
        $customer->date_of_birth=$req['dob'];
        $customer->gender=$req['gender'];
        $customer->status=$req['status'];
        $customer->save();

        return redirect('form/view')->with('Data saved Successfully');
    }
    //to view 
    public function view(){
        $customers= Customer::all();
        $data= compact('customers');//array of tables
        return view('customer-view')->with($data);
    }
    //to delete
    public function delete($id){
        $customer= Customer::find($id);//find targets primary key
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('form/view');
    }
    public function edit($id){
        $customer=Customer::find($id);
        if(is_null($customer)){
            return redirect('form/view');
        }
        else{
            $url= url('/form/update')."/".$id;//url for update
            $title="Update Customer";
            $data=compact('customer','url','title');
            return view('form')->with($data);
        }
    }
    public function update($id,Request $req){
        $customer=Customer::find($id);
        $customer->name=$req['name'];
        $customer->email=$req['email'];
        $customer->address=$req['address'];
        $customer->date_of_birth=$req['dob'];
        $customer->gender=$req['gender'];
        $customer->status=$req['status'];
        $customer->save();
        return redirect('/form/view');
    }
}
