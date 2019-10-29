@extends('layouts.frontend')

@section('content')
<div class="container">
    <form action="{{ route('database.search') }}" method="get">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group my-3">
                    <input type="text" name="keyword" id="keyword" class="form-control form-control-lg" placeholder="数据库检索"" aria-label="数据库检索"" aria-describedby="btnSearch">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-lg" type="submit" name="search" id="search">{{ __('Search') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-2 text-right">首字母</dt>
                            <dd class="col-sm-10">
                                @foreach (range('A', 'Z') as $letter)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="letters[]" id="{{ $letter }}" class="form-check-input" value="{{ $letter }}">
                                    <label class="form-check-label" for="{{ $letter }}">{{ $letter }}</label>
                                </div>
                                @endforeach
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="letters[]" id="number" class="form-check-input" value="number">
                                    <label class="form-check-label" for="number">0~9</label>
                                </div>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2 text-right">学科</dt>
                            <dd class="col-sm-10">
                                @foreach ($subjects as $subject)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="subjects[]" id="subject-{{ $subject->id }}" class="form-check-input" value="{{ $subject->id }}">
                                    <label class="form-check-label" for="subject-{{ $subject->id }}">{{ $subject->name }}</label>
                                </div>
                                @endforeach
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2 text-right">内容类型</dt>
                            <dd class="col-sm-10">
                                @foreach ($types as $type)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="types[]" id="type-{{ $type->id }}" class="form-check-input" value="{{ $type->id }}">
                                    <label class="form-check-label" for="type-{{ $type->id }}">{{ $type->name }}</label>
                                </div>
                                @endforeach
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2 text-right">语种</dt>
                            <dd class="col-sm-10">
                                @foreach ($languages as $language)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="languages[]" id="language-{{ $language->id }}" class="form-check-input" value="{{ $language->id }}">
                                    <label class="form-check-label" for="language-{{ $language->id }}">{{ $language->name }}</label>
                                </div>
                                @endforeach
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-2 text-right">状态</dt>
                            <dd class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="statuses[]" id="trial" class="form-check-input" value="0">
                                    <label class="form-check-label" for="trial">{{ __('Trial') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="statuses[]" id="normal" class="form-check-input" value="1">
                                    <label class="form-check-label" for="normal">{{ __('Normal') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="statuses[]" id="open" class="form-check-input" value="2">
                                    <label class="form-check-label" for="open">{{ __('Opening') }}</label>
                                </div>
                            </dd>
                        </dl>
                    </div>

                    <table id="itemsTable" class="table table-striped datatable">
                        <thead>
                            <th>数据库名称</th>
                            <th>数据库简介</th>
                            <th>访问地址</th>
                        </thead>
                        <tbody>
                            @foreach ($databases as $database)
                                <tr>
                                    <td>
                                        <a href="{{ route('show', $database) }}" title="{{ $database->name }}">{{ $database->name }}</a>
                                    </td>
                                    <td>{{ $database->brief }}</td>
                                    <td>
                                        @unless (empty($database->remote_url))
                                            <div>
                                                远程包库：
                                                @foreach (explode('|', $database->remote_url) as $url)
                                                    <a href="{{ $url }}" title="{{ __('Link') . $loop->iteration }}" target="_blank">{{ __('Link') . $loop->iteration }}</a>
                                                @endforeach
                                            </div>
                                        @endunless
                                        @unless (empty($database->local_url))
                                            <div>
                                                本地镜像：
                                                @foreach (explode('|', $database->local_url) as $url)
                                                    <a href="{{ $url }}" title="{{ __('Link') . $loop->iteration }}" target="_blank">{{ __('Link') . $loop->iteration }}</a>
                                                @endforeach
                                            </div>
                                        @endunless
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
