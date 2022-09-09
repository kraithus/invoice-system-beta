<!DOCTYPE html>
<html lang="en">
<head>    
<title>{{ $title }}</title>
    @extends('layouts.css-scripts')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <script>
    $(document).ready( function () {
        $('#customerTable').DataTable();
    } ); 
    </script>   
    
    <table id="customerTable" class="display table">
        <thead>
            <tr>
                <th>Job</th>
                <th>Customer Name</th>
                <th>Price</th>
                <th>Email Quotation</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($jobs as $job)
        <tr>
            <td>{{ $job->name }}</td>
            <td>{{ $job->customer->name }}</td>
            <td>{{ $job->customer->quotation->price }}</td>
        </tr>    
        @endforeach     
        </tbody>
    </table>    
</body>    

