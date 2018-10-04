@extends('layouts.app')

@section('content')
	<h3 class='text-center'>Список сотрудников</h3>

	<div class='row'>
		<div class='col-4'>
			<label for="fulln">Поиск: </label>
			<input type='text' name='fullname' id='fulln'>
		</div>
		<div class='col-4'>
			<a href="{{ route('employee.create') }}" class='btn btn-primary btn-sm'>Добавить сотрудника</a>
		</div>
	</div>
	<div class='employees'>
		@include('emp_content')
	</div>
@endsection	
