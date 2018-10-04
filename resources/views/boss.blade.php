@if(isset($subordinate))
	@if($subordinate->employee)
		<span class='subordinate'>{{ $subordinate->name }} - {{ $subordinate->employee->fullname }}</span>
	@else
		<span class='subordinate'>{{ $subordinate->name }}</span>
	@endif
@endif


			

