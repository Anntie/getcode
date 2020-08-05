<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add url</title>
</head>
<body>
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
