<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <h1>Edit Page</h1>
    <hr>
    <div class="container">
  <form action="/update" method="post">
    @csrf
    <div class="form-group">
    <label for="formGroupExampleInput">{{$student['id']}}</label>
    <input type="hidden" name="id" value="{{$student['id']}}">
    <div class="form-group">
    <label for="formGroupExampleInput">Student Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" value="{{$student['st_name']}}"name="st_name">
  </div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="formGroupExampleInput" value="{{$student['st_address']}}" name="st_address">
  </div>
  <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$student['e_mail']}}" name="e_mail">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="mo_num">Mobile Number</label>
      <input type="number" class="form-control" id="exampleInputPassword1" value="{{$student['mo_num']}}" name="mo_num">
    </div>
  <button type="submit" class="btn btn-primary">Update</button>
  
</form>
</body>
</html>