<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add url</title>
</head>
<body>
@include('menu')

@if(session()->get('success', 'false') === 'true')
    <div style="color: green;">Added to the queue</div>
@endif

<form action="{{ route('parser.add') }}" method="post">
    @csrf
    @error('url')
        <div style="color: orangered;">{{ $message }}</div>
    @enderror
    <label>
        Url:
        <input type="text" name="url">
    </label>
    <button type="submit">Add</button>
</form>
</body>
</html>
