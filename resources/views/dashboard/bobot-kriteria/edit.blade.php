@extends('layouts.master')

@section('title')
{{ $title }}
@endsection

@section('content')
<div class="container">
	<div class="fade-in">
		@include('layouts.partials.alert')
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Edit Data Kriteria</h4>
					</div>
					<div class="card-body">
						<div class="row d-flex justify-content-center">
							<div class="col-sm-8">
								{!! Form::model($bobotKriteria,['route' => ['kriteria.bobot-kriteria.update',['kriterium'=> request()->kriterium,'bobot_kriterium'=>$bobotKriteria->id]],'method'=>'PUT']) !!}
								@include('dashboard.bobot-kriteria._form')
								<div class="text-right">
									<a class="btn btn-outline-primary mx-2" href="{{ route('kriteria.bobot-kriteria.index',request()->kriterium) }}">Kembali</a>
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('layouts.partials.modal-confirm')
@endsection

@push('scripts')
@include('dashboard.scripts')
@endpush