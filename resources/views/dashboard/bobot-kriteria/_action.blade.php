<a href="{{ route('kriteria.bobot-kriteria.edit',['kriterium' => request()->kriterium ,'bobot_kriterium' => $id]) }}" class="btn btn-info">
	<svg class="c-icon">
		<use xlink:href="{{ asset('icons/svg/free.svg#cil-pencil') }}"></use>
	</svg>
</a>

<button class="btn btn-danger delete" id="delete" data-id="{{ $id }}">
	<svg class="c-icon">
		<use xlink:href="{{ asset('icons/svg/free.svg#cil-trash') }}"></use>
	</svg>
</button>
