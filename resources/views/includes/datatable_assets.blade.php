@push('after-styles-end')
    {{-- <link rel="stylesheet" href="{{ asset('ims/plugins/datatables/css/dataTables.bootstrap4.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('ims/plugins/datatables/css/dataTables.jqueryui.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('ims/plugins/datatables/css/buttons/buttons.dataTables.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('ims/plugins/datatables/css/buttons/buttons.jqueryui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ims/plugins/datatables/css/custom.css') }}">
    <style>

    </style>
@endpush

@push('after-script-end')
    <script src="{{ asset('ims/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset('ims/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script> --}}
    <script src="{{ asset('ims/plugins/datatables/js/dataTables.jqueryui.min.js') }}"></script>
    <script src="{{ asset('ims/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('ims/plugins/datatables/js/buttons/buttons.jqueryui.min.js') }}"></script>
    <script src="{{ asset('global/plugins/jquery-ui/js/jquery.ui-contextmenu.min.js') }}"></script>
    <script src="{{ asset('ims/plugins/datatables/js/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('ims/plugins/datatables/js/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('ims/plugins/datatables/js/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/buttons.server-side.js') }}"></script>
@endpush
