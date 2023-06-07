<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\listToDo;

class ToDoListController extends Controller
{
    public function index() {
        // isComplete();
        return view('welcome', ['listToDos' => listToDo::all()]);   // Return all list in welcome Page
    }

    public function markComplete($id) {
        // \Log::info($id); // Show id in return value
        $listId = listToDo::find($id);
        $listId->is_complete = 1;
        $listId->save();
        return redirect('/');
    }

    public function saveItem(Request $request) {
        // \Log::info(info(json_encode($request->all())));
        $newListToDo = new listToDo;
        $newListToDo->name = $request->listToDo;
        $newListToDo->image = $request->file('image')->store('uploads'); // Saving Image in Upload Folder
        $newListToDo->is_complete = 0;
        $newListToDo->save();
        return redirect('/');
    }


    public function deleteItem($id) {
        // \Log::info($id); // Show id in return value
        $listId = listToDo::find($id);
        $listId->delete(); //delete the Item
        return redirect('/');
    }

    public function updateItem($id) {
        \Log::info($id); // Show id in return value
        return view('updateToDo', ['listToDos' => listToDo::where('id', $id)->get()]); // Return list where id
    }

    public function update(Request $request, $id) {
        \Log::info(info(json_encode($request->all())));  // To show returned data in laravel.log
        $listId = listToDo::find($id);
        $listId->name = $request->name;
        if ($request->is_complete != null) {                // If returned data null, data will not updated
            $listId->is_complete = $request->is_complete;   // Update data is_complete to returned value
        }
        if ($request->file('image') != null) {              // If returned data null, data will not updated
            $listId->image = $request->file('image')->store('uploads'); // Saving Image in Upload Folder
        }
        $listId->update();
        return redirect('/');
    }

    public function filtered(Request $request) {
        \Log::info(info(json_encode($request->all())));  // To show returned data in laravel.log
        $newStatusFilter = $request->statusFilter;
        $newFilterListToDo = $request->filterListToDo;
        if ($newStatusFilter == NULL && $newFilterListToDo == NULL) {
            return redirect('/');
        }
        if ($newStatusFilter == NULL) {
            return view('welcome', ['listToDos' => listToDo::where('name','like',"%".$newFilterListToDo."%")->get()]);
        }
        if ($newFilterListToDo == NULL) {
            return view('welcome', ['listToDos' => listToDo::where('is_complete', $newStatusFilter)->get()]);    
        } return view('welcome', ['listToDos' => listToDo::where('is_complete', $newStatusFilter)->where('name','like',"%".$newFilterListToDo."%")->get()]);
    }

    public function dbConn(){
        return view('dbConn');  // Check connection with DB
    }
}
