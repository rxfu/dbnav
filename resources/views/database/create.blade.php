@extends('layouts.app')

@section('content')
<div class="row justify-content-sm-center">
	<div class="col-sm-8">
		<div class="card card-success">
			<div class="card-header">
				<h3 class="card-title">{{ __('Create') . ' ' . __('database.module') }}</h3>
			</div>

		    <form role="form" id="create-form" name="create-form" method="post" action="{{ route('database.store') }}" enctype="multipart/form-data">
		        @csrf
				<div class="card-body">
					<div class="form-group row">
						<label for="name" class="col-sm-3 col-form-label">{{ __('database.name') }}</label>
						<div class="col-md-9">
							<input type="text" name="name" id="name" class="form-control @error('name') is_invalid @enderror" placeholder="{{ __('database.name') }}" value="{{ old('name') }}" required>
							<span class="text-danger">（*{{ __('Required') }}）</span>
							@error('name')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="slug" class="col-sm-3 col-form-label">{{ __('database.slug') }}</label>
						<div class="col-md-9">
							<input type="text" name="slug" id="slug" class="form-control @error('slug') is_invalid @enderror" placeholder="{{ __('database.slug') }}" value="{{ old('slug') }}" required>
							<span class="text-danger">（*{{ __('Required') }}）</span>
							@error('slug')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="remote_url" class="col-sm-3 col-form-label">{{ __('database.remote_url') }}</label>
						<div class="col-md-9">
							<textarea name="remote_url" id="remote_url" rows="5" class="form-control @error('remote_url') is_invalid @enderror" placeholder="{{ __('remote_url') }}">{{ old('remote_url') }}</textarea>
							@error('remote_url')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="local_url" class="col-sm-3 col-form-label">{{ __('database.local_url') }}</label>
						<div class="col-md-9">
							<textarea name="local_url" id="local_url" rows="5" class="form-control @error('local_url') is_invalid @enderror" placeholder="{{ __('local_url') }}">{{ old('local_url') }}</textarea>
							@error('local_url')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="brief" class="col-sm-3 col-form-label">{{ __('database.brief') }}</label>
						<div class="col-md-9">
							<textarea name="brief" id="brief" rows="5" class="form-control @error('brief') is_invalid @enderror" placeholder="{{ __('brief') }}">{{ old('brief') }}</textarea>
							@error('brief')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="content" class="col-sm-3 col-form-label">{{ __('database.content') }}</label>
						<div class="col-md-9">
							<textarea name="content" id="content" rows="10" class="form-control @error('content') is_invalid @enderror" placeholder="{{ __('content') }}">{{ old('content') }}</textarea>
							@error('content')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="subject" class="col-sm-3 col-form-label pt-0">{{ __('database.subject') }}</label>
						<div class="col-md-9">
							@foreach ($subjects as $subject)
								<div class="form-check form-check-inline">
									<input type="checkbox" name="subjects[]" id="subject{{ $loop->index }}" class="form-check-input @error('subjects[]') is_invalid @enderror" value="{{ $subject->id }}">
									<label class="form-check-label" for="subject{{ $loop->index }}">{{ $subject->name }}</label>
								</div>
							@endforeach
							@error('subjects[]')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="type" class="col-sm-3 col-form-label pt-0">{{ __('database.type') }}</label>
						<div class="col-md-9">
							@foreach ($types as $type)
								<div class="form-check form-check-inline">
									<input type="checkbox" name="types[]" id="type{{ $loop->index }}" class="form-check-input @error('types[]') is_invalid @enderror" value="{{ $type->id }}">
									<label class="form-check-label" for="type{{ $loop->index }}">{{ $type->name }}</label>
								</div>
							@endforeach
							@error('types[]')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="language" class="col-sm-3 col-form-label pt-0">{{ __('database.language') }}</label>
						<div class="col-md-9">
							@foreach ($languages as $language)
								<div class="form-check form-check-inline">
									<input type="checkbox" name="languages[]" id="language{{ $loop->index }}" class="form-check-input @error('languages[]') is_invalid @enderror" value="{{ $language->id }}">
									<label class="form-check-label" for="language{{ $loop->index }}">{{ $language->name }}</label>
								</div>
							@endforeach
							@error('languages[]')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-sm-3 col-form-label pt-0">{{ __('database.status') }}</label>
						<div class="col-md-9">
							<div class="form-check form-check-inline">
								<input type="radio" name="status" id="trial" class="form-check-input @error('status') is_invalid @enderror" value="0" checked>
								<label class="form-check-label" for="trial">{{ __('Trial') }}</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" name="status" id="normal" class="form-check-input @error('status') is_invalid @enderror" value="1">
								<label class="form-check-label" for="normal">{{ __('Normal') }}</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" name="status" id="opening" class="form-check-input @error('status') is_invalid @enderror" value="2">
								<label class="form-check-label" for="opening">{{ __('Opening') }}</label>
							</div>
							@error('status')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="expired_at" class="col-sm-3 col-form-label">{{ __('database.expired_at') }}</label>
						<div class="col-md-9">
							<div class="input-group date datetimepicker" id="expired_at" data-target-input="nearest">
								<input type="text" name="expired_at" class="form-control datetimepicker-input @error('expired_at') is_invalid @enderror" placeholder="{{ __('database.expired_at') }}" value="{{ old('expired_at') }}" data-target="#expired_at">
								<div class="input-group-append" data-target="#expired_at" data-toggle="datetimepicker">
									<div class="input-group-text">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
							</div>
						</div>
						@error('expired_at')
							<div class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</div>
						@enderror
					</div>
					<div class="form-group row" id="links">
						<label for="link" class="col-sm-3 col-form-label">{{ __('database.link') }}</label>
						<div class="col-md-9">
							<div class="row">
								<div class="col-sm-2">
									<select id="link_type" name="link_type" class="form-control link-change">
										<option value="link" selected>{{ __('Link') }}</option>
										<option value="file">{{ __('File') }}</option>
									</select>
								</div>
								<div class="col">
									<input type="text" name="link_name" id="link_names[]" class="form-control @error('link_name') is_invalid @enderror" placeholder="{{ __('Link name') }}" value="{{ old('link_name') }}">
								</div>
								<div class="col link_content">
									<input type="text" name="link_url" id="link_urls[]" class="form-control @error('link_url') is_invalid @enderror" placeholder="{{ __('Link url') }}" value="{{ old('link_url') }}">
								</div>
								<div class="col-sm-2 pt-2">
									<a title="{{ __('Add') }}" class="text-success link-add" style="cursor:pointer"><i class="fa fa-plus"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="remark" class="col-sm-3 col-form-label">{{ __('database.remark') }}</label>
						<div class="col-md-9">
							<textarea name="remark" id="remark" rows="5" class="form-control @error('remark') is_invalid @enderror" placeholder="{{ __('remark') }}">{{ old('remark') }}</textarea>
							@error('remark')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="order" class="col-sm-3 col-form-label">{{ __('database.order') }}</label>
						<div class="col-md-9">
							<input type="number" name="order" id="order" class="form-control @error('order') is_invalid @enderror" placeholder="{{ __('database.order') }}" value="{{ old('order') }}">
							@error('order')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
					<div class="form-group row">
						<label for="top" class="col-sm-3 col-form-label">{{ __('database.top') }}</label>
						<div class="col-md-9">
							<div class="form-check form-check-inline">
								<input type="radio" name="top" id="no" class="form-check-input @error('top') is_invalid @enderror" value="0" checked>
								<label class="form-check-label" for="no">{{ __('No') }}</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" name="top" id="yes" class="form-check-input @error('top') is_invalid @enderror" value="1">
								<label class="form-check-label" for="yes">{{ __('Yes') }}</label>
							</div>
							@error('top')
								<div class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</div>
							@enderror
						</div>
					</div>
				</div>

				<div class="card-footer">
					<div class="row justify-content-sm-center">
				        <button type="submit" class="btn btn-success">
				            <i class="icon fa fa-save"></i> {{ __('Create') }}
				        </button>
				    </div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop

