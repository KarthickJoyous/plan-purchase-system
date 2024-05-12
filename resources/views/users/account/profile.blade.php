@extends('layouts.user.app')

@section('title', __('messages.user.profile.title'))

@section('breadcrumn') 
<li class="breadcrumb-item active">
	{{__('messages.user.profile.title')}}
</li>
@endsection

@section('content')
<section class="section profile">
	<div class="row">
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                  	{{__('messages.user.profile.overview')}}
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                  	{{__('messages.user.profile.edit_profile')}}
                  </button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-delete-account">
                  	{{__('messages.user.profile.delete_account')}}
                  </button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">{{__('messages.user.profile.about')}}</h5>
                  <p class="small fst-italic">{{auth('web')->user()->about ?? __('messages.user.common.na')}}</p>

                  <h5 class="card-title">{{__('messages.user.profile.details')}}</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">{{__('messages.user.profile.name')}}</div>
                    <div class="col-lg-9 col-md-8">{{auth('web')->user()->name ?? __('messages.user.common.na')}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">{{__('messages.user.profile.mobile')}}</div>
                    <div class="col-lg-9 col-md-8">{{auth('web')->user()->mobile ?? __('messages.user.common.na')}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">{{__('messages.user.profile.email')}}</div>
                    <div class="col-lg-9 col-md-8">{{auth('web')->user()->email ?? __('messages.user.common.na')}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">{{__('messages.user.profile.avatar')}}</div>
                    <div class="col-lg-9 col-md-8">
                    <img 
                        src="{{auth('web')->user()->avatar ?: asset('assets/placeholders/user/avatar.png')}}" 
                        alt="{{auth('web')->user()->name}}"
                        class="img-thumbnail"
                        height="80"
                        width="80"
                      >
                    </div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" 
                    class="needs-validation" 
                    id="userUpdateProfileForm" 
                    action="{{route('user.update_profile')}}" 
                    enctype="multipart/form-data"
                    novalidate
                  >
                  	@csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">
                      	{{__('messages.user.profile.avatar')}}
                      </label>
                      <div class="col-md-8 col-lg-9">
                        <img 
                        	src="{{auth('web')->user()->avatar ?: asset('assets/placeholders/user/avatar.png')}}" 
              				    alt="{{auth('web')->user()->name}}"
                          id="avatarPreview" 
                        >
                        <div class="pt-2">
                          	<input class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar" type="file" accept=".jpg, .jpeg, .png">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">
                      	{{__('messages.user.profile.name')}} *
                      </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name"  minlength="3" maxlength="30" type="text" class="form-control @error('avatar') is-invalid @enderror" id="name" value="{{Old('name', auth('web')->user()->name)}}" required>
                        <div class="invalid-feedback">{{__('messages.user.profile.name_invalid_feedback')}}</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">
                      	{{__('messages.user.profile.email')}} *
                      </label>
                      <div class="col-md-8 col-lg-9">
                        <input readonly name="email" maxlength="50" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{Old('email', auth('web')->user()->email)}}" required>
                        <div class="invalid-feedback">{{__('messages.user.profile.email_invalid_feedback')}}</div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="mobile" class="col-md-4 col-lg-3 col-form-label">
                      	{{__('messages.user.profile.mobile')}}
                      </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" value="{{Old('mobile', auth('web')->user()->mobile)}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">
                      	{{__('messages.user.profile.about')}}
                      </label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control @error('about') is-invalid @enderror" id="about" style="height: 100px">{{Old('about', auth('web')->user()->about)}}</textarea>
                      </div>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary" id="userUpdateProfileBtn">{{__('messages.user.profile.save_changes')}}</button>
                      </div>
                    </div>
                  </form>
                  <!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-delete-account">
                  <!-- Delete Account Form -->
                  <form 
                  method="POST" 
                  id="userDeleteAccountForm" 
                  action="{{route('user.delete_account')}}"
                  class="needs-validation"
                  novalidate
                  >
                    @csrf
                    @method('delete')

                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">
                        {{__('messages.user.profile.delete_account_password')}} *
                      </label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" 
                        class="form-control @if(session('password_error') || $errors->has('password')) is-invalid @endif"
                        id="deleteAccountPassword" minlength="8" maxlength="25"
                        required>
                        <div class="invalid-feedback">{{__('messages.user.profile.delete_account_password_invalid_feedback')}}</div>
                      </div>
                    </div>
                    <p class="text-danger">{{__('messages.user.profile.delete_account_note')}}</p>
                    <div class="d-flex justify-content-end ">
                      <div class="text-center">
                        <button type="submit" id="userDeleteAccountBtn"  class="btn btn-danger">
                          {{__('messages.user.profile.delete_account')}}
                        </button>
                      </div>
                    </div>
                  </form>
                  <!-- End Delete Account Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
  </div>
</section>
@endsection

@section('script')
  <script type="text/javascript">
    avatar.onchange = e => {
      const[file] = avatar.files;
      if(file) {
        avatarPreview.src = URL.createObjectURL(file);
      }
    }

    $("#userUpdateProfileForm").on('submit', function() {
      var validated = $("#name").val().length >= 3 && $("#email").val();
      if(validated) {
        handleBaseFormSubmit('userUpdateProfile', '{{__("messages.user.profile.update_profile_submit_btn_loading_text")}}')
      }
      return validated;
    });


    $("#userDeleteAccountForm").on('submit', function() {
      var validated = $("#deleteAccountPassword").val().length >= 8;
      if(validated) {
        handleBaseFormSubmit('userDeleteAccount', '{{__("messages.user.profile.delete_account_submit_btn_loading_text")}}')
      }
      return validated;
    });
  </script>
@endsection