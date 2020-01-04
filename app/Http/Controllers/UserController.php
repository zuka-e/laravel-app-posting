<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Auth;
use Storage;

class UserController extends Controller
{
    /**
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Auth::check() && $user->id == Auth::user()->id){
          return view('users.edit', ['user' => $user]);
        }else{
          session()->flash('msg_type','info');
          session()->flash('msg','ログインしてください');
          return redirect()->route('login');
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $params = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone_number' => ['required', 'string'],
            'email' => ['required', 'string','email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable','string', 'min:8', 'confirmed'] // password空欄時はvalidate素通り
        ]);
        if ($params['password']) { // password空欄時は$paramsから除く
          $params['password'] = Hash::make($params['password']);
        } else {
            unset($params['password']);
        }
        if($request->image){
          $file_name = $request->image->hashName();
          $request->image->storeAs('public/users',$file_name); // /storage/app/~ *public必須
          Storage::disk('local')->delete('public/users/'.$user->image); // 要 use Storage 宣言
          $user->update(['image' => $file_name]);
        }
        if(Auth::check() && $user->id == Auth::user()->id){
          $user->fill($params)->save();
          $request->session()->flash('msg_type','success');
          $request->session()->flash('msg','保存しました');
          return redirect()->route('users.show', ['user' => $user]);
        }else{
          $request->session()->flash('msg_type','info');
          $request->session()->flash('msg','ログインしてください');
          return redirect()->route('login');
        }
    }
}