@push('styles')
<!-- DateTimePicker -->
<link href="{{ asset('vendor/datetimepicker/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<!-- Convert Chinese to Pinyin -->
<script src="{{ asset('js/pinyin.js') }}"></script>
<!-- DateTimePicker -->
<script src="{{ asset('vendor/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('vendor/datetimepicker/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
$(function() {
    $('.datetimepicker').datetimepicker({
    	locale: 'zh-cn',
    	icons: {
    		time: 'far fa-clock',
    		date: 'far fa-calendar-alt',
    		up: 'fas fa-arrow-up',
    		down: 'fas fa-arrow-down'
		},
		format: 'L'
	});

	// 汉字转换成拼音
	$('#name').blur(function () {
		$('#slug').val(pinyin.getFullChars($(this).val()));
	});

	$('body').on('change', '.link-change', function() {
		var linkUrl = '<input type="text" name="link_urls[]" id="link_url" class="form-control @error('link_url') is_invalid @enderror" placeholder="{{ __('Link url') }}" value="{{ old('link_url') }}">';
		var linkFile = '<input type="file" name="link_files[]" id="link_file" class="form-control-file @error('link_file') is_invalid @enderror" value="{{ old('link_file') }}">';
		var linkContent = $(this).closest('.link_content');
		linkContent.empty();

		if ($('#link_type').val() == 'link') {
			linkContent.html(linkUrl);
		} else {
			linkContent.html(linkFile);
		}
	});

	$('body').on('click', '.link-add', function() {
		var link = '<div class="form-group row">\
						<label for="link" class="col-sm-3 col-form-label"></label>\
						<div class="col-md-9">\
							<div class="row">\
								<div class="col-sm-2">\
									<select id="link_type" name="link_type" class="form-control">\
										<option value="link" selected>{{ __('Link') }}</option>\
										<option value="file">{{ __('File') }}</option>\
									</select>\
								</div>\
								<div class="col">\
									<input type="text" name="link_names[]" id="link_name" class="form-control @error('link_name') is_invalid @enderror" placeholder="{{ __('Link name') }}" value="{{ old('link_name') }}">\
								</div>\
								<div class="col link_content">\
									<input type="text" name="link_urls[]" id="link_url" class="form-control @error('link_url') is_invalid @enderror" placeholder="{{ __('Link url') }}" value="{{ old('link_url') }}">\
								</div>\
								<div class="col-sm-2 pt-2">\
									<a title="{{ __('Add') }}" class="text-success link-add" style="cursor:pointer"><i class="fa fa-plus"></i></a>\
									<a title="{{ __('Remove') }}" class="text-danger link-remove" style="cursor:pointer"><i class="fa fa-minus"></i></a>\
								</div>\
							</div>\
						</div>\
					</div>';
		$(this).closest('.form-group').after(link);
	});

	$('body').on('click', '.link-remove', function() {
		$(this).closest('.form-group').remove();
	})
});
</script>
@endpush
