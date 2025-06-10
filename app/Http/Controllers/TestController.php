<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use DB;
class TestController extends Controller
{
    public function insert(Request $request){
      

        $validatedData = $request->validate([
           'name' => 'required|string|max:20',
           'email' => 'unique:tests|required|email|min:5|max:55',
           'address' => 'required|string|max:20',
           'mobile' => 'unique:tests|required|max:10',
        ],
  
        [
           'name.required' => 'The name sss field is required.',
           'name.string' => 'The name field must be a string.',
           'email.max' => 'The email field must not exceed 255 characters.',
           'mobile.max' => 'The mobile field must not exceed 10 numbers.',
           'address.string' => 'The body field must be a string.',
           'address.max' => 'The address field must be a 20 characters.',
           
       ]
     
     );
        
       
    // Test::create($validatedData);
         
       $task = new Test;
       $task->name = $request->name;
       $task->email = $request->email;
       $task->mobile = $request->mobile;
       $task->address = $request->address;
       $task->save();
  
       //dd('save');
     //  return back()->with('success1','Your Category added succssfully');
  
     //  return redirect()->route('contact')->with('success', 'Task created successfully!');
     return redirect('/')->with('success','Task updated successfully!');
  
     }
     public function home()
    {
        $tests = Test::all();
        return view('contact', compact('tests'));
    }
  
    public function edit($id)
    {
   //   dd($id);
        $tests = Test::where('id',$id)->first();
      //  dd( $tasks);
        return view('edittest', compact('tests'));
    }

    public function update(Request $request)
    {
    //  dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'address' => 'required|string',
            'mobile' => 'required|integer',
        ]);

        //$task->update($validatedData);
      //  $task = Task::where('id',$request->id);
       // $task->update($request->all());


        // DB::table('	tests')
        // ->where('id',$request->id)  // find your user by their email
        // ->limit(1)  // optional - to ensure only one record is updated.
        // ->update(array('name' => $request->name,'email' => $request->email,'address' => $request->address,'mobile' => $request->mobile));
        Test::where('id',$request->id)
        ->update(['name' => $request->name,'email' => $request->email,'address' => $request->address,'mobile' => $request->mobile]);
       
      // return back()->with('success','Task updated successfully!');
return redirect('/')->with('success','Task updated successfully!');
     //   return view('index')->with('success', 'Task updated successfully!');
    }

    public function deletetask($id)
    {   
     // dd($id);
        $test = Test::findOrFail($id);
        $test->delete(); 
        return back()->with('success','Task Deleted successfully!');
    }
    
}
