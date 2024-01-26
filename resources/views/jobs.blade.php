@extends('layouts.app')

@section('main')
    <section class="section-3 py-5 bg-2 ">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-10 ">
                    <h2>Find Jobs</h2>
                </div>
                <div class="col-6 col-md-2">
                    <div class="align-end">
                        <select name="sort" id="sort" class="form-control">
                            <option value="1">Latest</option>
                            <option value="0">Oldest</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-md-4 col-lg-3 sidebar mb-4">
                    <form action="" method="get" name="searchForm" id="searchForm">
                        <div class="card border-0 shadow p-4">
                            <div class="mb-4">
                                <h2>Keywords</h2>
                                <input value="{{ Request::get('keywords') }}" type="text" id="keywords" name="keywords"
                                    placeholder="Keywords" class="form-control">
                            </div>

                            <div class="mb-4">
                                <h2>Location</h2>
                                <input value="{{ Request::get('location') }}" type="text" id="location" name="location"
                                    placeholder="Location" class="form-control">
                            </div>

                            <div class="mb-4">
                                <h2>Category</h2>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select a Category</option>
                                    @if ($categories)
                                        @foreach ($categories as $category)
                                            <option {{ Request::get('category') == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="mb-4">
                                <h2>Job Type</h2>
                                @if ($jobTypes->isNotEmpty())
                                    @foreach ($jobTypes as $jobType)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                {{ in_array($jobType->id, (array) Request::get('jobType', [])) ? 'checked' : '' }}
                                                value="{{ $jobType->id }}" name="jobType[]"
                                                id="job-type-{{ $jobType->id }}">
                                            <label class="form-check-label" for="job-type-{{ $jobType->id }}">
                                                {{ $jobType->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="mb-4">
                                <h2>Experience</h2>
                                <select name="experience" id="experience" class="form-control">
                                    <option value="">Select Experience</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option {{ Request::get('experience') == $i ? 'selected' : '' }}
                                            value="{{ $i }}">{{ $i }} Year</option>
                                    @endfor
                                    <option {{ Request::get('experience') == '10_plus' ? 'selected' : '' }}
                                        value="10_plus">10+ Years</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Search</button>
                            <a href="{{ route('all.jobs') }}" class="btn btn-secondary mt-3" type="submit">Reset</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 col-lg-9 ">
                    <div class="job_listing_area">
                        <div class="job_lists">
                            <div class="row">
                                @if ($jobs->isNotEmpty())
                                    @foreach ($jobs as $job)
                                        <div class="col-md-4">
                                            <div class="card border-0 p-3 shadow mb-4">
                                                <div class="card-body">
                                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $job->title }}</h3>
                                                    <p>{{ $job->description ? Str::limit($job->description, 40) : '' }}</p>
                                                    <div class="bg-light p-3 border">
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                            <span class="ps-1">{{ $job->location }}</span>
                                                        </p>
                                                        <p class="mb-0">
                                                            <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                            <span class="ps-1">{{ $job->jobType->name }}</span>
                                                        </p>
                                                        @if (!is_null($job->salary))
                                                            <p class="mb-0">
                                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                                <span class="ps-1">{{ $job->salary }}</span>
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <div class="d-grid mt-3">
                                                        <a href="{{ route('job.details', $job->id) }}"
                                                            class="btn btn-primary btn-lg">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('registerJs')
    <script>
        // Write code for onclick submit to run search query
        $('#search-form').on('submit', function(e) {
            e.preventDefault();
            var url = "{{ route('all.jobs') }}?";
            var formData = $(this).serializeArray();

            // Combine selected job types into a single parameter
            var selectedJobTypes = formData.filter(item => item.name === 'jobType[]').map(item => item.value);
            url += 'jobType=' + selectedJobTypes.join(',') + '&';

            window.location.href = url;
        });

        // Check checkboxes based on URL parameters
        $(document).ready(function() {
            var jobTypes = "{{ Request::get('jobType[]') }}";
            if (jobTypes) {
                jobTypes = jobTypes.split(',');
                jobTypes.forEach(function(jobType) {
                    $('#job-type-' + jobType).prop('checked', true);
                });
            }
        });
    </script>
@endsection
