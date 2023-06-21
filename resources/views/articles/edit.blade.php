@extends('layouts.article')

@section('main')
    <div class="container ">
        <div class="row justify-content-center mt-3">
            <div class="col-8">
                <h1 class="my-3">文章 > 編輯文章</h1>
                

                {{-- 如果有錯誤訊息 --}}
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                      {{-- <h4 class="alert-heading">錯誤訊息</h4> --}}
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                @endif

                <form action="{{ route('articles.update', $article) }}" method="POST">
                    @csrf
                    {{-- 更新用Patch傳遞 --}}
                    @method('patch')
                    <div class="mb-3 p-3 border rounded-2 shadow fs-4 fw-bold">
                        <div class="mb-3">
                            <label for="title" class="form-label">文章標題 : </label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="請輸入文章標題"
                            value="{{$article->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">文章內容 : </label>
                            <textarea name="content" id="content" rows="5" class="form-control" placeholder="請輸入文章內容"
                            >{{$article->content}}</textarea>
                        </div>
                        <div class="d-grid gap-2">
                          <button type="submit" class="btn btn-primary">編輯</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
@endsection
