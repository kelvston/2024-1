@extends('layouts.app')

@section('content')
    <body>
    <!-- Video Background -->
    <video id="legalVideo" src="{{ asset('assets/video/legal.mp4') }}" muted loop autoplay></video>

    <!-- Overlay to enhance text readability -->
    <div class="overlay"></div>

    <!-- Welcome Text -->
    <div class="text">
        <h2>Welcome to Legal Aid</h2>
        <p>
            At Legal Aid, we are committed to providing comprehensive legal services tailored to your needs. Whether you're seeking guidance, representation, or simply information, our team of experienced professionals is here to assist you every step of the way. We believe that justice should be accessible to everyone, and we strive to empower individuals by offering expert legal support.
        </p>
        <p>
            Explore our services, learn more about your legal rights, and trust that you're in good hands. We look forward to helping you navigate the complexities of the legal system with ease and confidence.
        </p>
    </div>

    <footer>
        <!-- Footer content here -->
    </footer>
    </body>

    <!-- CSS Styling -->
    <style>
        /* Ensure full-page coverage */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden; /* Prevent scrolling */
        }

        /* Video Styling */
        video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the video covers the entire screen */
            z-index: -1; /* Places the video behind other content */
        }

        /* Overlay for better text readability */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay */
            z-index: 0;
        }

        /* Centered text content */
        .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 1; /* Ensure text appears above the video */
            width: 80%;
            max-width: 800px;
        }

        .text h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .text p {
            font-size: 1.2rem;
            line-height: 1.5;
        }
    </style>

    <script>
        // Adjust video playback speed
        const video = document.getElementById('legalVideo');
        video.playbackRate = 1.25; // Adjust video speed

        // Lazy loading dropdown menu
        document.addEventListener('DOMContentLoaded', function() {
            function toggleDropdown(dropdown, action) {
                if (action === 'show') {
                    dropdown.classList.add('show');
                } else {
                    dropdown.classList.remove('show');
                }
            }

            function handleDropdownMouseEvents(link, dropdown) {
                let timer; // Timer to manage hide delay

                link.addEventListener('mouseenter', function() {
                    clearTimeout(timer);
                    toggleDropdown(dropdown, 'show');
                });

                link.addEventListener('mouseleave', function() {
                    timer = setTimeout(function() {
                        if (!dropdown.matches(':hover')) {
                            toggleDropdown(dropdown, 'hide');
                        }
                    }, 300);
                });

                dropdown.addEventListener('mouseenter', function() {
                    clearTimeout(timer);
                    toggleDropdown(dropdown, 'show');
                });

                dropdown.addEventListener('mouseleave', function() {
                    timer = setTimeout(function() {
                        toggleDropdown(dropdown, 'hide');
                    }, 300);
                });
            }

            // Initialize lazy loading for all dropdowns
            const dropdownLinks = document.querySelectorAll('.dropdown-toggle');
            dropdownLinks.forEach(function(link) {
                const dropdown = link.nextElementSibling;
                if (dropdown) {
                    handleDropdownMouseEvents(link, dropdown);
                }
            });
        });
    </script>

@endsection
