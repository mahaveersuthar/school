<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student list course wise</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <h1 class="text-center">Student list selected coures</h1>
    <hr>
    <div class="container">
<table class="table">
  <caption>List of selected coures list</caption>
  <thead>
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">Student Name</th>
      <th scope="col">Course Id</th>
    </tr>
  </thead>
  <tbody>
 @foreach($c_data as $data)

    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->st_name}}</td>
      <td>{{$data->coures_id}}</td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>    
</body>
</html>
