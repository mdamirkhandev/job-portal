@extends('layouts.app')
@section('main')
    <section id="craeteJob" class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('auth.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('message')
                    <form action="" method="post" id="updateJobForm" name="updateJobForm">
                        <div class="card border-0 shadow mb-4 ">
                            <div class="card-body card-form p-4">
                                <h3 class="fs-4 mb-1">Edit Job Details</h3>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="title" class="mb-2">Title<span class="req">*</span></label>
                                        <input value="{{ $job->title }}" type="text" placeholder="Job Title"
                                            id="title" name="title" class="form-control">
                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="category" class="mb-2">Category<span class="req">*</span></label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select a Category</option>
                                            @if ($categories->isNotEmpty())
                                                @foreach ($categories as $category)
                                                    <option {{ $job->category_id == $category->id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="jobType" class="mb-2">Job Nature<span class="req">*</span></label>
                                        <select class="form-select" name="jobType" id="jobType">
                                            <option value="">Select Job Nature</option>
                                            @if ($jobTypes->isNotEmpty())
                                                @foreach ($jobTypes as $jobType)
                                                    <option {{ $job->job_type_id == $jobType->id ? 'selected' : '' }}
                                                        value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6  mb-4">
                                        <label for="vacancy" class="mb-2">Vacancy<span class="req">*</span></label>
                                        <input value="{{ $job->vacancy }}" type="number" min="1"
                                            placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="salary" class="mb-2">Salary</label>
                                        <input value="{{ $job->salary }}" type="text" placeholder="Salary"
                                            id="salary" name="salary" class="form-control">
                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="location" class="mb-2">Location<span class="req">*</span></label>
                                        <input value="{{ $job->location }}" type="text" placeholder="Location"
                                            id="location" name="location" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="mb-2">Description<span class="req">*</span></label>
                                    <textarea class="textarea" name="description" id="description" cols="5" rows="5" placeholder="Description"> {{ $job->description }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="benefits" class="mb-2">Benefits</label>
                                    <textarea class="textarea" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{ $job->benefits }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="responsibility" class="mb-2">Responsibility</label>
                                    <textarea class="textarea" name="responsibility" id="responsibility" cols="5" rows="5"
                                        placeholder="Responsibility">{{ $job->responsibility }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="qualifications" class="mb-2">Qualifications</label>
                                    <textarea class="textarea" name="qualifications" id="qualifications" cols="5" rows="5"
                                        placeholder="Qualifications">{{ $job->qualifications }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="experience" class="mb-2">Experience<span
                                            class="req">*</span></label>
                                    <select class="form-select" name="experience" id="experience">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ $i }}"
                                                {{ $job->experience == $i ? 'selected' : '' }}>
                                                {{ $i }} Year
                                            </option>
                                        @endfor
                                        <option value="10_plus" {{ $job->experience == '10_plus' ? 'selected' : '' }}>
                                            10+ Year
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="keywords" class="mb-2">Keywords<span class="req">*</span></label>
                                    <input value="{{ $job->keywords }}" type="text" placeholder="keywords"
                                        id="keywords" name="keywords" class="form-control">
                                </div>

                                <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                                <div class="row">
                                    <div class="mb-4 col-md-6">
                                        <label for="company_name" class="mb-2">Company Name<span
                                                class="req">*</span></label>
                                        <input type="text" placeholder="Company Name" id="company_name"
                                            value="{{ $job->company_name }}" name="company_name" class="form-control">
                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label for="company_location" class="mb-2">Location</label>
                                        <input type="text" placeholder="Location" id="company_location"
                                            value="{{ $job->company_location }}" name="company_location"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="company_website" class="mb-2">Website</label>
                                    <input type="text" placeholder="Website" id="company_website"
                                        value="{{ $job->company_website }}" name="company_website" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Update Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('registerJs')
    <script>
        $('#updateJobForm').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var formData = form.serializeArray();
            $.ajax({
                type: 'put',
                url: "{{ route('jobs.update', $job->id) }}",
                dataType: 'json',
                data: formData,
                success: function(data) {
                    if (data.status) {
                        console.log('Job Updated successfully');
                        window.location.href = "{{ route('jobs.index') }}"
                    } else {
                        handleValidationErrors(data.errors, form);
                        console.log('Validation errors:', data.errors);
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });

        function handleValidationErrors(errors, form) {
            // Clear previous validation errors
            form.find('.is-invalid').removeClass('is-invalid');
            form.find('.invalid-feedback').empty();
            // Display new validation errors
            $.each(errors, function(fieldName, errorMessage) {
                var inputField = form.find('[name="' + fieldName + '"]');
                var errorContainer = inputField.addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                    .html(errorMessage);
            });
        }
    </script>
@endsection
