<?php

namespace App\Http\Controllers;

use App\Models\ItemList;
use Illuminate\Http\Request;

class ItemListController extends Controller
{
    public function index()
    {
        $datas = ItemList::all();

        return view('pages.indexClient', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = ItemList::all();
        return view('pages.createItem');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ItemList::create($request->all());
        return redirect('/items');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemList $itemList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemList $itemList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemList $itemList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemList $itemList)
    {
        //
    }
}
