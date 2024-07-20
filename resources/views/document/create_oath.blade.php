<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
        #pdf-preview-container {
            position: relative;
            max-width: 100%;
            overflow: auto;
            margin-bottom: 20px;
        }

        .page-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .page-navigation button {
            padding: 8px 16px;
            background-color: #58718b;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .page-navigation button:hover {
            background-color: #0056b3;
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
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        #customDownloadButton:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @include('layouts.app')
    <div class="container mt-1">
        <div class="row">
            <div class="col-md-3">
                <form id="uploadForm" action="{{ route('document.post', ['id' => 1]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">{{ "OATH/KIAPO" }}</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name of document:</label>
                                <input type="text" name="name" id="name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" name="description" id="description" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="document">Upload Document:</label>
                                <input type="file" name="document" id="document" required class="form-control-file">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit & Preview</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">{{ "MY DOCUMENTS" }}</div>
                    <ul class="list-group" id="pdf-lists">
                        @foreach($documents as $document)
                            <li class="list-group-item" data-url="{{ $document->attachment }}" data-id="{{ $document->id }}">
                                {{ $document->name }} - <span>{{ $document->downloaded_at }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
                <div id="pdf-preview-container">
                    <legend>Attachment Preview</legend>
                    <button id="customDownloadButton" style="display:none;">Download</button>
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
                renderPDF(pdfUrl, documentId);
            });

            function renderPDF(pdfUrl, documentId) {
                let $pdfPreviewContainer = $("#pdf-preview-container");
                $pdfPreviewContainer.find("iframe").remove();
                $("#customDownloadButton").show().attr("data-url", pdfUrl);

                let $iframe = $('<iframe>', {
                    src: pdfUrl,
                    frameborder: "0",
                    width: "100%",
                    height: "600px",
                    name: "budget_preview"
                });

                $pdfPreviewContainer.append($iframe);

                // Show or hide download button based on conditions
                if (pdfUrl) {
                    $("#customDownloadButton").show();
                } else {
                    $("#customDownloadButton").hide();
                }
            }

            $('#customDownloadButton').click(function() {
                var pdfUrl = $(this).data('url');
                var link = document.createElement('a');
                link.href = pdfUrl;
                link.download = pdfUrl.split('/').pop(); // Extract file name from URL
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            });
        });
    </script>
    </body>
    </html>
