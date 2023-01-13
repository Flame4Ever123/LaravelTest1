<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ListItem;

class TodoListController extends Controller
{
    //Pass listItems to welcome.blade, only ListItem that has 0 in is_complete field.
    public function index(){
        return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }

    //Find the item thru id passed from welcome, then change is_complete to 1.
    public function markComplete($id){
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }

    //declare a new list item, then set name to $request, and is_complete to 0.
    public function saveItem(Request $request) {
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem ->save();

        return redirect('/');
    }
}
