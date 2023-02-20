<?php

namespace App\Http\Controllers;

use App\Models\PropKey;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }

    public function createPropKey()
    {
        $properties = Property::all();
        return view('admin.properties.create',compact('properties'));
    }

    public function storeKey(Request $request)
    {
        
        $min_key_length = 16;
        $key_length = strlen($request->propkey);
        if($key_length < $min_key_length)
        {
            $request->session()->flash('error', 'la clé doit avoir 16 caractere minimum');
            return redirect()->back();
        }
        DB::table('properties_key')->upsert([
            'prop_id' => $request->prop_id,
            'user_id'=> Auth::user()->id,
            'propkey'=>$request->propkey
        ],
        ['prop_id','user_id','propkey']
    );


     
        
        $request->session()->flash('success', 'la clé as bien été créer');
        return redirect()->back();
    }

    
}
