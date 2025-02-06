@include('layouts.app')

<div class="container my-5">
    <div class="row justify-content-center">
        <!-- First Form: TAARIFA ZA NDOA -->
        <div class="col-md-5">
            <form id="uploadFormMajina" action="{{ route('document.save_names') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card shadow-lg border-light">
                    <div class="card-header bg-primary text-white text-center">
                        <h4><strong>{{ "TAARIFA ZA NDOA" }}</strong></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Full Name:</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Enter full name" required>
                        </div>
                        <div class="form-group">
                            <label for="address" class="font-weight-bold">Address:</label>
                            <input type="text" name="address" id="address" class="form-control form-control-lg" placeholder="Enter address" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="font-weight-bold">Phone Number:</label>
                            <input type="text" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter phone" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email:</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="nida" class="font-weight-bold">NIDA:</label>
                            <input type="text" name="nida" id="nida" class="form-control form-control-lg" placeholder="Enter NIDA" required>
                        </div>
                        <div class="form-group">
                            <label for="communication" class="font-weight-bold">Njia Ya Mawasiliano:</label>
                            <select id="communication" name="communication" required onchange="handleCommunication()">
                                <option value="">-- Chagua --</option>
                                <option value="normal" {{ old('communication') == 'normal' ? 'selected' : '' }}>Normal Chat</option>
                                <option value="whatsapp" {{ old('communication') == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
{{--                                <option value="whatsapp_voice" {{ old('communication') == 'whatsapp_voice' ? 'selected' : '' }}>WhatsApp Voice Call</option>--}}
{{--                                <option value="whatsapp_video" {{ old('communication') == 'whatsapp_video' ? 'selected' : '' }}>WhatsApp Video Call</option>--}}
                                <option value="email" {{ old('communication') == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="Online_meeting" {{ old('communication') == 'Online_meeting' ? 'selected' : '' }}>Online Meeting</option>
                            </select>
                            @error('communication')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-lg w-100">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Second Form: TAARIFA ZA MTEJA -->
        <div class="col-md-5">
            <div class="card shadow-lg border-light">
                <div class="card-header bg-info text-white text-center">
                    <h4><strong>{{ "TAARIFA ZA MTEJA" }}</strong></h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="description_1" class="font-weight-bold">DESCRIPTION:</label>
                        <textarea name="description[]" id="description_1" class="form-control form-control-lg" rows="3" placeholder="Enter description" required></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleCommunication() {
        let selection = document.getElementById("communication").value;

        if (selection === "whatsapp") {
            window.open("https://wa.me/255754240753", "_blank"); // Replace with actual phone number
        }
        else if (selection === "email") {
            window.location.href = "mailto:nicombukoti1909@gmail.com?subject=Mawasiliano&body=Habari,";
        }

        else if (selection === "Online_meeting") {
            window.open("https://meet.google.com/adg-skmf-wzv", "_blank"); // Replace with actual meeting link
        }
    }
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#uploadFormMajina').submit(function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.success) {
                        const datas = data.data
                        $.ajax({
                            url: '{{ route("generate.pdf") }}',
                            type: 'POST',
                            data: {
                                datas
                            },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'The PDF has been generated successfully.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'An error occurred while generating the PDF.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Upload Failed',
                            text: 'Upload failed. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        // Dynamically add new "Tatizo" fields
        $('#addJinaSahihi').click(function() {
            var newField = '<div class="form-group row">' +
                '<label for="name_edit" class="col-form-label col-md-3 font-weight-bold">Tatizo Lingine:</label>' +
                '<input type="text" name="name_edit[]" class="form-control col-md-7" placeholder="Describe another issue" required>' +
                '<button type="button" class="btn btn-danger col-md-2 removeJinaSahihi">-</button>' +
                '</div>';
            $('#jinaSahihiContainer').append(newField);
        });

        $(document).on('click', '.removeJinaSahihi', function() {
            $(this).parent().remove();
        });
    });
</script>
