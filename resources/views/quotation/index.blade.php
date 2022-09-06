@if(session()->has('message'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                @endif
<p>List of your quotations:</p>
<table style="border: 1px solid black;">
    <thead>
        <tr>
            <th>Job</th>
            <th>Customer Name</th>
            <th>Price</th>
        </tr>   
        @foreach ($jobs as $job)
        <tr>
            <td>{{ $job->name }}</td>
            <td>{{ $job->customer->name }}</td>
            <td>{{ $job->customer->quotation->price }}</td>
            <td></td>
        @endforeach  
        
        
            <tr>
                <td></td>
            </tr>    
        

    </thead>    
</table>        