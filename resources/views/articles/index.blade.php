@extends('layouts.article')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <h1 class="mt-3 mb-0">文章列表</h1>
                    <a class="btn btn-primary" href="{{ route('articles.create') }}"> 新增列表</a>
                </div>
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="card  mb-3">
                          <div class="card-body">
                            <div class="d-flex justify-content-between align-items-end">
                                <h2 class="card-title mb-0">
                                    <a href="{{route('articles.show',$article)}}" class="list-unstyled">{{$article->title}}</a>
                                </h2>
                                <p class="card-text">{{$article->created_at}} 由 {{$article->user->name}} 分享</p>
                            </div>
                            <div class="d-flex">
                                <a href="{{route('articles.edit',['article' => $article->id])}}" class="btn btn-success me-5">編輯</a>
                                <form action="{{ route('articles.destroy',$article)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">刪除</button>
                                </form>
                                {{-- <p class="card-text">{{substr($article->content,0,5)}}</p> --}}
                            </div>
                          </div>
                        </div>
                    @endforeach
                </div>
                {{-- 加分頁 --}}
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
