@extends('layouts.app')
@section('title')
Club
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
				<!-- Page body start -->
				<div class="page-body">
					<div class="card">
						<div class="card-header">
                            <h2 class="text-primary">Club Detail</h2>
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
											<th>Club</th>
                                            <th>Sponsor</th>
                                            <th>Image</th>
                                            <th>Name</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($clubDetail as $key => $club)
										<tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                {{ $club->clubs->name }}
                                            </td>
											<td>
                                                {{-- @foreach(json_decode($club->sponsor_images) as $sponsor)
                                                <div style="width: 100px; height:100px; float:left;">
                                                    <img src="{{ $sponsor }}" class="card-img">
                                                </div>
                                                @endforeach --}}
                                            </td>
											<td>
                                                <div style="width: 100px; height:100px; float:left;">
                                                    <img src="{{ $club->image }}" class="card-img">
                                                </div>
                                            </td>
                                            <td>
                                                {{ $club->name }}
                                            </td>
											<td>
												{{-- <a href="/edit-club?id={{ $club->id }}" class="btn btn-primary">Edit</a> --}}
												<a href="/remove-club-detail?id={{$club->id}}" class="btn btn-danger"> Remove</a>
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