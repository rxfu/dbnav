@extends('layouts.frontend')

@section('content')
<div class="container">
    <form action="#" method="get">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group my-3">
                    <input type="text" name="search" id="search" class="form-control form-control-lg" placeholder="数据库检索"" aria-label="数据库检索"" aria-describedby="btnSearch">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-lg" type="submit" id="btnSearch">{{ __('Search') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
						<article>
							<header class="text-center">
								<h1 class="text-capitalize">{{ $item->name }}</h1>
							</header>
							<section>
								{{ $item->present()->status }} | {{ optional($item->type)->name }} | {{ optional($item->subject)->name }} | {{ optional($item->language)->name }}
							</section>
							<section>
								<p>试用截止日期：{{ $item->expired_at->format('Y年m月d日') }}</p>
							</section>
							<section>
								<h3>访问地址</h3>
								<p>
									</p><a href="{{ $item->remote_url }}">请点击此处访问远程包库</a>
								</p>
								<p>
									<a href="{{ $item->local_url }}">请点击此处访问本地镜像</a>
								</p>
							</section>
							<section>
								<h3>数据库介绍</h3>
								<p>{{ $item->content }}</p>
							</section>
							<section>
								<h3>帮助文档</h3>
								<p>{{ $item->files }}</p>
							</section>
						</article>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
