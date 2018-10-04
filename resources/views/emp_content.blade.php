<table class='table table-striped table-bordered table-hover table-sm'>
	<thead>
		<tr>
			<th><a href="#" class="fieldsort" id="fullname">ФИО</a></th>
			<th><a href="#" class="fieldsort" id="position_id">Должность</a></th>
			<th><a href="#" class="fieldsort" id="datein">Дата приема на работу</a></th>
			<th><a href="#" class="fieldsort" id="salary">Заработная плата</a></th>
			<th><a href="#" class="fieldsort" id="photo">Фотография</a></th>
			<th>Действие</th>
		</tr>
	</thead>
	<tbody class='trt'>
@if($employees)
	@foreach($employees as $employee)
		<tr>
			<td><a href="{{ route('employee.edit', ['id'=>$employee->id] ) }}">{{ $employee->fullname }}</a></td>
			<td>{{ $employee->posit->name }}</td>
			<td>{{ $employee->datein }}</td>
			<td>{{ $employee->salary }}</td>
			<td><img src="{{ '/images/'.$employee->img }}" width="50"></td>
			<td>
				<form action="{{ route('employee.destroy', ['id'=>$employee->id]) }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="DELETE">
					<input type="submit" class="btn btn-danger btn-sm delete" value="Удалить">
				</form>
			</td>
		</tr>
	@endforeach	
@endif		
	</tbody>
</table>

{!! $employees->links() !!}

			

