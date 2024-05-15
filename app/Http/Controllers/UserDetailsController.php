<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Attempt to retrieve all user information
            $details = UserDetails::all();
            // Return the retrieved user information
            return $details;
        } catch (\Exception $e) {
          
            return response()->json(['error' => 'An error occurred while fetching user details.'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $details=UserDetails::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'user_roles'=>$request->user_roles,
            

        ]);

        return $details;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $details=UserDetails::where('id',$id)->first();
        return $details;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $details=UserDetails::where('id',$id)->first();

        $details->update($request->all());

        return $details;


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $info=UserDetails::where('id',$id)->first();
        
        
    
        $info->delete();
        return response(null,204);
    }

    //to fetch all the artist of skill_category
public function getUserByRole($user_roles)
{
    try {
        // Retrieve artist information based on skill category
        $details = UserDetails::where('user_roles', $user_roles)
            ->select()
            ->get();
        
        // Return the retrieved artist information
        return $details;
    } catch (\Exception $e) {
        // Handle the exception, you can log it or return an error response
        return response()->json(['error' => 'An error occurred while fetching artist information.'], 500);
    }
}
}


