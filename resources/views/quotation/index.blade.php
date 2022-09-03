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
        @foreach ($jobQuotations as $jobQuotation)
        <tr>
            <td></td>
            <td>{{ $jobQuotation->name}}</td>
            <td> {{ $jobQuotation->price }} </td>
        <tr>   
        @endforeach      
    </thead>    
</table>        