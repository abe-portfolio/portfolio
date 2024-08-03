<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Swipe;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $authUserRole = Auth::user()->role;

        //すでにSwipeしたuserを省いて、swipeしていないuserを１つ取得
        $swipedUserIds = Swipe::where('from_user_id', Auth::user()->id)->pluck('to_user_id');

        $user = User::where('id', '<>', Auth::user()->id)
                    ->whereNotIn('id', $swipedUserIds)
                    ->where('role', '<>', $authUserRole) // Authユーザーのroleカラムの値以外のユーザーを抽出
                    ->first();

        //if (!$user) {
        //    return view('pages.user.index', [
        //        'user' => null
        //    ]);
        //}
        return view('pages.user.index',[
            'user' => $user
        ]);
    }


    //管理者-ユーザー一覧取得
    public function index_for_admin()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('pages.user.users_for_admin', compact('users'));
    }


    //管理者-ユーザー削除
    public function UserDestroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users.for_admin')->with('success', 'ユーザーを削除しました。');
    }
    

    //退会画面の表示
    public function delete()
    {
        return view('pages.withdrawal.withdrawal');
    }


    //退会(アカウント削除)処理
    public function destroy()
    {
        $user = auth()->user();
        $user->delete();

        //redirect()はurl関数
        return redirect('/login');
    }
    

    //退会(アカウント削除)キャンセル処理
    public function destroy_cancel()
    {
        //redirect()はurl関数
        return redirect('/myPage');
    }


    //バリデーション
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:0,1,2',
        ]);
    
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->role = $validated['role'];
        $user->save();
    
        return redirect()->route('home');
    }


    //編集画面に表示するログインユーザーの情報
    public function edit()
    {
        $user = Auth::user();
        return view('pages.myPage.myPageEdit', compact('user'));
    }

    //登録情報のアップデート処理
    public function update(Request $request)
    {
    $user = Auth::user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    // ユーザーのIDを取得
    $userId = $user->id;

    // DBからユーザーのプロフィール画像のURLを取得
    $imgUrl = DB::table('users')->where('id', $userId)->value('img_url');

    // 画像アップロード処理
    if ($request->hasFile('img_url')) {
        $profileImage = $request->file('img_url');
        $path = $profileImage->store('public/img_url');
        $user->profile_image = str_replace('public/', 'storage/', $path);
    } else {
        $user->profile_image = $imgUrl;
    }

    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $user->save();
    return redirect()->route('mypage.edit');
    }

    
    //退会(アカウント削除)キャンセル処理
    public function update_cancel()
    {
        //redirect()はurl関数
        return redirect('/myPage');
    }


    //お問い合わせページへ遷移
    public function contact()
    {
        return view('pages.contact.contact');
    }

    
    //送信完了画面へ遷移
    public function contact_submit(Request $request)
    {
        // バリデーションを実行する
        $request->validate([
            'email' => 'required|email',
            'body' => 'required',
        ]);

        // Contactモデルの新しいインスタンスを作成し、入力された値をプロパティに設定して保存する
        $contact = new Contact;
        $contact->email = $request->email;
        $contact->body = $request->body;
        $contact->save();

        // 成功した場合は、ホームページにリダイレクトする
        return view('pages.contact.complete')->with('success', 'お問い合わせが送信されました。');
    }

    public function contact_cancel()
    {
        return redirect('/myPage');
    }

    
    //マイページへ戻る
    public function back_page()
    {
        return redirect('/myPage');
    }


    //(管理者用)問い合わせ一覧ページを表示
    public function contacts()
    {
        $bodys = Contact::all();
        return view('pages.contact.contactAll', compact('bodys'));
    }

    //(管理者用)お問い合わせ詳細画面
    //public function contact_detail($id)
    //{
    //$body = Contact::findOrFail($id);
    //return view('pages.contact.detail', compact('body'));
    //}

    public function contact_detail(Request $request)
    {
    $body = Contact::findOrFail($request->id);
    return view('pages.contact.detail', compact('body'));
    }



    //(管理者用)問い合わせ一覧ページへ戻る
    public function back_contacts()
    {
    $bodys = Contact::orderByDesc('updated_at')->get();
    return view('pages.contact.contactAll', compact('bodys'));
    }
}
?>