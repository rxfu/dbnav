<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">{{ __($model . '.module') . ' ' . __('List') }}</h3>
	</div>

	<div class="card-body">
		<table id="itemsTable" class="table table-bordered table-striped datatable">
			<thead>
				<tr>
					<th scope="col"></th>
					@foreach ($components as $component)
						@if (!empty($component['list']))
							<th scope="col" class="{{ isset($component['responsive']) ? $component['responsive'] : 'desktop' }}">{{ __($model . '.' . $component['field']) }}</th>
						@endif
					@endforeach
					<th scope="col" class="all">{{ __('Action') }}</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($items as $item)
					<tr>
						<td></td>
						@foreach ($components as $component)
							@if (!empty($component['list']))
								<td>
									@if (!empty($component['presenter']))
										{{ $item->present()->{Illuminate\Support\Str::camel($component['field'])} }}
									@elseif (!empty($component['relation']) && (!is_null($item->{$component['relation']})))
										@if (isset($component['prop']))
											@if (false === stripos(optional($item->{$component['relation']})->{$component['prop']}, 'storage/'))
												{{ optional($item->{$component['relation']})->{$component['prop']} }}
											@else
												<a href="{{ asset(optional($item->{$component['relation']})->{$component['prop']}) }}">下载</a>
											@endif
										@else
											{{ optional($item->{$component['relation']})->name }}
										@endif
									@elseif (!empty($component['relations']) && (!is_null($item->{$component['relations']})))
										{{ optional($item->{$component['relations']})->implode('name', ', ') }}
									@else
										{{ $item->{$component['field']} }}
									@endif
								</td>
							@endif
						@endforeach
						<td>
							<a href="{{ route($model . '.edit', $item->getKey()) }}" class="btn btn-info btn-sm" title="{{ __('Edit') }}">
								<i class="icon fa fa-edit"></i>
							</a>
							<a href="{{ route($model . '.destroy', $item->getKey()) }}" class="btn btn-danger btn-sm" title="{{ __('Delete') }}" onclick="if (window.confirm('请问确定要删除ID为{{ $item->getKey() }}的{{ __($model . '.module') }}吗？')) { event.preventDefault();document.getElementById('delete-form-{{ $item->getKey() }}').submit(); }">
								<i class="icon fa fa-trash"></i>
							</a>
							<form id="delete-form-{{ $item->getKey() }}" action="{{ route($model . '.destroy', $item->getKey()) }}" method="post" style="display: none">
								@csrf
								@method('delete')
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	<div class="card-footer">
		<div class="row">
			<div class="col text-right">
				<a href="{{ route($model . '.create') }}" class="btn btn-success">
					<i class="icon fa fa-plus"></i> {{ __('Create') . ' ' . __($model . '.module') }}
				</a>
			</div>
		</div>
	</div>
</div>
