@if ($errors->any())
<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<p>Job Name: {{ $latestJob->name }}</p>
<p>Date created: {{ $latestJob->created_at }}</p>
<form action="/quotation" method="POST">
    @csrf
<input placeholder="price" name="price">
<input type="hidden" name="job_id" value="{{ $latestJob->id }}">
<button type="submit">Save</button>
</form>
