
@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
		<div class="col-12">
			<!-- Page title -->
			<div class="my-5">
				<h3>My Profile</h3>
				<hr>
			</div>
			<!-- Form START -->
			{{-- {{ route('profile.update') }} --}}
			<form action="{{ route("profile.update",$User->id) }}" class="file-upload" enctype="multipart/form-data" method='POST'>
				@csrf
				@method('PUT')
				<div class="row mb-5 gx-5">
					<!-- Upload profile -->
					<div class="col-xxl-4">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Upload your profile photo</h4>
								<div class="text-center">
									
									<!-- Image upload -->
									<div class="square position-relative display-2 mb-3">
										<img src="{{ Auth::User()->image }}" alt="Avatar" height="64" width="64">
									</div>
									<!-- Button -->
									<input type="file" id="customFile" name="image" hidden="">
									<label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
									<p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px x 300px</p>
								</div>
							</div>
						</div>
					</div>
					<!-- Contact detail -->
					<div class="col-xxl-8 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Contact detail</h4>
								<!-- Full Name -->
								<div class="col-md-6">
									<label class="form-label">Full Name*</label>
									<input type="text" name="name"class="form-control" placeholder="Full Name" aria-label="First name" value="{{ $User->name }}" required>
								</div>
								<!-- Mobile number -->
								<div class="col-md-6">
									<label class="form-label">Mobile number </label>
									<input type="text" name='phone' class="form-control" placeholder="" aria-label="Phone number" value="{{ $User->phone }}">
								</div>
								<!-- Email -->
								<div class="col-md-6">
									<label for="inputEmail4" class="form-label">Email *</label>
									<input type="email" class="form-control" id="inputEmail4" value="{{ $User->email }}" disabled>
								</div>
								<!-- Type -->
								<div class="col-md-6">
									<label class="form-label">User Type *</label>
									<input type="text" name="type" class="form-control" aria-label="User Type" value="{{ $User->type }}" disabled>
								</div>
							</div> <!-- Row END -->
						</div>
					</div>
					
				</div> <!-- Row END -->
				<div class="gap-3 d-md-flex justify-content-md-end text-center">
					
					<button type="submit" class="btn btn-primary btn-lg">Update profile</button>
				</div>
				{{-- {{ dd('going'); }} --}}
			</form> 
			<form action="{{ route('profile.destroy',$User->id) }}" class="mt-5" method="POST">
				@csrf
				@method('DELETE')
				<div class="gap-3 d-md-flex justify-content-md-end text-center">
					<button type="button" class="btn btn-danger btn-lg" href="{{ route("blog.destroy",$User->id) }}">Delete profile</button>
				</div>
			</form>
			
			<form action="{{ route("Passchange") }}" class="file-upload" method="POST">
				@csrf
					<!-- change password -->
					<div class="col-xxl-6">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="my-4">Change Password</h4>
								<!-- Old password -->
								<div class="col-md-12">
									<label for="current_password" class="form-label">Current password *</label>
									<input type="password" class="form-control" name="current_password" id="current_password" required >
									
								</div>
								<!-- New password -->
								<div class="col-md-6">
									<label for="new_password" class="form-label">New password *</label>
									<input type="password" class="form-control " name="new_password" id="new_password" required >
									
								</div>
								<!-- Confirm password -->
								<div class="col-md-6">
									<label for="new_password_confirmation" class="form-label">Confirm password *</label>
									<input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" required >
									
								</div>
								{{-- Error Show --}}
								@if($errors->any())
								{!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
								@endif
								@if(Session::get('error') && Session::get('error') != null)
								<div style="color:red">{{ Session::get('error') }}</div>
								@php
								Session::put('error', null)
								@endphp
								@endif
								@if(Session::get('success') && Session::get('success') != null)
								<div style="color:green">{{ Session::get('success') }}</div>
								@php
								Session::put('success', null)
								@endphp
								@endif

								{{-- Error Show End--}}
							</div>
						</div>
					</div>
				</div> <!-- Row END -->
				<!-- button -->
				<div class="gap-3 d-md-flex justify-content-md-end text-center">
					
					<button type="submit" class="btn btn-primary btn-lg">Update password</button>
				</div>
			</form>
		</div>
	</div>
	</div>
@endsection

