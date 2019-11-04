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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
						<article>
							<header>
								<h1 class="text-capitalize">{{ $item->name }}</h1>
							</header>
							<section>
								{{ $item->present()->status }}
								@if ($item->types->count())
									|
									@foreach ($item->types as $type)
										@php
											$types[] = $type->name
										@endphp
									@endforeach
									{{ implode('、', $types) }}
								@endif
								@if ($item->subjects->count())
									|
									@foreach ($item->subjects as $subject)
										@php
											$subjects[] = $subject->name
										@endphp
									@endforeach
									{{ implode('、', $subjects) }}
								@endif
								@if ($item->languages->count())
									|
									@foreach ($item->languages as $language)
										@php
											$languages[] = $language->name
										@endphp
									@endforeach
									{{ implode('、', $languages) }}
								@endif
							</section>
							
							@if ($item->status === 0 && !empty($item->expired_at))
								<section>
									<p class="text-danger">试用截止日期：{{ $item->expired_at->format('Y年m月d日') }}</p>
								</section>
							@endif
							
							@if (!empty($item->remote_url) || !empty($item->local_url))
								<section>
									<h3>访问地址</h3>
									@unless (empty($item->remote_url))
										<p>
											远程包库：
											@foreach (explode('|', $item->remote_url) as $url)
												<a href="{{ $url }}" title="{{ __('Link') . $loop->iteration }}" target="_blank">{{ __('Link') . $loop->iteration }}</a>
											@endforeach
										</p>
									@endunless
									@unless (empty($item->local_url))
										<p>
											本地镜像：
											@foreach (explode('|', $item->local_url) as $url)
												<a href="{{ $url }}" title="{{ __('Link') . $loop->iteration }}" target="_blank">{{ __('Link') . $loop->iteration }}</a>
											@endforeach
										</p>
									@endunless
								</section>
							@endif

							<section>
								<h3>数据库介绍</h3>
								<p>{{ $item->content }}</p>
							</section>

							@if ($item->links->count())
								<section id="help">
									<h3>帮助文档</h3>
									<ul>
										@foreach ($item->links as $link)
											<li>
												<a href="{{ $link->url }}" title="{{ $link->name }}">{{ $link->name }}</a>
											</li>
										@endforeach
									</ul>
								</section>
							@endif
						</article>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
