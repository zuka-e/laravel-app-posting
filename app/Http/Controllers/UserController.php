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

        if(isset($validated['image'])){ // imageファイル保存(環境で分岐)
          if (\App::environment('production')){
            $image_file = $request->file('image');
            $relative_image_path = Storage::disk('s3')->putFile('profile', $image_file, 'public'); # 時刻ズレあるとエラー
            $absolute_image_path = Storage::disk('s3')->url($relative_image_path);
            Storage::disk('s3')->delete($user->image);
            $user->update(['image' => $relative_image_path]);
          }else{
            $file_name = $validated['image']->hashName();
            $relative_image_path = $validated['image']->storeAs('public/users',$file_name); // /storage/app/~ *public必須
            $absolute_image_path = Storage::disk('local')->url($relative_image_path);
            Storage::disk('local')->delete($user->image); // 要 use Storage 宣言
            $user->update(['image' => $file_name]);
          }
          unset($validated['image']);
        }

          $user->fill($validated)->save();
          $request->session()->flash('msg_type','success');
          $request->session()->flash('msg','保存しました');
          return redirect()->route('users.show', ['user' => $user]);
    }
}
