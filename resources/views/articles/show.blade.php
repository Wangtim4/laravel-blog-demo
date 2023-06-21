@extends('layouts.article')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <div class="row">

                        <div class="border border-5" style="width: 80vw">
                            <h2 class="card-title  border-bottom">
                                {{ $article->title }}
                            </h2>
                            <p class="card-text">{{ $article->created_at }} 由 {{ $article->user->name }} 分享</p>
                            <p class="card-text">{{ $article->content}}</p>
                            <a href="{{route('articles.index')}}" class="btn btn-primary">回首頁</a>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
