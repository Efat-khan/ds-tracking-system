@extends('backEnd.layouts.master')

@section('content')
<div class="page-wrapper">
  <div class="page-content">
    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img alt="logoImagePreview" src="{{asset($layout_setting !=null ?$layout_setting->logo_image:'')}}" class="rounded-square p-1 " width="250" id="logoImagePreview">
                  <div class="mt-3">
                    <h3>{{!empty($layout_setting->web_title)?$layout_setting->web_title:'WEB SITE TITLE'}}</h3>
                    <form action="" method="POST" id="add_logo_image">
                      <input type="text" hidden name="id"
                        value="{{$layout_setting != null?$layout_setting->id:null}}">
                      <div class="row">
                        <div class="col-md-6">
                          <input class="form-control" type="file" name="logo_image" id="logoFile">
                        </div>

                        <div class="col-md-6 mb-3">
                          <button class="btn btn-primary" type="submit"><i class=' bx bxs-check-circle me-0'></i> Save</button>
                        </div>
                        <p class="card-text mb-2"><small class="text-muted">Last updated {{ !empty($layout_setting->updated_at)?$layout_setting->updated_at->diffForHumans():'0' }}</small>
                        </p>
                      </div>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="mb-4">OUR VISION</h5>
                <form method="POST" name="add_vision" id="add_vision" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="{{$layout_setting != null?$layout_setting->id:null}}">
                  <div class="row">
                    <div class="col-md-12 mb-0">
                      <label class="form-label">Title</label>
                      <input type="text" class="form-control" name="vision_title" value="{{!empty($layout_setting->vision_title)?$layout_setting->vision_title:''}}" placeholder="Vision title">
                      <p class="error"></p>
                    </div>
                    <div class="col-md-12 mb-0">
                      <label for="input23" class="form-label">Description</label>
                      <textarea class="form-control" name="vision_description" id="input23" placeholder="Vision Description..." rows="2">{{!empty($layout_setting->vision_description)?$layout_setting->vision_description:''}}</textarea>
                      <p class="error"></p>
                    </div>
                    <div class="col-md-12 mb-2">
                      <label for="input23" class="form-label">Image</label>
                      <input class="form-control" type="file" name="vision_image" id="vision_image_file">
                    </div>

                    <div class="col-md-12 mb-2">
                      <img id="visionImagePreview" src="{{ asset(!empty($layout_setting->vision_image)?$layout_setting->vision_image:'') }}" alt="Image Preview" class="img-thumbnail" style="max-width: 200px; display: {{ !empty($layout_setting->vision_image) ? 'block' : 'none' }};">
                    </div>

                    <div class="col-md-12 mb-0">
                      <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4"><i class=' bx bxs-check-circle me-0'></i> Save</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="mb-4">Web Site Information</h5>
                <form method="POST" name="add_site_info" id="add_site_info">
                  <input type="hidden" name="id" value="{{$layout_setting != null?$layout_setting->id:null}}">
                  <div class="row">
                    <div class="col-md-4 mb-1">
                      <label class="form-label">Web site title</label>
                      <input type="text" class="form-control" name="web_title"
                        value="{{!empty($layout_setting->web_title)?$layout_setting->web_title:''}}" placeholder="Web site title" />
                      <p class="error"></p>
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" value="{{!empty($layout_setting->email)?$layout_setting->email:''}}" placeholder="Email" />
                      <p class="error"></p>
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">Phone</label>
                      <input type="text" class="form-control" name="phone" value="{{!empty($layout_setting->phone)?$layout_setting->phone:''}}" placeholder="Phone" />
                      <p class="error"></p>
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">FB Link</label>
                      <input type="text" class="form-control" name="fb_link" value="{{!empty($layout_setting->fb_link)?$layout_setting->fb_link:''}}" placeholder="FB Link" />
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">In Link</label>
                      <input type="text" class="form-control" name="in_link" value="{{!empty($layout_setting->in_link)?$layout_setting->in_link:''}}" placeholder="In Link" />
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">X Link</label>
                      <input type="text" class="form-control" name="x_link" value="{{!empty($layout_setting->x_link)?$layout_setting->x_link:''}}" placeholder="X Link" />
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">YouTube Link</label>
                      <input type="text" class="form-control" name="youtube_link" value="{{!empty($layout_setting->youtube_link)?$layout_setting->youtube_link:''}}" placeholder="YouTube Link" />
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">Location</label>
                      <input type="text" class="form-control" name="location" value="{{!empty($layout_setting->location)?$layout_setting->location:''}}" placeholder="Location" />
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">GPS Location</label>
                      <input type="text" class="form-control" name="gps_location" value="{{!empty($layout_setting->gps_location)?$layout_setting->gps_location:''}}" placeholder="GPS Location" />
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">Copy Right</label>
                      <input type="text" class="form-control" name="copyright_text" value="{{!empty($layout_setting->copyright_text)?$layout_setting->copyright_text:''}}" placeholder="Copyright text" />
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">Copy Right link</label>
                      <input type="text" class="form-control" name="copyright_link" value="{{!empty($layout_setting->copyright_link)?$layout_setting->copyright_link:''}}" placeholder="Copy Right link" />
                    </div>
                    

                    <div class="col-md-12 mb-1">
                      <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4"><i class=' bx bxs-check-circle me-0'></i> Save</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6 " hidden>
            <div class="card">
              <div class="card-body">
                <h5 class="mb-4">Watch Our Old Videos</h5>
                <form method="POST" name="add_feature_video" id="add_feature_video" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="{{$layout_setting != null?$layout_setting->id:null}}">
                  <div class="row">
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">Feature video image</label>
                      <input class="form-control" name="feature_video_link_image" type="file" id="feature_video_link_image_file">
                      <p class="error"></p>
                    </div>
                    <div class="col-md-8 mb-1">
                      <label class="form-label">Feature video link</label>
                      <input type="text" class="form-control" name="feature_video_link" value="{{!empty($layout_setting->feature_video_link)?$layout_setting->feature_video_link:''}}" placeholder="Feature video link">
                      <p class="error"></p>
                    </div>

                    <div class="col-md-12 mb-2">
                      <img id="feature_video_link_imagePreview" src="{{ asset(!empty($layout_setting->feature_video_link_image)? $layout_setting->feature_video_link_image:'') }}" alt="Image Preview" class="img-thumbnail" style="max-width: 200px; display: {{ !empty($layout_setting->feature_video_link_image) ? 'block' : 'none' }};">
                    </div>
                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">Video image</label>
                      <input class="form-control" name="sub_feature_video_link_1_image" type="file" id="sub_feature_video_link_1_image_file">
                      <p class="error"></p>
                    </div>
                    <div class="col-md-8 mb-1">
                      <label class="form-label">Video link</label>
                      <input type="text" class="form-control" name="sub_feature_video_link_1" value="{{!empty($layout_setting->sub_feature_video_link_1)?$layout_setting->sub_feature_video_link_1:''}}" placeholder="video link">
                      <p class="error"></p>
                    </div>

                    <div class="col-md-12 mb-2">
                      <img id="sub_feature_video_link_1_imagePreview" src="{{ asset(!empty($layout_setting->sub_feature_video_link_1_image)?$layout_setting->sub_feature_video_link_1_image:'') }}" alt="Image Preview" class="img-thumbnail" style="max-width: 200px; display: {{!empty($layout_setting->sub_feature_video_link_1_image) ? 'block' : 'none' }};">
                    </div>

                    <div class="col-md-4 mb-1">
                      <label for="input23" class="form-label">Video image</label>
                      <input class="form-control" name="sub_feature_video_link_2_image" type="file" id="sub_feature_video_link_2_image_file">
                      <p class="error"></p>
                    </div>
                    <div class="col-md-8 mb-1">
                      <label class="form-label">Video link</label>
                      <input type="text" class="form-control" name="sub_feature_video_link_2" value="{{!empty($layout_setting->sub_feature_video_link_2)?$layout_setting->sub_feature_video_link_2:''}}" placeholder="video link">
                      <p class="error"></p>
                    </div>


                    <div class="col-md-12 mb-2">
                      <img id="sub_feature_video_link_2_imagePreview" src="{{ asset(!empty($layout_setting->sub_feature_video_link_2_image)?$layout_setting->sub_feature_video_link_2_image:'') }}" alt="Image Preview" class="img-thumbnail" style="max-width: 200px; display: {{ !empty($layout_setting->sub_feature_video_link_2_image) ? 'block' : 'none' }};">
                    </div>

                    <div class="col-md-12 mb-1">
                      <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4"><i class=' bx bxs-check-circle me-0'></i> Save</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom-js-section')

