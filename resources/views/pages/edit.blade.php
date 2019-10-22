@extends('layouts.app')

@section('content')
@php
	$model = request()->segment(1);
	$components = config('components.' . $model)
@endphp
<div class="row justify-content-sm-center">
	<div class="col-sm-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">{{ __('Edit') . ' ' . __($model . '.module') . ' ' . $item->name }}</h3>
			</div>
			
		    <form role="form" id="edit-form" name="edit-form" method="post" action="{{ route($model . '.update', $item->getKey()) }}" enctype="multipart/form-data">
		        @csrf
		        @method('put')
				<div class="card-body">
					@foreach ($components as $component)
						@if (!empty($component['edit']))
			                <div class="form-group row">
			                    <label for="{{ $component['field'] }}" class="col-sm-3 col-form-label">{{ __($model . '.' . $component['field']) }}</label>
			                    <div class="col-md-9">
									@if ('text' === $component['type'])
				                    	<input type="text" name="{{ $component['field'] }}" id="{{ $component['field'] }}" class="{{ empty($component['readonly']) ? 'form-control' : 'form-control-plaintext' }} @error($component['field']) is_invalid @enderror" placeholder="{{ __($model . '.' . $component['field']) }}" value="{{ old($component['field'], $item->{$component['field']}) }}"{{ !empty($component['required']) ? ' required' : '' }}{{ !empty($component['readonly']) ? ' readonly' : '' }}{{ !empty($component['disabled']) ? ' disabled' : '' }}>
						            @elseif ('password' === $component['type'])
				                    	<input type="password" name="{{ $component['field'] }}" id="{{ $component['field'] }}" class="form-control @error($component['field']) is_invalid @enderror" placeholder="{{ __($model . '.' . $component['field']) }}"{{ !empty($component['required']) ? ' required' : '' }}{{ !empty($component['readonly']) ? ' readonly' : '' }}{{ !empty($component['disabled']) ? ' disabled' : '' }}>
						            @elseif ('textarea' === $component['type'])
						            	<textarea name="{{ $component['field'] }}" id="{{ $component['field'] }}" rows="5" class="form-control @error($component['field']) is_invalid @enderror"{{ !empty($component['required']) ? ' required' : '' }}{{ !empty($component['readonly']) ? ' readonly' : '' }}{{ !empty($component['disabled']) ? ' disabled' : '' }}>{{ old($component['field'], $item->{$component['field']}) }}</textarea>
						            @elseif ('radio' === $component['type'])
						            	@foreach (explode('|', $component['values']) as $pair)
						            		@php
						            			$value = explode(':', $pair)
						            		@endphp
					                    	<div class="form-check form-check-inline">
					                    		<input type="radio" name="{{ $component['field'] }}" id="{{ $component['field']. $loop->index }}" class="form-check-input @error($component['field']) is_invalid @enderror" value="{{ $value[0] }}"{{ !empty($component['required']) ? ' required' : '' }}{{ old($component['field'], $item->{$component['field']}) == $value[0] ? ' checked' : '' }}{{ !empty($component['readonly']) ? ' readonly' : '' }}{{ !empty($component['disabled']) ? ' disabled' : '' }}>
					                    		<label class="form-check-label" for="{{ $component['field'] . $loop->index }}">{{ $value[1] }}</label>
					                    	</div>
						            	@endforeach
						            @elseif ('checkbox' === $component['type'])
						            	@foreach (explode('|', $component['values']) as $pair)
						            		@php
						            			$value = explode(':', $pair)
						            		@endphp
					                    	<div class="form-check form-check-inline">
					                    		<input type="checkbox" name="{{ $component['field'] }}" id="{{ $component['field']. $loop->index }}" class="form-check-input @error($component['field']) is_invalid @enderror" value="{{ $value[0] }}"{{ !empty($component['required']) ? ' required' : '' }}{{ old($component['field'], $item->{$component['field']}) == $value[0] ? ' checked' : '' }}{{ !empty($component['readonly']) ? ' readonly' : '' }}{{ !empty($component['disabled']) ? ' disabled' : '' }}>
					                    		<label class="form-check-label" for="{{ $component['field'] . $loop->index }}">{{ $value[1] }}</label>
					                    	</div>
						            	@endforeach
						            @elseif ('select' === $component['type'])
						            	<select name="{{ $component['field'] }}" id="{{ $component['field'] }}" class="form-control @error($component['field']) is_invalid @enderror"{{ !empty($component['required']) ? ' required' : '' }}{{ !empty($component['readonly']) ? ' readonly' : '' }}{{ !empty($component['disabled']) ? ' disabled' : '' }}>
						            		@foreach (${$component['collection']} as $collection)
						            			<option value="{{ $collection->id }}"{{ old($component['field'], $item->{$component['field']}) == $collection->id ? ' selected' : '' }}>{{ $collection->name }}</option>
						            		@endforeach
						            	</select>
						            @elseif ('file' === $component['type'])
				                    	<input type="file" name="{{ $component['field'] }}" id="{{ $component['field'] }}" class="form-control-file @error($component['field']) is_invalid @enderror" value="{{ old($component['field'], $component['default'] ?? null) }}"{{ !empty($component['required']) ? ' required' : '' }}{{ !empty($component['readonly']) ? ' readonly' : '' }}{{ !empty($component['disabled']) ? ' disabled' : '' }}>
				                    	@if (!empty($item->{$component['field']}))
				                    		<small class="form-text text-muted">
				                    			<a href="{{ asset($item->{$component['field']}) }}" title="{{ __($model . '.' . $component['field']) }}">{{ __($model . '.' . $component['field']) }}</a>
				                    		</small>
				                    	@endif
						            @elseif ('datetime' === $component['type'])
						            	<div class="form-group">
						            		<div class="input-group date datetimepicker" id="{{ $component['field'] }}" data-target-input="nearest">
						            			<input type="text" name="{{ $component['field'] }}" class="{{ empty($component['readonly']) ? 'form-control datetimepicker-input' : 'form-control-plaintext' }} @error($component['field']) is_invalid @enderror" placeholder="{{ __($model . '.' . $component['field']) }}" value="{{ old($component['field'], $item->{$component['field']}) }}"{{ !empty($component['required']) ? ' required' : '' }}{{ !empty($component['readonly']) ? ' readonly' : '' }}{{ !empty($component['disabled']) ? ' disabled' : '' }} data-target="#{{ $component['field'] }}">
						            			<div class="input-group-append" data-target="#{{ $component['field'] }}" data-toggle="datetimepicker">
		                        					<div class="input-group-text">
		                        						<i class="fa fa-calendar"></i>
		                        					</div>
		                    					</div>
		                    				</div>
						            	</div>
					                @endif
			                    	@if (!empty($component['required']))
			                    		<span class="text-danger">（*{{ __('Required') }}）</span>
			                    	@endif
					                @if (!empty($component['help']))
					                	<small class="form-text text-muted">{{ $component['help'] }}</small>
					                @endif
			                        @if ($errors->has($component['field']))
				                        <div class="invalid-feedback" role="alert">
				                            <strong>{{ $errors->first($component['field']) }}</strong>
				                        </div>
			                        @endif
			                    </div>
			                </div>
					    @endif
					@endforeach
				</div>

				<div class="card-footer">
					<div class="row justify-content-sm-center">
				        <button type="submit" class="btn btn-info">
				            <i class="icon fa fa-save"></i> {{ __('Save') }}
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
<!-- DateTimePicker -->
<script src="{{ asset('vendor/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('vendor/datetimepicker/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
$(function() {
	$('#birthday').datetimepicker({
		format: 'L',
    	locale: 'zh-cn',
    	icons: {
    		time: 'far fa-clock',
    		date: 'far fa-calendar-alt',
    		up: 'fas fa-arrow-up',
    		down: 'fas fa-arrow-down'
    	}
	});
    $('.datetimepicker').datetimepicker({
    	locale: 'zh-cn',
    	icons: {
    		time: 'far fa-clock',
    		date: 'far fa-calendar-alt',
    		up: 'fas fa-arrow-up',
    		down: 'fas fa-arrow-down'
    	}
	});
});
</script>
@endpush
