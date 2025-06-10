<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
class EmployeeController extends Controller
{
    function employee_add(Request $request){
    // dd($request->all());
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:20',
        //     'email' => 'unique:tests|required|email|min:5|max:55',
        //     'address' => 'required|string|max:20',
        //     'mobile' => 'unique:tests|required|max:10',
        //  ],
   
        //  [
        //     'name.required' => 'The name sss field is required.',
        //     'name.string' => 'The name field must be a string.',
        //     'email.max' => 'The email field must not exceed 255 characters.',
        //     'mobile.max' => 'The mobile field must not exceed 10 numbers.',
        //     'address.string' => 'The body field must be a string.',
        //     'address.max' => 'The address field must be a 20 characters.',
            
        // ]
      
        //  );

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'email' => 'unique:employees|required|email|min:5|max:55',
            'address' => 'required|string|max:20',
            'phone' => 'unique:employees|required|max:10',
        ]);

         if ($validator->fails())
         {
             return response()->json(['error'=>$validator->errors()->all()]);
         }



        $insert = [
            'name' => $request->name,
            'email'=> $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $add = Employee::create($insert);
        if($add){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record created succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record created failed!'
            ];
            return $response;
        }
    } 

    function employee_view(Request $request){
        return Employee::find($request->id);
    } 

    function employee_delete(Request $request){
        $delete =  Employee::destroy($request->id);
        if($delete){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record deleted succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record deleted failed!'
            ];
            return $response;
        }
    } 

    function employee_edit(Request $request){
        $update = [
            'name' => $request->name,
            'email'=> $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $edit = Employee::where('id', $request->employee_id)->update($update);
        if($edit){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record updated succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record updated failed!'
            ];
            return $response;
        }
    } 

    function employee_list(){
        return Employee::all();
    }
} 