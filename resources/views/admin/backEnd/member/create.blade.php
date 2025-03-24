@extends('backEnd.layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Member</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item " aria-current="page"><a href="{{route('admin.member.all')}}">All Member</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Member</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('admin.member.create')}}" class="btn btn-primary">Add Member</a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Personal Information</h5>
                <form class="row g-3" method="POST" id="add_member">
                    <input type="text" name="admin_id" value="{{Auth::user()->id}}" hidden>
                    <div class="col-md-3">
                        <label for="input13" class="form-label required">Name</label>
                        <div class="position-relative input-icon">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{old('name')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="input15" class="form-label required">Phone</label>
                        <div class="position-relative input-icon">
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{old('phone')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-microphone'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="input17" class="form-label">Alternative Phone</label>
                        <div class="position-relative input-icon">
                            <input type="text" name="alt_phone" class="form-control" id="alt_phone" placeholder="Alt Phone" value="{{old('alt_phone')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-microphone'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="input22" class="form-label">Post Code</label>
                        <div class="position-relative input-icon">
                            <input type="number" class="form-control" id="post_code" placeholder="Post Code" name="post_code" value="{{old('post_code')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-pin'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="gender" class="form-label required">Gender</label>
                        <select id="gender" class="form-select" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <p class="error"></p>
                    </div>

                    <div class="col-md-3">
                        <label for="nid_or_birth_certificates_no" class="form-label">NID Or Birth Certificates No</label>
                        <div class="position-relative input-icon">
                            <input type="text" name="nid_or_birth_certificates_no" class="form-control" id="nid_or_birth_certificates_no" placeholder="NID Or Birth Certificates No" value="{{old('nid_or_birth_certificates_no')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="input18" class="form-label">Date of Birth</label>
                        <div class="position-relative input-icon">
                            <input type="date" name="dob" class="form-control" id="input18" placeholder="Date of Birth" value="{{old('dob')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="blood_group" class="form-label ">Blood Group</label>

                        <select class="form-select" name="blood_group" id="blood_group">
                            <option value="">Select blood group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <p class="error"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="input16" class="form-label required">Email</label>
                        <div class="position-relative input-icon">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}" autocomplete="false">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="input22" class="form-label required">Login Password</label>
                        <div class="position-relative input-icon">
                            <input type="password" class="form-control " id="password" placeholder="Password" name="password" value="12345678elc" autocomplete="false">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-password'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="input23" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Address ..." rows="3">{{old('address')}}</textarea>
                        <p class="error"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="input23" class="form-label">Image Upload</label>
                        <input class="form-control" name="image" type="file" id="formFile">
                    </div>
                    <!-- Image Preview Element -->
                    <div class="col-md-12 mb-3">
                        <img id="imagePreview" alt="Image Preview" class="img-thumbnail" style="max-width: 200px; display:none">
                    </div>
                    <hr>
                    <h5 class="mb-4">DUET Information</h5>

                    <div class="col-md-4">
                        <label for="input22" class="form-label required">Institute Department Name</label>
                        <div class="position-relative input-icon">
                            <select class="form-select" name="institute_department" id="institute_department">
                                <option value="">Select Department</option>
                                <option value="CSE">CSE</option>
                                <option value="EEE">EEE</option>
                                <option value="ME">ME</option>
                                <option value="TE">TE</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="ARC">Architecture</option>
                                <option value="IPE">IPE</option>
                                <option value="FE">FE</option>
                                <option value="CE">CE(Chemical Engineering)</option>
                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="input22" class="form-label required">Institute Student Id</label>
                        <div class="position-relative input-icon">
                            <input type="number" class="form-control" id="institute_student_id" placeholder="Student Id" name="institute_student_id" value="{{old('institute_student_id')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-id'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="input22" class="form-label required">Batch</label>
                        <div class="position-relative input-icon">
                            <input type="number" class="form-control" id="institute_batch" placeholder="Batch" name="institute_batch" value="{{old('institute_batch')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <hr>
                    <h5 class="mb-4">Diploma Course Information</h5>

                    <div class="col-md-12">
                        <label for="input22" class="form-label">Previous Institution Name</label>
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" id="previous_institution" placeholder="Polytechnic" name="previous_institution" value="{{old('previous_institution')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>

                    <hr>
                    @php
                    $currentYear = date('Y'); // Get the current year (e.g., 2024)
                    $currentYearLastTwoDigits = substr($currentYear, 2, 2); // Extract last two digits (e.g., 24)
                    $startYear = $currentYear - 24; // Start year (25 years before the current year)
                    @endphp
                    <h5 class="mb-4">ELC Information</h5>

                    <div class="col-md-6">
                        <label for="input22" class="form-label">First Time Panel Series</label>
                        <div class="position-relative input-icon">
                            <select class="form-select" name="first_time_society_panel_series" id="first_time_society_panel_series">
                                <option value="">Select Series</option>
                                @for ($i = $currentYear; $i >= $startYear; $i--)
                                @php
                                $yearLastTwoDigits = substr($i, 2, 2); // Get the last two digits of the year
                                @endphp
                                <option value="{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}">{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}</option>
                                @endfor

                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="input22" class="form-label">First Time Panel Post</label>
                        <div class="position-relative input-icon">
                            <select class="form-select" name="first_time_society_post" id="first_time_society_post">
                                <option value="">Select Post</option>

                                <option value="assistant-finance-secretary">Assistant Finance Secretary</option>
                                <option value="assistant-office-secretary">Assistant Office Secretary</option>
                                <option value="assistant-organisational-secretary">Assistant Organisational Secretary</option>
                                <option value="assistant-club-coordinator">Assistant Club Co-ordinator</option>
                                <option value="assistant-communication-secretary">Assistant Communication Secretary</option>
                                <option value="assistant-joint-secretary">Assistant Joint Secretary</option>
                                <option value="assistant-organizing-secretary">Assistant Organizing Secretary</option>
                                <option value="assistant-news-letter-publicity-secretary">Assistant News, Letter & Publicity Secretary</option>
                                <option value="member">Member</option>
                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="input22" class="form-label">Second Time Panel Series</label>
                        <div class="position-relative input-icon">
                            <select class="form-select" name="second_time_society_panel_series" id="second_time_society_panel_series">
                                <option value="">Select Series</option>
                                @for ($i = $currentYear; $i >= $startYear; $i--)
                                @php
                                $yearLastTwoDigits = substr($i, 2, 2); // Get the last two digits of the year
                                @endphp
                                <option value="{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}">{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}</option>
                                @endfor
                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="input22" class="form-label">Second Time Panel Post</label>
                        <div class="position-relative input-icon">
                            <select class="form-select" name="second_time_society_post" id="second_time_society_post">
                                <option value="">Select Post</option>

                                <option value="general-secretary">General Secretary</option>
                                <option value="finance-secretary">Finance Secretary</option>
                                <option value="communication-secretary">Communication Secretary</option>
                                <option value="office-secretary">Office Secretary</option>
                                <option value="club-coordinator">Club Co-ordinator</option>
                                <option value="joint-secretary">Joint Secretary</option>
                                <option value="organizing-secretary">Orgenizing Secretary</option>
                                <option value="news-letter-publicity-secretary">News, Letter & Publicity Secretary</option>

                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="input22" class="form-label">Third Time Panel Series</label>
                        <div class="position-relative input-icon">
                            <select class="form-select" name="third_time_society_panel_series" id="third_time_society_panel_series">
                                <option value="">Select Series</option>
                                @for ($i = $currentYear; $i >= $startYear; $i--)
                                @php
                                $yearLastTwoDigits = substr($i, 2, 2); // Get the last two digits of the year
                                @endphp
                                <option value="{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}">{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}</option>
                                @endfor
                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="input22" class="form-label">Third Time Panel Post</label>
                        <div class="position-relative input-icon">
                            <select class="form-select" name="third_time_society_post" id="third_time_society_post">
                                <option value="">Select Post</option>
                                <option value="president">President</option>
                                <option value="senior-vice-president">Senior Vice President</option>
                                <option value="vice-president">Vice President</option>
                            </select>
                            <p class="error"></p>
                        </div>
                    </div>

                    <hr>
                    <h5 class="mb-4">Others</h5>
                    <div class="col-md-12">
                        <label for="input23" class="form-label">Current Work Details</label>
                        <textarea class="form-control" name="current_work_details" id="current_work_details" placeholder="Message ..." rows="2">{{old('current_work_details')}}</textarea>
                        <p class="error"></p>
                    </div>
                    <div class="col-md-12">
                        <label for="input23" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="message" placeholder="Message ..." rows="3">{{old('message')}}</textarea>
                        <p class="error"></p>
                    </div>
                    <div class="col-md-12">
                        <label for="input23" class="form-label">advice</label>
                        <textarea class="form-control" name="advice" id="advice" placeholder="Advice ..." rows="3">{{old('advice')}}</textarea>
                        <p class="error"></p>
                    </div>
                    <div class="col-md-12">
                        <label for="input23" class="form-label">Biography</label>
                        <textarea class="form-control" name="biography" id="biography" placeholder="Biography ..." rows="3">{{old('biography')}}</textarea>
                        <p class="error"></p>
                    </div>
                    <h5 class="mb-4">Social Account</h5>

                    <div class="col-md-6">
                        <label for="input22" class="form-label">Facebook Link</label>
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" id="fb_account" placeholder="FB account" name="fb_account" value="{{old('fb_account')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="input22" class="form-label">Linked In Link</label>
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" id="ln_account" placeholder="In account" name="ln_account" value="{{old('ln_account')}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                        </div>
                    </div>

                    <hr>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4"><i class=' bx bxs-check-circle me-0'></i> Save</button>
                            <a href="{{route('admin.member.create')}}" class="btn btn-light px-4">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js-section')
<!-- Image Privew -->
<script type="text/javascript">
    document.getElementById('formFile').addEventListener('change', function(event) {
        // Check if a file is selected
        if (event.target.files && event.target.files[0]) {
            const reader = new FileReader();
            // Set up the callback for the `load` event
            reader.onload = function(e) {
                // Update the `src` attribute of the preview image
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block'; // Make the preview visible
            }
            // Read the selected image file as a data URL
            reader.readAsDataURL(event.target.files[0]);
        }
    });
</script>
<!-- ADD MEMBER -->
<script>
    $('#add_member').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $("button[type='submit']").prop("disabled", true);

        $.ajax({
            url: "{{ route('admin.member.store') }}",
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(response) {
                $("button[type='submit']").prop("disabled", false);

                if (response.status === true) {
                    $('#add_member')[0].reset();
                    $("input, select, textarea").removeClass('is-invalid');
                    $(".error").removeClass('invalid-feedback').html('');
                    window.location.reload();
                } else {
                    displayErrors(response.errors);
                }
            },
            error: function(xhr) {
                $("button[type='submit']").prop("disabled", false);
                let response = xhr.responseJSON;
                displayErrors(response.errors || {
                    general: "An unexpected error occurred."
                });
            }
        });
    });

    function displayErrors(errors) {
        $(".error").removeClass('invalid-feedback').html('');
        $("input, select, textarea").removeClass('is-invalid');
        $('#general-error').html(''); // Clear any general error message

        $.each(errors, function(field, messages) {
            // Check if field has multiple error messages
            if (Array.isArray(messages)) {
                $.each(messages, function(index, message) {
                    $(`[name='${field}']`).addClass('is-invalid').siblings('.error')
                        .addClass('invalid-feedback').html(message);
                });
            } else {
                // Handle single error message
                $(`[name='${field}']`).addClass('is-invalid').siblings('.error')
                    .addClass('invalid-feedback').html(messages);
            }
        });
    }
</script>
@endsection