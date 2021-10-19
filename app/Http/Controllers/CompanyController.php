<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\companies;
use App\Http\Controllers\Redirect;
use Session;

class CompanyController extends Controller
{
    public function index()
    {
        $data = companies::all();
        return view('company.company')->with(array('company_detail'=>$data));
    }

    public function newComapany(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'logo' => 'required|mimes:jpg,bmp,png|dimensions:min_width=100,min_height=100',

        ]);
        

        $path = $request->file('logo')->store('company', 'public');

        $old_email = $request->post('email');
        $check_email = companies::where('email', $old_email)->get();

        if (count($check_email) > 0) {
          return redirect('newcompany')->with('error', 'Eamil Already exist..');  
        }else{
            $newCom = new companies;
            $newCom->name = $request->post('name');
            $newCom->email = $request->post('email');
            $newCom->website = $request->post('website');
            $newCom->logo = $path;
            $newCom->save();
            return redirect('companies');
        }
    }
    public function newcompanyview(){
        return view('company.newcompany');
    }
    public function editcompany($id)
    {
       $data = companies::where('com_id',$id)->get();
       return view('company.edit_company')->with(array('single_company'=>$data));
    }


    public function upCompany(Request $request){
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email'
        ]);
        
         $id =  $request->post('com_id');
         $path  =  $request->post('logo');
         if ($request->hasFile('logo')) {
             $path = $request->file('logo')->store('company', 'public');
         }

         $updatedata = array('name' =>$request->post('name'), 'email' =>$request->post('email'), 'website' =>$request->post('webstie'), 'logo' =>$path);
         
        companies::where('com_id',$id)->update($updatedata);

        return redirect('companies'); 
    }

    public function delete_company($id)
    {
       companies::where('com_id',$id)->delete();
        return redirect('companies'); 
    }

      public function company_details(Request $request)
    { 
       $id = $_GET['com_id'];
       $data = companies::where('com_id',$id)->get();

       echo $data[0]->name;
      
    }
}
