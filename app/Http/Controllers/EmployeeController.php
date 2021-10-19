<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employees;
use App\Models\companies;

class EmployeeController extends Controller
{
     public function index()
    {
        $data = Employees::all();
        return view('employees.employee')->with(array('employee_detail'=>$data));;
    }

    public function newemployeeview()
    {
        $data = companies::all();
         return view('employees.newemployeeview')->with(array('company_detail'=>$data));;
    }
    public function editemployee($id){
      $data = Employees::where('emp_id',$id)->get();
      $company = companies::all();
       return view('employees.edit_employeee')->with(array('single_employeee'=>$data, 'company_detail'=>$company));
    }

     public function addemployee(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required',
        'last' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'select_company' => 'required'
        ]);
        
          try {
                $newCom = new Employees;
                $newCom->name = $request->post('name');
                $newCom->last = $request->post('last');
                $newCom->email = $request->post('email');
                $newCom->phone = $request->post('phone');
                $newCom->com_id  = $request->post('select_company');
                // $newCom->company_name = $request->post('company_name');
                $newCom->save();
                 return redirect('employee');
          }catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect('newemployee')->with('error', 'Eamil Already exist..');
            }
        }
       

       

    }

    public function update_employee(Request $request)
    {
            $validated = $request->validate([
                'name' => 'required',
                'last' => 'required',
                'email' => 'required|email',
                'phone' => 'required'
            ]);
            $emp_id = $request->post('emp_id');
            $name = $request->post('name');
            $last = $request->post('last');
            $email = $request->post('email');
            $phone = $request->post('phone');
            $com_id = $request->post('com_id');
         $emp_up = array(
                'name' =>$name, 
                'last' =>$last, 
                'email' =>$email, 
                'phone' =>$phone, 
                'com_id' =>$com_id
        );
        
        Employees::where('emp_id',$emp_id)->update($emp_up);
        return redirect('employee');

     
    }

       public function delete_employee($id)
    {
       Employees::where('emp_id',$id)->delete();
        return redirect('employee'); 
    }

}