<!-- Image Privew -->
<script type="text/javascript">
  document.getElementById('logoFile').addEventListener('change', function(event) {
    // Check if a file is selected
    if (event.target.files && event.target.files[0]) {
      const reader = new FileReader();

      // Set up the callback for the `load` event
      reader.onload = function(e) {
        // Update the `src` attribute of the preview image
        document.getElementById('logoImagePreview').src = e.target.result;
        document.getElementById('logoImagePreview').style.display = 'block'; // Make the preview visible
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(event.target.files[0]);
    }
  });
</script>
<!-- feature video_image_file preview -->
<script type="text/javascript">
  document.getElementById('feature_video_link_image_file').addEventListener('change', function(event) {
    // Check if a file is selected
    if (event.target.files && event.target.files[0]) {
      const reader = new FileReader();

      // Set up the callback for the `load` event
      reader.onload = function(e) {
        // Update the `src` attribute of the preview image
        document.getElementById('feature_video_link_imagePreview').src = e.target.result;
        document.getElementById('feature_video_link_imagePreview').style.display = 'block'; // Make the preview visible
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(event.target.files[0]);
    }
  });
</script>
<!-- sub_feature_video_link_1 preview -->
<script type="text/javascript">
  document.getElementById('sub_feature_video_link_1_image_file').addEventListener('change', function(event) {
    // Check if a file is selected
    if (event.target.files && event.target.files[0]) {
      const reader = new FileReader();

      // Set up the callback for the `load` event
      reader.onload = function(e) {
        // Update the `src` attribute of the preview image
        document.getElementById('sub_feature_video_link_1_imagePreview').src = e.target.result;
        document.getElementById('sub_feature_video_link_1_imagePreview').style.display = 'block'; // Make the preview visible
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(event.target.files[0]);
    }
  });
</script>
<!-- sub_feature_video_link_2 preview -->
<script type="text/javascript">
  document.getElementById('sub_feature_video_link_2_image_file').addEventListener('change', function(event) {
    // Check if a file is selected
    if (event.target.files && event.target.files[0]) {
      const reader = new FileReader();

      // Set up the callback for the `load` event
      reader.onload = function(e) {
        // Update the `src` attribute of the preview image
        document.getElementById('sub_feature_video_link_2_imagePreview').src = e.target.result;
        document.getElementById('sub_feature_video_link_2_imagePreview').style.display = 'block'; // Make the preview visible
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(event.target.files[0]);
    }
  });
</script>
<!-- vision_image_file preview -->
<script type="text/javascript">
  document.getElementById('vision_image_file').addEventListener('change', function(event) {
    // Check if a file is selected
    if (event.target.files && event.target.files[0]) {
      const reader = new FileReader();

      // Set up the callback for the `load` event
      reader.onload = function(e) {
        // Update the `src` attribute of the preview image
        document.getElementById('visionImagePreview').src = e.target.result;
        document.getElementById('visionImagePreview').style.display = 'block'; // Make the preview visible
      }

      // Read the selected image file as a data URL
      reader.readAsDataURL(event.target.files[0]);
    }
  });
</script>
<!-- Add logo image form -->
<script>
  $('#add_logo_image').submit(function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    $("button[type='submit']").prop("disabled", true);

    $.ajax({
      url: "{{ route('admin.landing_page.logo.store') }}",
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
          $('#add_logo_image')[0].reset();
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

<!-- Add Feature Video Form -->
<script>
  $('#add_feature_video').submit(function(event) {
    event.preventDefault();
    // alert('ok');
    var formData = new FormData(this);

    $("button[type='submit']").prop("disabled", true);

    $.ajax({
      url: "{{ route('admin.landing_page.feature_video.store') }}",
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
          $('#add_feature_video')[0].reset();
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
<!-- Add Site Info Form -->
<script>
  $('#add_site_info').submit(function(event) {
    event.preventDefault();

    var formData = $(this).serializeArray();

    $("button[type='submit']").prop("disabled", true);

    $.ajax({
      url: "{{ route('admin.landing_page.site_info.store') }}",
      type: "POST",
      data: formData,
      dataType: "json",

      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      success: function(response) {
        $("button[type='submit']").prop("disabled", false);

        if (response.status === true) {
          $('#add_site_info')[0].reset();
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
<!-- Add Site Info Form -->
<script>
  $('#add_vision').submit(function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    // var formData = new formData(this);

    $("button[type='submit']").prop("disabled", true);

    $.ajax({
      url: "{{ route('admin.landing_page.vision.store') }}",
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
          $('#add_vision')[0].reset();
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