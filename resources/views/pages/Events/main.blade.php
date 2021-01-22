@extends('layouts.app')
@section('title') Event @endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
				<!-- Page body start -->
				<div class="page-body">
					<div class="card">
						<div class="card-header">
							<h2 class="text-primary">Event List</h2>
						</div>
						<div class="card-body">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                            @endif
							<div class="table-responsive">
								<table class="table table-striped table-bordered" id="dataTable">
									<thead>
										<tr>
											<th>#</th>
											<th>Event Image</th>
                                            <th>Secondary Image</th>
                                            <th>Short Description</th>
                                            <th>Long Decription</th>
                                            <th>Event Price</th>
                                            <th>Event Place</th>
                                            <th>Event Time</th>
                                            <th>Author Name</th>
                                            <th>Federation Name</th>
                                            <th>Author Image</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($events as $key => $event)
										<tr>
											<td>{{ $key + 1 }}</td>
											<td>
                                                <div style="width: 100px; height:100px;">
                                                   <img src=" {{ $event->event_image }}" alt=""  width="100%" height="auto">
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width: 100px; height:100px;">
                                                   <img src=" {{ $event->secondary_image }}" alt="" width="100%" height="auto">
                                                </div>
                                            </td>
                                            <td>{{ $event->short_description }}</td>
                                            <td>{{ $event->long_decription }}</td>
                                            <td>{{ $event->even_price }}</td>
                                            <td>{{ $event->event_place }}</td>
                                            <td>{{ $event->event_timing }}</td>
                                            <td>{{ $event->author_name }}</td>
                                            <td>{{ $event->federation_name }}</td>
                                            <td>
                                                <div style="width: 60px; height:60px; border-radius:50%; overflow:hidden;">
                                                    <img src="{{ $event->author_image }}" alt="" width="100%" height="100%">
                                                </div>
                                            </td>
											<td>
												<a href="/edit-event?id={{ $event->id }}" class="btn btn-primary">Edit</a>
												<a href="/remove-event?id={{$event->id}}" class="btn btn-danger"> Remove</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
