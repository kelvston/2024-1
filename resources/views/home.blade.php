@extends('layouts.admin')


@include('includes.datatable_assets')
@section('admin-content')

    <style>
        /* Dark mode styling */
        .dark-mode {
            background-color: #333;
            color: white;
        }

        /* Card styling */
        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        /* Pie chart canvas */
        #casesStatusChart {
            max-width: 100%;
            height: 300px;
        }
    </style>
    <div class="spinner-border" role="status" id="loadingIndicator" style="display: none;">
        <span class="sr-only">Loading...</span>
    </div>

                <!-- Statistics -->
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Cases</h5>
                                <p class="card-text">150</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Active Lawyers</h5>
                                <p class="card-text">30</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pending Appointments</h5>
                                <p class="card-text">12</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Clients Registered</h5>
                                <p class="card-text">200</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <h3>Recent Activities</h3>
                        <ul class="list-group">
                            <li class="list-group-item">New case added: <strong>Case ID 003</strong> - John Doe</li>
                            <li class="list-group-item">New appointment scheduled for <strong>Jane Smith</strong> on 2025-02-05</li>
                            <li class="list-group-item">Client <strong>Alice Brown</strong> registered</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h3>Recent Cases</h3>
                        <table id="casesTable" class="table table-striped table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>Case ID</th>
                                <th>Client</th>
                                <th>Lawyer</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>001</td>
                                <td>John Doe</td>
                                <td>Jane Smith</td>
                                <td>Open</td>
                                <td>2025-02-02</td>
                            </tr>
                            <tr>
                                <td>002</td>
                                <td>Alice Brown</td>
                                <td>Mark White</td>
                                <td>Closed</td>
                                <td>2025-01-29</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Cases Status Chart -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <h3>Cases Status</h3>
                        <canvas id="casesStatusChart"></canvas>
                    </div>
                </div>

                <!-- Case Details Modal -->
                <div class="modal fade" id="caseDetailsModal" tabindex="-1" aria-labelledby="caseDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="caseDetailsModalLabel">Case Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Client:</strong> John Doe</p>
                                <p><strong>Lawyer:</strong> Jane Smith</p>
                                <p><strong>Status:</strong> Open</p>
                                <p><strong>Date:</strong> 2025-02-02</p>
                            </div>
                        </div>
                    </div>
                </div>

    <footer class="mt-4">
        <p class="text-center">© 2025 wakili.com</p>
    </footer>

    @push('after-script-end')
        <script src="{{ asset('ims/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('ims/plugins/datatables/js/dataTables.jqueryui.min.js') }}"></script>
        <script src="{{ asset('ims/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('ims/plugins/datatables/js/buttons/buttons.jqueryui.min.js') }}"></script>
        <script src="{{ asset('ims/plugins/datatables/js/buttons/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('ims/plugins/datatables/js/buttons/buttons.print.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            $(document).ready(function() {
                    $('#casesTable').DataTable({
                        "paging": true,
                        "searching": true,
                        "ordering": true,
                        "info": false
                    });


                // Dark Mode Toggle
                $('#darkModeToggle').click(function() {
                    $('body').toggleClass('dark-mode');
                });

                // Cases Status Chart
                var ctx = document.getElementById('casesStatusChart').getContext('2d');
                var casesStatusChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Open', 'Closed', 'Pending'],
                        datasets: [{
                            label: 'Cases Status',
                            data: [50, 30, 20], // Example data
                            backgroundColor: ['#007bff', '#28a745', '#ffc107']
                        }]
                    }
                });

                // Case Details Modal
                $('#casesTable tbody').on('click', 'tr', function() {
                    var caseId = $(this).find('td').first().text();
                    // Fetch case details using AJAX or load dynamic content
                    $('#caseDetailsModal').modal('show');
                });
            });
        </script>
    @endpush
@endsection
