<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<form action="/name"method="post">
    
    {{ csrf_field() }}
    <h3>Search By </h3>
<div class="form-group">
    <span class="form-control">Name</span>
    <input type="text" name="name"><br>

    <span class="form-control"> OR  City</span>
    <input type="text" name="city"><br>

    <span class="form-control">OR  price Range </span>
    <input type="number" name="first" >
    <span>And</span>
    <input type="number" name="second"><br>

    <span class="form-control">OR  Availability Range </span>
    <input type="date" name="f" >
    <span>And</span>
    <input type="date" name="s"><br>
    <input type="submit">
</div>
</form>