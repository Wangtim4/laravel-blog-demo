<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller

{
     // 判斷是否有登錄會員
     public function __construct()
     {
        // 除了index，以外都要登陸才可使用
         $this->middleware('auth')->except('index','show');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = Article::orderBy('id','desc')->get();
        // 限制資料筆數+排序
        $articles = Article::with('user')->orderBy('id','desc')->paginate(3);
        return view('articles.index',['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
        ]);

        // 建立關聯
        auth()->user()->articles()->create($content);
        // 成功後回傳訊息
        return redirect()->route('root')->with('notice','文章新增成功!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 抓資料ID
        $article = Article::find($id);
        return view('articles.show',['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 抓資料透過編寫者抓ID
        $article = auth()->user()->articles->find($id);
        // ['article'=>$article]傳到前端的資料
        return view('articles.edit',['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // 抓資料透過編寫者抓ID
        $article = auth()->user()->articles->find($article);
        // 檢查內容
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
        ]);

        $article->update($content);
        return redirect()->route('root')->with('notice','文章更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // 抓資料透過編寫者抓ID
        $article = auth()->user()->articles->find($article);
        $article->delete();
        return redirect()->route('root')->with('notice','文章已刪除');
    }
}
