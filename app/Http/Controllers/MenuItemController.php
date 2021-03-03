<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MenuItem::latest()->paginate(10);
        return view('menu-items.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function getAll()
    {
        $data = DB::table('menu_items')->get();
        return  ($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu-items.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);
        $data  = $request->all();
        if ($request->hasFile('image')) {
            # code...
            $destinationPath = 'public/images/menu-items';
            $image = $request->file('image');
            $imageName = uniqid().$image->getClientOriginalName();
            $path = $image->storeAs($destinationPath, $imageName);

            $data['image']=$imageName;
        }
        MenuItem::create($data);
     
        return redirect()->route('menu-items.index')
                         ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        return view('menu-items.show',compact('menuItem'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem)
    {
        return view('menu-items.edit',compact('menuItem'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);
    
        $menuItem->update($request->all());
    
        return redirect()->route('menu-items.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
    
        return redirect()->route('menu-items.index')
                        ->with('success','Post deleted successfully');
    }
}
