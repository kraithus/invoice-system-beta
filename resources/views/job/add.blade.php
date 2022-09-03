<p>New Job</p>
<form action="/job" method="POST">
    @csrf
<p>Job Name</p>    
<input placeholder="Job Name" name="name">
<p>For Customer</p>
<select name="customer_id">
    @foreach ($customers as $customer)
        <option value="{{ $customer->id}}">{{ $customer->name }}</option>
    @endforeach
</select>    
<button type="submit">Save</button>
</form>
