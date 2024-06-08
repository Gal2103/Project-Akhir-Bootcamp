@extends('layouts.master')

@section('title')
Buat Account Baru!

@endsection

@section('content')
<form action="/welcome" method="post">
  @csrf
<label for="fname">First name:</label><br>
<input type="text" id="fname" name="fname"><br> <br> <br>
<label for="lname">Last name:</label><br>
<input type="text" id="lname" name="lname"><br> <br>  
<label for="gender">Gender:</label><br>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Man</label><br>
<input type="radio" id="female" name="gender" value="female">
<label for="female">Women</label><br>
<input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label><br> <br> 
<label for="nationality">Nationality:</label><br>
<select id="nationality" name="nationality">
  <option value="Indonesian">Indonesian</option>
  <option value="Singapur">singapur</option>
  <option value="Malaysian">Malaysian</option>
  <option value="Australian">Australian</option>
</select><br> <br>
<label for="language">Language Spoken:</label><br>
<input type="checkbox" id="Bahasa_Indonesia" name="language" value="Bahasa_Indonesia">
<label for="checkbox">Bahasa Indonesia</label><br>
<input type="checkbox" id="English" name="language" value="English">
<label for="checkbox">English</label><br>
<input type="checkbox" id="arabic" name="language" value="arabic">
<label for="checkbox">Arabic</label><br>
<input type="checkbox" id="japanesse" name="language" value="japanesse">
<label for="checkbox">Japanesse</label><br>
</select><br>
<label for="bio">Bio:</label><br>
<textarea id="bio" name="bio"></textarea><br> <br>
<input type="submit"value="Sign Up">   
</form>
@endsection
    
