<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|unique:students|max:255',
            'email' => 'required|unique:students|max:255'

        ]);
        if($validated){

            $student = Student::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'department' => $request->department,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'gender' => $request->gender,
                'document' => $request->document
                
            ]);


            return  response()->json(["message"=>"Saved Successfully."],200);
        }else{
            return  response()->json(["message"=>"Error."],401);
        }

        
     return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        return $data;
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
        $data = Student::find($id);
        $data->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'department' => $request->department,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'gender' => $request->gender,
            'document' => $request->document
            
        ]);


        return  response()->json(["message"=>"Updated Successfully."],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::find($id)->delete();
        // return $data;
        return  response()->json(["message"=>"Deleted Successfully."],200);

    }
}
