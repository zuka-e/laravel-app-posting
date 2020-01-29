<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified')->only(['edit','update']);
        $this->authorizeResource(User::class, 'user'); // Policy(認可)
    }
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
          return view('users.edit', ['user' => $user]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();

        if ($validated['password']) {
          $validated['password'] = Hash::make($validated['password']);
        } else { // password空欄時は$validatedから除く
            unset($validated['password']);
        }

        if(isset($validated['image'])){
          $file_name = $validated['image']->hashName();
          $validated['image']->storeAs('public/users',$file_name); // /storage/app/~ *public必須
          Storage::disk('local')->delete('public/users/'.$user->image); // 要 use Storage 宣言
          $user->update(['image' => $file_name]);
          unset($validated['image']);
        }

          $user->fill($validated)->save();
          $request->session()->flash('msg_type','success');
          $request->session()->flash('msg','保存しました');
          return redirect()->route('users.show', ['user' => $user]);
    }
}
