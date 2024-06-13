<!-- resources/views/upload-form.blade.php -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
    <style>
       #pdf-preview-container {
            position: relative;
        }

        #pdf-preview-container canvas {
            width: 100%;
            height: auto;
            border: 1px solid #ddd; /* Border for the PDF canvas */
        }

        #customDownloadButton {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1000;
            padding: 8px 12px; 
            background-color: #58718b;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px; /* Reduced font size for smaller button */
            transition: background-color 0.3s ease;
        }

        #customDownloadButton:hover {
            background-color: #0056b3;
        }
    </style>
@include('layouts.app')
<div class="row">
    <div class="col-md-3">
        <form id="uploadForm" action="{{ route('document.post', ['id' => 1]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">{{ "OATH/KIAPO" }}</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name">Name of document:</label>
                            <input type="string" name="name" id="name" required>
                        </div>
                        <div class="form-group row">
                            <label for="description">Description:</label>
                            <input type="string" name="description" id="description" required>
                        </div>
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
        <div class="col-md-2"> 
            <div id="pdf-lists">
                <div class="card-header">{{ "MY DOCUMENTS" }}</div>
                <ul class="list-group">
                    @foreach($documents as $document)
                    <li class="list-group-item" data-url="{{ $document->attachment }}" data-id="{{ $document->id }}" >{{ $document->name }}-<span>{{$document->downloaded_at}}</span></li>
                    @endforeach
                </ul>
            </div>
</div>

            <div class="col-md-7">
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
                        const documentId = data.document_id;
                        renderPDF(pdfPreviewUrl, documentId);
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
    
        $('#pdf-lists').on('click', '.list-group-item', function() {
            var pdfUrl = $(this).data('url');
            var documentId = $(this).data('id');
            console.log(documentId);
            renderPDF(pdfUrl, documentId);
        });
    
        function renderPDF(pdfUrl, documentId) {
            var pdfjsLib = window['pdfjs-dist/build/pdf'];
    
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
    
            var loadingTask = pdfjsLib.getDocument(pdfUrl);
            loadingTask.promise.then(function(pdf) {
                var pageNumber = 1;
                pdf.getPage(pageNumber).then(function(page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({ scale: scale });
    
                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;
    
                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext).promise.then(function() {
                        // Create the custom download button
                        var downloadButton = document.createElement('button');
                        downloadButton.setAttribute('id', 'customDownloadButton');
                        downloadButton.setAttribute('data-url', pdfUrl);
                        downloadButton.setAttribute('data-id', documentId);
                        downloadButton.innerText = 'click to get';
    
                        // Append the canvas and button to the PDF preview container
                        var pdfPreviewContainer = document.getElementById('pdf-preview-container');
                        pdfPreviewContainer.innerHTML = ''; // Clear previous content
                        pdfPreviewContainer.appendChild(downloadButton);
                        pdfPreviewContainer.appendChild(canvas);
                    });
                });
            });
    
            $('#pdf-preview-container').on('click', '#customDownloadButton', function() {
                var documentId = $(this).data('id');
    
                // Capture download time and save it
                $.ajax({
                    url: '{{ route('document.update_download_time', ['documentId' => '__documentId__']) }}'.replace('__documentId__', documentId),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            window.open(pdfUrl, '_blank');
                        } else {
                            alert('Failed to update download time. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        }
    });
    </script>
    

