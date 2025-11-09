@extends('layouts.app')

@section('title', 'Home')
@section('body-class', 'left-sidebar is-preload')

@section('content')

<?php   

if(isset($request)){   
echo "<h1>Results</h1>"; 
echo "Név: ".$request->name."<br>"; 
echo "Email: ".$request->email."<br>"; 
echo "Város: ".$request->city."<br>"; 
echo "Kor: ".$request->age."<p>"; 
echo "Üzenet: ". $request->message . "<br>";
}
?> 


<div id="main-wrapper">

    <div class="wrapper style2">
        <div class="inner">
            <div class="container">
              <form method="post" action="form"> 
                @csrf         
                @if (count($errors) > 0) 
                <ul> 
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach 
                </ul> 
                @endif    
                <h1>Írjon nekünk!</h1>    

                @if ($errors->has('name'))<strong>{{ $errors->first('name') }}</strong><br>@endif 
                <label>Név:</label><input type="text" name="nev"><br> 
                @if ($errors->has('email'))<strong>{{ $errors->first('email') }}</strong><br>@endif    
                <label>E-mail:</label><input type="text" name="email"><br> 
                <label>Város:</label> 
                <select name="varos"> 
                    <option value="1">Budapest</option> 
                    <option value="2">Kecskemét</option> 
                    <option value="3">Pécs</option> 
                    <option value="4">Debrecen</option> 
                    <option value="5">Más</option> 
                </select><br> 
                @if ($errors->has('age'))<strong>{{ $errors->first('age') }}</strong><br>@endif 
                <label>Kor:</label><input type="number" name="kor"><br> 
                <label>Üzenet:</label><br>
                <textarea name="uzenet" rows="5" cols="30">{{ old('message') }}</textarea><br><br>
                <label></label><input type="submit" value="Send"> 
            </form> 

            </div>
        </div>
    </div>

</div>
@endsection