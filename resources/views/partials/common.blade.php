<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">{{ __($model . '.module') }}列表</h3>
	</div>

	<form id="delete-form" action="#" method="post">
		@csrf
		@method('delete')
		<div class="card-body">
			<table id="itemsTable" class="table table-bordered table-striped datatable">
				<thead>
					<tr>
						<th scope="col"></th>
						<th scope="col" class="all">
							<div class="form-check">
								<input type="checkbox" id="allItems" name="allItems" value="all">
							</div>
						</th>
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
							<td>
								<div class="form-check">
									<input type="checkbox" name="items[]" value="{{ $item->id }}">
								</div>
							</td>
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
								<a href="{{ route($model . '.edit', $item->getKey()) }}" class="btn btn-info btn-flat btn-sm" title="编辑">
									<i class="icon fa fa-edit"></i> 编辑
								</a>
	                        </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		
		<div class="card-footer">
			<div class="row">
				<div class="col">
					<button type="submit" class="btn btn-danger" onclick="return window.confirm('请问确定要删除这些{{ __($model . '.module') }}吗？')">
						<i class="icon fa fa-trash"></i> 删除所选
					</button>
				</div>
			    <div class="col text-right">
					<a href="{{ route($model . '.create') }}" class="btn btn-success">
						<i class="icon fa fa-plus"></i> 创建{{ __($model . '.module') ?: '' }}
					</a>
			    </div>
			</div>
		</div>
	</form>
</div>
