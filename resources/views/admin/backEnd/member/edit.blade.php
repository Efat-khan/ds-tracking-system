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
                        <li class="breadcrumb-item active" aria-current="page">Edit Member</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('admin.member.all')}}" class="btn btn-primary">Back</a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Personal Information</h5>
                <form class="row g-3" method="POST" id="update_member">
                    <input type="text" name="id" value="{{$member->id}}" hidden>
                    <input type="text" name="user_id" value="{{$member->user_id}}" hidden>
                    <input type="text" name="admin_id" value="{{Auth::user()->id}}" hidden>
                    <div class="col-md-3">
                        <label for="input13" class="form-label required">Name</label>
                        <div class="position-relative input-icon">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{!empty($member->name)?$member->name:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="input15" class="form-label required">Phone</label>
                        <div class="position-relative input-icon">
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{!empty($member->phone)?$member->phone:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-microphone'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="input17" class="form-label">Alternative Phone</label>
                        <div class="position-relative input-icon">
                            <input type="text" name="alt_phone" class="form-control" id="alt_phone" placeholder="Alt Phone" value="{{!empty($member->alt_phone)?$member->alt_phone:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-microphone'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="input22" class="form-label">Post Code</label>
                        <div class="position-relative input-icon">
                            <input type="number" class="form-control" id="post_code" placeholder="Post Code" name="post_code" value="{{!empty($member->post_code)?$member->post_code:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-pin'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="gender" class="form-label required">Gender</label>
                        <select id="gender" class="form-select" name="gender">
                            <option {{$member->gender=='male'?'selected':''}} value="male">Male</option>
                            <option {{$member->gender=='female'?'selected':''}} value="female">Female</option>
                        </select>
                        <p class="error"></p>
                    </div>

                    <div class="col-md-3">
                        <label for="nid_or_birth_certificates_no" class="form-label">NID Or Birth Certificates No</label>
                        <div class="position-relative input-icon">
                            <input type="text" name="nid_or_birth_certificates_no" class="form-control" id="nid_or_birth_certificates_no" placeholder="NID Or Birth Certificates No" value="{{!empty($member->nid_or_birth_certificates_no)?$member->nid_or_birth_certificates_no:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="input18" class="form-label">Date of Birth</label>
                        <div class="position-relative input-icon">
                            <input type="date" name="dob" class="form-control" id="input18" placeholder="Date of Birth" value="{{!empty($member->dob)?$member->dob:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="blood_group" class="form-label ">Blood Group</label>

                        <select class="form-select" name="blood_group" id="blood_group">
                            <option value="">Select blood group</option>
                            <option value="A+" {{ $member->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ $member->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ $member->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ $member->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ $member->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ $member->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ $member->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ $member->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                        </select>
                        <p class="error"></p>
                    </div>

                    <div class="col-md-4">
                        <label for="input16" class="form-label required">Email</label>
                        <div class="position-relative input-icon">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{!empty($member->email)?$member->email:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="role" class="form-label ">Member Role</label>

                        <select class="form-select" name="role" id="role">
                            <option value="">Select role</option>
                            <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <p class="error"></p>
                    </div>
                    <div class="col-md-4">
                        <label for="role" class="form-label ">Member Status</label>

                        <select class="form-select" name="status" id="status">
                            <option value="">Select status</option>
                            <option value="block" {{ $user->status == 'block' ? 'selected' : '' }}>Block</option>
                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                        </select>
                        <p class="error"></p>
                    </div>

                    <div class="col-md-12">
                        <label for="input23" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Address ..." rows="3">{{!empty($member->address)?$member->address:''}}</textarea>
                        <p class="error"></p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="input23" class="form-label">Image Upload</label>
                        <input class="form-control" name="image" type="file" id="formFile">
                        <p class="error"></p>
                    </div>
                    <!-- Image Preview Element -->

                    <div class="col-md-6 mb-3">
                        <img id="imagePreview" src="{{ asset($member->image) }}" alt="Image Preview" class="img-thumbnail" style="max-width: 200px; display: {{ $member->image ? 'block' : 'none' }};">
                    </div>
                    <div class="col-md-12">
                        <p class="card-text"><small class="text-muted">Last updated {{ $member->updated_at->diffForHumans() }}</small>
                        </p>
                    </div>
                    <hr>
                    <h5 class="mb-4">DUET Information</h5>

                    <div class="col-md-4">
                        <label for="input22" class="form-label required">Institute Department Name</label>
                        <div class="position-relative input-icon">
                            <select class="form-select" name="institute_department" id="institute_department">
                                <option value="">Select Department</option>
                                <option value="CSE" {{ $member->institute_department == 'CSE' ? 'selected' : '' }}>CSE</option>
                                <option value="EEE" {{ $member->institute_department == 'EEE' ? 'selected' : '' }}>EEE</option>
                                <option value="ME" {{ $member->institute_department == 'ME' ? 'selected' : '' }}>ME</option>
                                <option value="TE" {{ $member->institute_department == 'TE' ? 'selected' : '' }}>TE</option>
                                <option value="CIVIL" {{ $member->institute_department == 'CIVIL' ? 'selected' : '' }}>CIVIL</option>
                                <option value="ARC" {{ $member->institute_department == 'ARC' ? 'selected' : '' }}>Architecture</option>
                                <option value="IPE" {{ $member->institute_department == 'IPE' ? 'selected' : '' }}>IPE</option>
                                <option value="FE" {{ $member->institute_department == 'FE' ? 'selected' : '' }}>FE</option>
                                <option value="CE" {{ $member->institute_department == 'CE' ? 'selected' : '' }}>CE (Chemical Engineering)</option>

                            </select>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="input22" class="form-label required">Institute Student Id</label>
                        <div class="position-relative input-icon">
                            <input type="number" class="form-control" id="institute_student_id" placeholder="Student Id" name="institute_student_id" value="{{!empty($member->institute_student_id)?$member->institute_student_id:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-id'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="input22" class="form-label required">Batch</label>
                        <div class="position-relative input-icon">
                            <input type="number" class="form-control" id="institute_batch" placeholder="Batch" name="institute_batch" value="{{!empty($member->institute_batch)?$member->institute_batch:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>
                    <hr>
                    <h5 class="mb-4">Diploma Course Information</h5>

                    <div class="col-md-12">
                        <label for="input22" class="form-label">Previous Institution Name</label>
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" id="previous_institution" placeholder="Polytechnic" name="previous_institution" value="{{!empty($member->previous_institution)?$member->previous_institution:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                            <p class="error"></p>
                        </div>
                    </div>

                    <hr>
                    @php
                    $currentYear = date('Y'); // Get the current year (e.g., 2024)
                    $currentYearLastTwoDigits = substr($currentYear, 2, 2); // Extract last two digits (e.g., 24)
                    $startYear = $currentYear - 24; // Start year (24 years before the current year)
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
                                <option value="{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}" {{ $member->first_time_society_panel_series == $yearLastTwoDigits.'-'.$yearLastTwoDigits+1 ? 'selected' : '' }}>{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}</option>
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
                            <option value="assistant-finance-secretary" {{ $member->first_time_society_post == 'assistant-finance-secretary' ? 'selected' : '' }}>Assistant Finance Secretary</option>
    <option value="assistant-communication-secretary" {{ $member->first_time_society_post == 'assistant-communication-secretary' ? 'selected' : '' }}>Assistant Communication Secretary</option>
    <option value="assistant-office-secretary" {{ $member->first_time_society_post == 'assistant-office-secretary' ? 'selected' : '' }}>Assistant Office Secretary</option>
    <option value="assistant-organizing-secretary" {{ $member->first_time_society_post == 'assistant-organizing-secretary' ? 'selected' : '' }}>Assistant Organizing Secretary</option>
    <option value="assistant-club-coordinator" {{ $member->first_time_society_post == 'assistant-club-coordinator' ? 'selected' : '' }}>Assistant Club Coordinator</option>
    <option value="assistant-joint-secretary" {{ $member->first_time_society_post == 'assistant-joint-secretary' ? 'selected' : '' }}>Assistant Joint Secretary</option>
    <option value="assistant-news-letter-publicity-secretary" {{ $member->first_time_society_post == 'assistant-news-letter-publicity-secretary' ? 'selected' : '' }}>Assistant News, Letter & Publicity Secretary</option>
    <option value="member" {{ $member->second_time_society_post == 'member' ? 'selected' : '' }}>Member</option>

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
                                <option value="{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}" {{ $member->second_time_society_panel_series == $yearLastTwoDigits.'-'.$yearLastTwoDigits+1 ? 'selected' : '' }}>{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}</option>
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
                            <option value="finance-secretary" {{ $member->second_time_society_post == 'finance-secretary' ? 'selected' : '' }}>Finance Secretary</option>
                            <option value="general-secretary" {{ $member->second_time_society_post == 'general-secretary' ? 'selected' : '' }}>General Secretary</option>
                            <option value="office-secretary" {{ $member->second_time_society_post == 'office-secretary' ? 'selected' : '' }}>Office Secretary</option>
                            <option value="communication-secretary" {{ $member->second_time_society_post == 'communication-secretary' ? 'selected' : '' }}>Communication Secretary</option>
                            <option value="organizing-secretary" {{ $member->second_time_society_post == 'organizing-secretary' ? 'selected' : '' }}>Organizing Secretary</option>
                            <option value="club-coordinator" {{ $member->second_time_society_post == 'club-coordinator' ? 'selected' : '' }}>Club Coordinator</option>
                            <option value="joint-secretary" {{ $member->second_time_society_post == 'joint-secretary' ? 'selected' : '' }}>Joint Secretary</option>
                            <option value="news-letter-publicity-secretary" {{ $member->second_time_society_post == 'news-letter-publicity-secretary' ? 'selected' : '' }}>News, Letter & Publicity Secretary</option>
   

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
                                <option value="{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}" {{ $member->third_time_society_panel_series == $yearLastTwoDigits.'-'.$yearLastTwoDigits+1 ? 'selected' : '' }}>{{ $yearLastTwoDigits }}-{{ $yearLastTwoDigits + 1 }}</option>
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
    <option value="president" {{ $member->third_time_society_post == 'president' ? 'selected' : '' }}>President</option>
    <option value="senior-vice-president" {{ $member->third_time_society_post == 'senior-vice-president' ? 'selected' : '' }}>Senior Vice President</option>
    <option value="vice-president" {{ $member->third_time_society_post == 'vice-president' ? 'selected' : '' }}>Vice President</option>
                            </select>
                            <p class="error"></p>
                        </div>
                    </div>

                    <hr>
                    <h5 class="mb-4">Others</h5>
                    <div class="col-md-12">
                        <label for="input23" class="form-label">Current Work Details</label>
                        <textarea class="form-control" name="current_work_details" id="current_work_details" placeholder="Details ..." rows="2">{{!empty($member->current_work_details)?$member->current_work_details:''}}</textarea>
                        <p class="error"></p>
                    </div>
                    <div class="col-md-12">
                        <label for="input23" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="message" placeholder="Message ..." rows="3">{{!empty($member->message)?$member->message:''}}</textarea>
                        <p class="error"></p>
                    </div>
                    <div class="col-md-12">
                        <label for="input23" class="form-label">Advice</label>
                        <textarea class="form-control" name="advice" id="advice" placeholder="Advice ..." rows="3">{{!empty($member->advice)?$member->advice:''}}</textarea>
                        <p class="error"></p>
                    </div>
                    <div class="col-md-12">
                        <label for="input23" class="form-label">Biography</label>
                        <textarea class="form-control" name="biography" id="biography" placeholder="Biography ..." rows="3">{{!empty($member->biography)?$member->biography:''}}</textarea>
                        <p class="error"></p>
                    </div>
                    <h5 class="mb-4">Social Account</h5>

                    <div class="col-md-6">
                        <label for="input22" class="form-label">Facebook Link</label>
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" id="fb_account" placeholder="FB account" name="fb_account" value="{{!empty($member->fb_account)?$member->fb_account:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="input22" class="form-label">Linked In Link</label>
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" id="ln_account" placeholder="In account" name="ln_account" value="{{!empty($member->ln_account)?$member->ln_account:''}}">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                        </div>
                    </div>

                    <hr>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4"><i class=' bx bxs-check-circle me-0'></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card" style="display:none">
            <div class="card-body p-4">
                <h5 class="mb-4">Career</h5>
                <form method="post" action="" name="career_add" id="career_add">
                    <div class="row">
                        <input type="hidden" name="member_id" value="{{$member->user_id}}">
                        <div class="col-md-2">
                            <label for="input22" class="form-label">Job Title</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="job_title" placeholder="te" name="job_title">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="input22" class="form-label">Company Name</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="company_name" placeholder="te" name="company_name">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="input22" class="form-label">Company Website</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="company_website" placeholder="te" name="company_website">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="input22" class="form-label">Start Year</label>
                            <div class="position-relative input-icon">
                                <input type="date" class="form-control" id="start_year" name="start_year">
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="input22" class="form-label">End Year</label>
                            <div class="position-relative input-icon">
                                <input type="date" class="form-control" id="end_year" name="end_year" value="{{\Carbon\Carbon::now()->toDateString()}}">
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 29px;">
                            <div class="btn-group " role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-success" title="Edit Data"><i class=' bx bxs-check-circle me-0'></i> Add Career
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                @foreach ($member['MemberCareer'] as $data )
                <form action="{{route('admin.member.career.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="career_id" value="{{$data->id}}">
                    <input type="hidden" name="member_id" value="{{$member->user_id}}">
                    <div class="row" id="career_{{$data->id}}">
                        <div class="col-md-2">
                            <label for="input22" class="form-label">Job Title</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="job_title" placeholder="te" name="job_title" value="{{$data->job_title}}">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="input22" class="form-label">Company Name</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="company_name" placeholder="te" name="company_name" value="{{$data->company_name}}">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="input22" class="form-label">Company Website</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="company_website" placeholder="te" name="company_website" value="{{$data->company_website}}">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="input22" class="form-label">Start Year</label>
                            <div class="position-relative input-icon">
                                <input type="date" class="form-control" id="start_year" name="start_year" value="{{\Carbon\Carbon::parse($data->start_year)->toDateString()}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="input22" class="form-label">End Year</label>
                            <div class="position-relative input-icon">
                                <input type="date" class="form-control" id="end_year" name="end_year" value="{{\Carbon\Carbon::parse($data->end_year)->toDateString()}}">
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 29px;">
                            <div class="btn-group " role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-success" title="Edit Data"><i class=' bx bxs-check-circle me-0'></i>
                                </button>
                                <button value="{{ $data->id }}" class="btn btn-danger delete_career" data-confirm-delete="true" title="Delete Data"><i class="bx bx-trash me-0"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
        <div class="card" style="display:none">
            <div class="card-body p-4">
                <h5 class="mb-4">Educational Qualification</h5>
                <form method="post" action="" name="edu_add" id="edu_add">
                    <input type="hidden" name="member_id" value="{{$member->user_id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="input22" class="form-label">Qualification</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="qualification" placeholder="Qualification" name="qualification">
                                <p class="error"></p>
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="input22" class="form-label">Year</label>

                            <div class="position-relative input-icon">
                                <select id="year" name="year" class="form-select">
                                    @for ($year = 1900; $year <= \Carbon\Carbon::now()->year; $year++)
                                        <option value="{{ $year }}" {{ $year == \Carbon\Carbon::now()->year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                </select>
                                <p class="error"></p>
                                <!-- <input type="text" class="form-control" id="year" placeholder="Year" name="year"> -->
                            </div>
                        </div>

                        <div class="col-md-2" style="padding-top: 29px;">
                            <div class="btn-group " role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-success" title="Add Education"><i class=' bx bxs-check-circle me-0'></i> Add Education
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                @foreach ($member['MemberEdu'] as $data )
                <form action="{{route('admin.member.edu.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="edu_id" value="{{$data->id}}">
                    <input type="hidden" name="member_id" value="{{$member->user_id}}">
                    <div class="row" id="edu_{{$data->id}}">
                        <div class="col-md-6">
                            <label for="input22" class="form-label">Qualification</label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" id="qualification" placeholder="Qualification" name="qualification" value="{{$data->qualification}}">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-building'></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="input22" class="form-label">Year</label>
                            <div class="position-relative input-icon">
                                <select id="year" name="year" class="form-select">
                                    @for ($year = 1900; $year <= \Carbon\Carbon::now()->year; $year++)
                                        <option value="{{ $year }}" {{ $year == $data->year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2" style="padding-top: 29px;">
                            <div class="btn-group " role="group" aria-label="Basic example">
                                <button type="submit" class="btn btn-success" title="Edit Data"><i class=' bx bxs-check-circle me-0'></i>
                                </button>
                                <button value="{{ $data->id }}" class="btn btn-danger delete_edu" data-confirm-delete="true" title="Delete Data"><i class="bx bx-trash me-0"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
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
<!-- Member Info Update -->
<script>
    $('#update_member').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $("button[type='submit']").prop("disabled", true);

        $.ajax({
            url: "{{ route('admin.member.update') }}",
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
                    $('#update_member')[0].reset();
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
<!-- Career Add -->
<script>
    $('#career_add').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serializeArray();
        console.log(formData);
        $("button[type='submit']").prop("disabled", true);
        $.ajax({
            url: "{{route('admin.member.career.create')}}",
            type: "post",
            data: formData,
            dataType: "json",
            success: function(response) {
                $("button[type='submit']").prop("disabled", false);
                if (response['status'] == true) {
                    $("input[type = 'text'],input[type ='checkbox'],input[type ='hidden'],input[type ='date'],select,input[type ='number']").removeClass('is-invalid');
                    $(".error").removeClass('invalid-feedback').html('');
                    // console.log('ok');
                    window.location.href = "{{ route('admin.member.edit',$member->id) }}";
                } else {
                    var errors = response['errors'];
                    $(".error").removeClass('invalid-feedback').html('');
                    $("input[type = 'text'],input[type ='date']").removeClass('is-invalid');
                    $.each(errors, function(key, value) {
                        $(`#${key}`).addClass('is-invalid').siblings('p')
                            .addClass('invalid-feedback')
                            .html(value);
                    })
                }
            },
            error: function() {
                console.log("Something went worng.")
            }
        })
    });
</script>
<!-- DELETE CAREER -->
<script>
    $('.delete_career').click(function(e) {

        e.preventDefault();

        var career_id = $(this).val();

        Swal.fire({
            title: "Are you sure?",
            text: "You won't to delete this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, sure!"
        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.member.career.delete')}}",
                    data: {
                        'career_id': career_id
                    },
                    success: function(data) {
                        if (data.status == true) {
                            Swal.fire({
                                title: "Deleted!",
                                text: data.msg,
                                icon: "success",
                                timer: 2000
                            });
                            $('#career_' + career_id).hide(2000);
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: data.msg,
                                icon: "error",
                                timer: 2000
                            });
                        }
                    }
                });
            }
        });
    });
</script>
<!-- ADD EDU -->
<script>
    $('#edu_add').submit(function(event) {
        // alert('ok');
        event.preventDefault();
        var formData = $(this).serializeArray();
        $("button[type='submit']").prop("disabled", true);
        $.ajax({
            url: "{{route('admin.member.edu.create')}}",
            type: "post",
            data: formData,
            dataType: "json",
            success: function(response) {
                $("button[type='submit']").prop("disabled", false);
                if (response['status'] == true) {
                    $("input[type = 'text'],input[type ='checkbox'],input[type ='hidden'],input[type ='date'],select,input[type ='number']").removeClass('is-invalid');
                    $(".error").removeClass('invalid-feedback').html('');
                    // console.log('ok');
                    window.location.href = "{{ route('admin.member.edit',$member->id) }}";
                } else {
                    var errors = response['errors'];
                    $(".error").removeClass('invalid-feedback').html('');
                    $("input[type = 'text'],input[type ='checkbox'],input[type ='hidden'],select,input[type ='number']").removeClass('is-invalid');
                    $.each(errors, function(key, value) {
                        $(`#${key}`).addClass('is-invalid').siblings('p')
                            .addClass('invalid-feedback')
                            .html(value);
                    })
                }
            },
            error: function() {
                console.log("Something went worng.")
            }
        })
    });
</script>

<!-- DELETE EDU -->
<script>
    $('.delete_edu').click(function(e) {
        e.preventDefault();
        var edu_id = $(this).val();

        Swal.fire({
            title: "Are you sure?",
            text: "You won't to delete this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, sure!"
        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.member.edu.delete')}}",
                    data: {
                        'id': edu_id
                    },
                    success: function(data) {
                        if (data.status == true) {
                            Swal.fire({
                                title: "Deleted!",
                                text: data.msg,
                                icon: "success",
                                timer: 2000
                            });
                            $('#edu_' + edu_id).hide(2000);
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: data.msg,
                                icon: "error",
                                timer: 2000
                            });
                        }
                    }
                });
            }
        });
    });
</script>
@endsection