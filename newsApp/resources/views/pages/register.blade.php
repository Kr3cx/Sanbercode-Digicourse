@extends('layouts.master')

@section('title')
    Halaman Register
@endsection


@section('content')
    <h1>Buat Account Baru!</h1>

    <h3>Sign Up Form</h3>
    <form action="{{ route('welcome') }}" method="POST">
        @csrf
        <label>First name:</label> <br><br>
        <input type="text" name="first_name" required> <br><br>

        <label>Last name:</label> <br><br>
        <input type="text" name="last_name" required> <br><br>

        <label>Gender:</label> <br><br>
        <input type="radio" name="gender" value="Male"> Male <br>
        <input type="radio" name="gender" value="Female"> Female <br>
        <input type="radio" name="gender" value="Other"> Other <br><br>

        <label>Nationality:</label> <br><br>
        <select name="nationality">
            <option value="Indonesian">Indonesian</option>
            <option value="American">American</option>
        </select> <br><br>

        <label>Language Spoken:</label> <br><br>
        <input type="checkbox" name="languagespoken[]" value="Bahasa Indonesia"> Bahasa Indonesia <br>
        <input type="checkbox" name="languagespoken[]" value="English"> English <br>
        <input type="checkbox" name="languagespoken[]" value="Other"> Other <br><br>

        <label>Bio:</label> <br><br>
        <textarea name="bio" cols="30" rows="10"></textarea> <br><br>

        <button type="submit">Sign Up</button>
    </form>
@endsection