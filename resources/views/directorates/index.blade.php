@extends('layouts.master')
@section('css')
<!--Internal   Notify -->
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
	@endsection

	@section('title', ' قائمة  المديربات ')
	@section('page-header')
					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto"> المديربات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المديربات</span>
							</div>
						</div>
					</div>
	@endsection
	@section('content')

			@if (session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
	@endif
				
	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				{{-- <div class="card-header pb-0">
					<div class="d-flex justify-content-between ">
					@can('اضافة مستخدم')
					<a class="btn ripple btn-primary "  href="{{ route('directorates.create') }}"> <i class="fas fa-plus"></i>&nbsp; اضافة مستخدم  </a>
					@endcan
					</div>
				</div> --}}
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-md-nowrap" id="example1">
							<thead>
								<tr>
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0"> اسم المديرية  </th>
									<th class="border-bottom-0">    العمليات  </th>
								</tr>
							</thead>
							<tbody>
								@foreach ( $directorates as  $index => $user )
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $user -> name}}</td>
										<td>
                                            @can('تعديل مديرية')
												<a href="{{ route('directorates.edit', $user->id) }}" class="btn btn-sm btn-info" title="تعديل">
													<i class="las la-pen"></i>
												</a>
											@endcan
                                             @can('حدف مديرية')
												<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
													data-user_id="{{ $user->id }}" data-username="{{ $user->name }}"
													data-toggle="modal" href="#modaldemo8" title="حذف">
													<i class="las la-trash"></i>
												</a>
											@endcan
									</td>
								</tr>
								
								@endforeach 
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
				
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف المستخدم</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('directorates.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

  </div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('user_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #username').val(username);
    })

</script>


@endsection