<!-- resources/views/upload-form.blade.php -->
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


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
</head>
@include('layouts.app')

<div class="container">
<div class="row">
    <div class="col-md-5">
        <form id="uploadFormKuzaliwa" action="{{ route('document.save_kuzaliwa') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">{{ "TAARIFA BINAFSI" }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name">Full name:</label>
                        <input type="string" name="name" id="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="address">Address:</label>
                        <input type="string" name="address" id="address" value="{{ old('address') }}" required>
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="religion">Religion:</label>
                        <input type="string" name="religion" id="religion" value="{{ old('religion') }}" required>
                        @error('religion')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="occupation">Occupation:</label>
                        <input type="string" name="occupation" id="occupation" value="{{ old('occupation') }}" required>
                        @error('occupation')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="date">Tarehe Ya Kuzaliwa:</label>
                        <input type="date" name="date" id="date" value="{{ old('date') }}" required>
                        @error('date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="birthCategory">Mahali Pa Kuzaliwa:</label>
                        <select id="birthCategory" name="birthCategory" required>
                            <option value="">-- Chagua --</option>
                            <option value="hospital" {{ old('birthCategory') == 'hospital' ? 'selected' : '' }}>Hospitali</option>
                            <option value="home" {{ old('birthCategory') == 'home' ? 'selected' : '' }}>Nyumbani</option>
                        </select>
                        @error('birthCategory')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group row" id="hospitalField" style="display: none;">
                        <label for="hospital">Jina La Hospitali:</label>
                        <input type="text" id="hospital" name="hospital" value="{{ old('hospital') }}">
                        @error('hospital')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="hospital_address">Anuani:</label>
                        <input type="text" id="hospital_address" name="hospital_address" value="{{ old('hospital_address') }}" placeholder="P.O.box XXX, Iringa">
                        @error('hospital_address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group row" id="homeField" style="display: none;">
                        <label for="region">Mkoa:</label>
                        <input type="text" id="homeregionAddress" name="region" value="{{ old('region') }}">
                        @error('region')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="district">Wilaya:</label>
                        <input type="text" id="district" name="district" value="{{ old('district') }}">
                        @error('district')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="ward">Kata:</label>
                        <input type="text" id="ward" name="ward" value="{{ old('ward') }}">
                        @error('ward')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="village">Kijiji/Mtaa:</label>
                        <input type="text" id="village" name="village" value="{{ old('village') }}">
                        @error('village')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="birthWitness">Aliyekuwepo Wakati wa Kuzaliwa:</label>
                        <select id="birthWitness" name="birthWitness" required>
                            <option value="">-- Chagua --</option>
                            <option value="doctor" {{ old('birthWitness') == 'doctor' ? 'selected' : '' }}>Daktari</option>
                            <option value="regular" {{ old('birthWitness') == 'regular' ? 'selected' : '' }}>Mtu wa Kawaida</option>
                        </select>
                        @error('birthWitness')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group row" id="witnessNameField" style="display: none;">
                        <label for="witnessName">Weka Jina Lake:</label>
                        <input type="text" id="witnessName" name="witnessName" value="{{ old('witnessName') }}">
                        @error('witnessName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="signature">Weka/Pakia Sahihi:</label>
                        <input type="file" name="signature" id="signature" accept="image/*" required>
                        @error('signature')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <button type="submit">submit & preview</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
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

    <div class="col-md-5">
        <div id="pdf-preview-container">

        </div>
    </div>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    document.addEventListener("DOMContentLoaded", function () {
        let birthCategory = document.getElementById("birthCategory");
        birthCategory.addEventListener("change", toggleBirthPlace);

        function toggleBirthPlace() {
            let category = birthCategory.value;
            let hospitalField = document.getElementById("hospitalField");
            let homeField = document.getElementById("homeField");

            if (category === "hospital") {
                hospitalField.style.display = "block";
                homeField.style.display = "none";
            } else if (category === "home") {
                hospitalField.style.display = "none";
                homeField.style.display = "block";
            } else {
                hospitalField.style.display = "none";
                homeField.style.display = "none";
            }
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const birthWitness = document.getElementById("birthWitness");
        const witnessNameField = document.getElementById("witnessNameField");
        const witnessNameInput = document.getElementById("witnessName");

        birthWitness.addEventListener("change", function () {
            if (this.value === "regular") {
                witnessNameField.style.display = "block";
                witnessNameInput.required = true;
            } else {
                witnessNameField.style.display = "none";
                witnessNameInput.required = false;
                witnessNameInput.value = ""; // Clears input when hidden
            }
        });
    });


    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#uploadFormKuzaliwa').submit(function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.success) {
                        const datas = data.data;
                        $.ajax({
                            url: '{{ route("generate_pdf_kuzaliwa") }}',
                            type: 'POST',
                            data: {datas},
                            success: function (response) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'The PDF has been generated successfully.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    location.reload(); // Reload the page after showing the success alert
                                });
                                console.log('PDF generated successfully:', response);
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'An error occurred while generating the PDF.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                                console.error('Error in PDF generation:', error);
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
                error: function (xhr, status, error) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred during upload. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    console.error('Error during form submission:', error);
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

        $('#addJinaSahihi').click(function() {
            var newField = '<div class="form-group row">' +
                '<label for="name_edit">Jina Sahihi:</label>' +
                '<input type="string" name="name_edit[]" class="name_edit" required>' +
                '<button type="button" class="btn btn-danger ml-2 removeJinaSahihi">-</button>' +
                '</div>';
            $('#jinaSahihiContainer').append(newField);
        });

        $(document).on('click', '.removeJinaSahihi', function() {
            $(this).parent().remove();
        });

        $('#addJinaKosewa').click(function() {
            var newField = '<div class="form-group row">' +
                '<label for="name_wrong">Lililokosewa:</label>' +
                '<input type="string" name="name_wrong[]" class="name_wrong" required>' +
                '<button type="button" class="btn btn-danger ml-2 removeJinaKosewa">-</button>' +
                '</div>';
            $('#jinaKosewaContainer').append(newField);
        });

        $(document).on('click', '.removeJinaKosewa', function() {
            $(this).parent().remove();
        });

    });
</script>


