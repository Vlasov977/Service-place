<?php

namespace App\Http\Controllers;

use App\Post;
use App\Social;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->published()->RangeData()->with('user')->paginate(20);

        return view('index', compact('posts'));
    }

    public function user($id = null)
    {
        $user = User::whereId($id)->with(['posts' => function ($query) {
            $query->where('status', '=', 'Published');
        }], 'social')->first();

        return view('user', compact('user'));
    }

    public function profile()
    {
        $user = User::where('id', Auth::id())->with('posts', 'social')->first();

        return view('profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('editProfile', compact('user'));
    }

    public function updateProfile(User $user, Request $request)
    {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:users',
        ]);

        if ($request->password && !empty($request->password)){
            $request->validate([
                'password' => 'string|min:6|confirmed',
            ]);
        }

        $user = Auth::user();

        if ($request->hasFile('avatar')){
            $profileImage = $request->file('avatar');
            $profileImageSaveAsName = time() . $request->file('avatar')->getClientOriginalExtension();

            $upload_path = 'storage/users/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);

            $user->avatar = $profile_image_url;
        }

        $user->name = request('name');
        $user->lastName = request('lastName');
//        $user->password = bcrypt(request('password'));

        $user->save();

        return redirect()->to('/profile');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function social()
    {
        $socials = Social::where('user_id', Auth::id())->first();

        return view('social',compact('socials'));
    }

    public function social_update(Request $request)
    {
        $request->validate([
            'facebook' => 'max:255',
            'viber' => 'max:255',
            'telegram' => 'max:255',
            'vk' => 'max:255',
            'linkedIn' => 'max:255',
            'instagram' => 'max:255',
            'whatsApp' => 'max:255',
        ]);

        $social = Social::where('user_id', Auth::id())->first();

        if ($social){
            $social->facebook = $request->facebook;
            $social->viber = $request->viber;
            $social->telegram = $request->telegram;
            $social->vk = $request->vk;
            $social->linkedIn = $request->linkedIn;
            $social->instagram = $request->instagram;
            $social->whatsApp = $request->whatsApp;
            $social->save();
        }else{
            $social = new Social();
            $social->user_id = Auth::id();
            $social->facebook = $request->facebook;
            $social->viber = $request->viber;
            $social->telegram = $request->telegram;
            $social->vk = $request->vk;
            $social->linkedIn = $request->linkedIn;
            $social->instagram = $request->instagram;
            $social->whatsApp = $request->whatsApp;
            $social->save();
        }

        return redirect()->to('/profile');
    }

    public function social_delete($name = null)
    {
        $social = Social::where('user_id', Auth::id())->first();
        $social->fill([
            "$name" => ""
        ]);
        $social->save();

        return redirect()->to('/profile');
    }
}
