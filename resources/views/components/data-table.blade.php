<!DOCTYPE html>
<html lang="en" class="antialiased">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataTables </title>
    <meta name="description" content="">
    <meta name="keywords" content="">
	<link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <!-- Replace with your tailwind.css once created -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Regular Datatables CSS -->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Responsive Extension Datatables CSS -->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <style>
        /* Overrides for Tailwind CSS */
        /* Form fields */
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: .5rem;
            padding-bottom: .5rem;
            line-height: 1.25;
            border-width: 2px;
            border-radius: .25rem;
            border-color: #edf2f7;
            background-color: #edf2f7;
        }

        /* Row Hover */
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
        }

        /* Pagination Buttons */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            border-radius: .25rem;
            border: 1px solid transparent;
        }

        /* Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        /* Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            font-weight: 700;
            border-radius: .25rem;
            background: #667eea !important;
            border: 1px solid transparent;
        }

        /* Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /* Change color of responsive icon */
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
        }
    </style>
</head>

<body class="leading-normal tracking-wider text-gray-900 bg-gray-100">
    <!-- Container -->
    <div class="container w-full mx-auto md:w-4/5 lg:w-full">

        <!-- Card -->
        <div id='recipients' class="p-8 mt-6 bg-white rounded shadow lg:mt-0">
            <table id="example" class="w-full stripe hover">
                <thead>
                    <tr>
                        <th data-priority="1">Name</th>
                        <th data-priority="2">Action</th>
                        <th data-priority="3">Office</th>
                        <th data-priority="4">Age</th>
                        <th data-priority="5">Start date</th>
                        <th data-priority="6">Salary</th>
                        <th data-priority="7">Position</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr>
                        <td>Tiger Nixon</td>
                        <td class="flex justify-center gap-0">
                            <span class="p-2 text-gray-200 scale-75 bg-orange-400 rounded-sm cursor-pointer material-symbols-outlined hover:bg-orange-500" onclick='alert("hi bro")'>edit</span>
                            <span class="p-2 text-gray-100 scale-75 bg-red-500 rounded-sm cursor-pointer material-symbols-outlined hover:bg-red-600">delete</span>
                        </td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>System Architect</td>
                    </tr>
                    <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                    <tr>
                        <td>Donna Snider</td>
                        <td class="flex justify-center gap-0">
                            <span class="p-2 text-gray-200 scale-75 bg-orange-400 rounded-sm cursor-pointer material-symbols-outlined hover:bg-orange-500" onclick='alert("hi bro")'>edit</span>
                            <span class="p-2 text-gray-100 scale-75 bg-red-500 rounded-sm cursor-pointer material-symbols-outlined hover:bg-red-600">delete</span>
                        </td>
                        <td>New York</td>
                        <td>27</td>
                        <td>2011/01/25</td>
                        <td>$112,000</td>
                        <td>Customer Support</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--/Card-->
    </div>
    <!--/container-->

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                responsive: true
            }).columns.adjust().responsive.recalc();
        });
    </script>
</body>

</html>
