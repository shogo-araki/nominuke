@extends('layouts.app')

@section('content')
<form action="" method="post">
    @csrf
    name: <input type="text" name="sound"><br>
    data: <input type="file" name="path" accept="audio/mpeg"><br>
    <input type="submit" value="submit">
</form>
@endsection