<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {

        // $users = User::where('role', 'admin')->get();
        return $dataTable->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact=User::findOrFail($id);
        $contact->delete();
        return response(['status'=>'success','message'=>'Deleted Successfully']);
    }
    public function changeStatus(Request $request)
    {
       $category= User::findOrFail($request->id);
       $category->status = $request->status == 'true' ? 1 : 0;
       $category->save();
       
       return response(['message'=>'Status has been updated']);
    }
}
