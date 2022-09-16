<form method="POST" action="/notification">
@csrf 
<textarea name="message"></textarea>

<select name="technician_id">
    <option selected disabled>Select Technician</option>
    @foreach ($technicians as $technician)
    <option value="{{ $technician->id }}">{{ $technician->name }}</option>
    @endforeach    
</select>    
<button type="submit">Send</button>
</form>    