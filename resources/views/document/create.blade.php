<!-- resources/views/upload-form.blade.php -->
@include('layouts.app')
<div class="row">
    <div class="col-md-4">
        <form id="uploadForm" action="{{ route('document.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">{{ "CERTIFICATION" }}</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="document">Upload Document:</label>
                            <input type="file" name="document" id="document" required>
                        </div>
                        <div class="form-group row">
                            <button type="submit">submit & preview</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <div class="col-md-8">
                <div id="pdf-preview-container">

                </div>
            </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#uploadForm').submit(function(event) {
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
                        const pdfPreviewUrl = data.url;
                        $('#pdf-preview-container').html(`<embed src="${pdfPreviewUrl}" width="800px" height="600px" />`);
                    } else {
                        alert('Upload failed. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>
    

