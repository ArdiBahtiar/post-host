<?php

namespace App\Http\Controllers;

use App\Models\ItemList;
use App\Models\User;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemListController extends Controller
{
    public function index(): View
    {
        $datas = ItemList::paginate(6);
        return view('pages.indexClient', ['datas' => $datas]);
    }


    public function search(Request $request)
    {
        $cari = $request->cari;
        $datas = ItemList::where('nama', 'like', "%".$cari."%")->paginate(6);
        return view('pages.indexClientSearch', ['datas' => $datas]);
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


    public function focus($id)
    {
        $list = ItemList::find($id);
        $user = User::where('id', '=', $list->user_id)->first();
        return view('pages.itemFocus', ['list' => $list, 'user' => $user]);
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
