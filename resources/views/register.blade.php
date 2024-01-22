
@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="file">Profile Picture:</label>
        <input type="file" name="file" accept="image/*" required>

        <button type="submit">Register</button>
    </form>
@endsection
