@extends('layouts.app')
@section('title')
Edit Shop
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
				<!-- Page body start -->
				<div class="page-body">
					<div class="card">
						<div class="card-body pt-4">
							@if(Session::has('message'))
								<div class="alert alert-success">
									{{ Session::get('message') }}
								</div>
							@endif
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<form method="POST" enctype="multipart/form-data" >
                                @csrf
                                <input type="hidden" name="shop_id" value="{{ $data->id }}">
								<div class="form-group row">
									<div class="col-2">
										<label>Shop Image *</label>
									</div>
									<div class="col-10">
                                        <img src="{{ $data->shop_image }}" alt="" width="200px" height="200px">
                                        <br><br>
										<input type="file" name="shop_img" class="form-control">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-2">
										<label>Shop Name*</label>
									</div>
									<div class="col-10">
										<input type="text" name="shop_name" class="form-control" placeholder="Shop Name" value="{{ $data->shop_name }}">
									</div>
								</div>

								<button class="btn btn-primary">Update Shop</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
