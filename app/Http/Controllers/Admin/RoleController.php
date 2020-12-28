<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use App\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleList = Role::where('status', 0)->paginate(5);

        return view('admin.role.list',compact('roleList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $find = Role::where('role_name',$input['role_name'])->first();
        if($find){
            $data = [
                'status'=>2,
                'message'=>'该用户已存在,请勿重复添加',
            ];
            return $data;
        }
        $res = Role::create([
            'role_name' => $input['role_name'],
            'role_desc'   => $input['role_desc'],
            'created_time' => date('Y-m-d H:i:s')
        ]);
        if($res){
            $data = [
                'status'=>0,
                'message'=>'添加成功',
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'添加失败',
            ];
        }
        return $data;
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
        //
        $role = Role::find($id);
        return view('admin.role.edit',compact('role'));
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
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = 0;
        $role = Role::find($id);
        if($role->status!=1){
            $role->status = 1;
            $res = $role->save();
        }

        if($res){
            $data = [
                'status'=>0,
                'message'=>'删除成功',
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'删除失败',
            ];
        }
        return $data;

    }
}
