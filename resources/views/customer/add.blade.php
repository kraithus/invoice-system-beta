<p>Add Customer</p>
<form action="/customer" method="POST">
    @csrf
<p>Name</p>    
<input placeholder="Name" name="name">
<p>Email</p>
<input placeholder="Email" name="email">
<button type="submit">Save</button>
</form>
