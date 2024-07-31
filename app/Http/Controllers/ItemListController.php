<?php

namespace App\Http\Controllers;

use App\Models\ItemList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemListController extends Controller
{
    public function index(): View
    {
        $datas = ItemList::paginate(6);
        return view('pages.indexClient', ['datas' => $datas]);
    }


    public function create()
    {
        // $users = User::find($id); BISA DIAMBIL LANGSUNG PAKE Auth::user()
        return view('pages.createItem');
    }


    public function store(Request $request)
    {
        ItemList::create($request->all());
        return redirect('/items');
    }


    public function show(ItemList $itemList)
    {
        //
    }


    public function edit(ItemList $itemList)
    {
        //
    }


    public function update(Request $request, ItemList $itemList)
    {
        //
    }


    public function destroy(ItemList $itemList)
    {
        //
    }
}
