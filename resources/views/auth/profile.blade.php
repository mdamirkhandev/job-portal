@extends('layouts.app')
@section('main')
    <section id="profile" class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
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
                    <form action="" method="post" id="profileForm">
                        <div class="card border-0 shadow mb-4">
                            <div class="card-body  p-4">
                                <h3 class="fs-4 mb-1">My Profile</h3>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Name*</label>
                                    <input type="text" name="name" id="name" placeholder="Enter Name"
                                        class="form-control" value="{{ $user->name }}">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Email*</label>
                                    <input type="text" name="email" id="email" placeholder="Enter Email"
                                        class="form-control" value="{{ $user->email }}">
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Designation*</label>
                                    <input type="text" name="designation" id="designation" placeholder="Designation"
                                        class="form-control" value="{{ $user->designation }}">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="mb-2">Mobile*</label>
                                    <input type="text" name="phone" id="phone" placeholder="Mobile"
                                        class="form-control" value="{{ $user->phone }}">
                                </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>

                    <div class="card border-0 shadow mb-4">
                        <div class="card-body p-4">
                            <h3 class="fs-4 mb-1">Change Password</h3>
                            <div class="mb-4">
                                <label for="" class="mb-2">Old Password*</label>
                                <input type="password" placeholder="Old Password" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">New Password*</label>
                                <input type="password" placeholder="New Password" class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Confirm Password*</label>
                                <input type="password" placeholder="Confirm Password" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer  p-4">
                            <button type="button" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('registerJs')
    <script>
        $('#profileForm').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                type: 'put',
                url: "{{ route('account.profileUpdate') }}",
                data: formData,
                success: function(data) {
                    if (data.status) {
                        // Update the fields with the new data
                        $('#name').val(data.user.name);
                        $('#email').val(data.user.email);
                        $('#designation').val(data.user.designation);
                        $('#phone').val(data.user.phone);

                        // Remove validation error classes and messages
                        $("#name, #email").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('');
                        console.log('Profile updated successfully');
                        location.reload();
                    } else {
                        // Handle validation errors
                        handleValidationErrors(data.errors, form);
                        console.log('Validation errors:', data.errors);
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                    // Handle the error as needed
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
