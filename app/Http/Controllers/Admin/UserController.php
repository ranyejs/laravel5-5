<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * 获取用户列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userList = AdminUser::where('status', 0)->paginate(5);

        return view('admin.user.list',compact('userList'));
    }

    /**
     * 创建用户信息
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * 执行添加操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input);
//        $rule = [
//            'tel' => 'required|size:11|numeric',
//            'username' => 'alpha_dash|required|between:6,18',
//            'pass' => 'alpha_dash|required|between:4,18',
//        ];
//        $msg = [
//            'tel.required'=>'账号不能为空',
//            'tel.size'=>'账号不合法',
//            'tel.numeric'=>'账号不合法',
//            'username.required'=>'用户名必须输入',
//            'username.alpha_dash'=>'密码字符只能是字母、数字、下划线',
//            'username.between'=>'用户名长度必须在4~18之间',
//            'pass.required'=>'密码不能为空',
//            'pass.alpha_dash' => '密码字符只能是字母、数字、下划线',
//            'pass.between'=>'密码长度必须在4~18之间',
//        ];
//        $validator = Validator::make($input,$rule,$msg);

        $data_add = [
            'username' => $input['username'],
            'phone'   => $input['tel'],
            'password' => Crypt::encrypt($input['pass']),
            'createtime' => date('Y-m-d H:i:s')
        ];
        $find = AdminUser::where('username',$input['username'])->first();
        if($find){
            $data = [
                'status'=>2,
                'message'=>'该用户已存在,请勿重复添加',
            ];
            return $data;
        }
        $res = AdminUser::create([
            'username' => $input['username'],
            'phone'   => $input['tel'],
            'password' => Crypt::encrypt($input['pass']),
            'createtime' => date('Y-m-d H:i:s')
        ]);
        //dd($res);
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
     * 修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = AdminUser::find($id);
        return view('admin.user.edit',compact('user'));
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
       //dd($id);
        $username= $request->input('username');
        $phone = $request->input('tel');
        $user = AdminUser::find($id);

        $user->username = $username;
        $user->phone = $phone;
        $res = $user->save();
        if($res){
            $data = [
                'status'=>0,
                'message'=>'修改成功',
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'修改失败',
            ];
        }
        return $data;
    }

    /**
     * 执行删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $res = 0;
        $user = AdminUser::find($id);
        if($user->status!=1){
            $user->status = 1;
            $res = $user->save();
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
