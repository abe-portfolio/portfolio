<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;

class CafeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function contact(){
        $contacts = DB::select('select * from contacts');
        $data = ['contacts' => $contacts];
        return view('contact',$data);
    }

    public function confirm(Request $request){
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'kana' => 'required',
            'tel' => 'nullable|numeric',
            'address' => 'required|email',
            'content' => 'required',
        ],
        [
            'name.required' => '氏名の入力は必須項目です。',
            'kana.required' => 'フリガナの入力は必須項目です。',
            'address.email' => 'メールアドレスは正しく入力してください。',
            'content.required' => '問い合わせ内容の入力は必須項目です。',
            'tel.numeric' => '電話番号は数字で入力してください。',
        ]);

        return view('confirm')->with($data);
    }

    public function create(Request $request){
        $post = new Contact;
        $post->name = $request->name;
        $post->kana = $request->kana;
        $post->tel = $request->tel;
        $post->email = $request->address;
        $post->body = $request->content;
        $post->save();

        return view('complete');
    }

    //編集画面
    public function update($id){
        $user = Contact::find($id);

        return view('update')->with('user',$user);
    }

    //編集画面
    public function updatecomp(Request $request){
        $data = $request->all;
        $request->validate([
            'name' => 'required',
            'kana' => 'required',
            'tel' => 'nullable|numeric',
            'address' => 'required|email',
            'content' => 'required',
        ],
        [
            'name.required' => '氏名の入力は必須項目です。',
            'kana.required' => 'フリガナの入力は必須項目です。',
            'address.email' => 'メールアドレスは正しく入力してください。',
            'content.required' => '問い合わせ内容の入力は必須項目です。',
            'tel.numeric' => '電話番号は数字で入力してください。',
        ]);

        $post = Contact::find($request->id);
        $post->name = $request->name;
        $post->kana = $request->kana;
        $post->tel = $request->tel;
        $post->email = $request->address;
        $post->body = $request->content;
        $post->timestams = false;
        $post->save();

        return view('updatecomp');
    }

    public function delete($id){
        $book = Contact::find($id);
        $book->delete();

        return redirect('contact');
    }
}
?>