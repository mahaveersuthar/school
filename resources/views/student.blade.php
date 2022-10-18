@extends('layouts.slidebaar')
@section('title') {{'Student'}} @endsection

@section('page-name')

<h4>Student</h4>
@endsection

@section('main-section')



{{-- <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
    <title>Student</title>
  </head>
  <body> --}}
    {{--
    <!-- <h1 class="text-center">Student Page</h1>
    <hr>



<div class="container">
  <form action="insert" method="post">
    @csrf


    <div class="form-group">
    <label for="formGroupExampleInput">Student Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Student Name"name="st_name">
  </div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Address" name="st_address">
  </div>
  <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="e_mail">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="mo_num">Mobile Number</label>
      <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Enter Mobile Number" name="mo_num">
    </div>
    <div class="form-group">
    <select class="custom-select" 
            style="width:150px;" name="coures_id">
            
            @foreach($course_list as $item)
            <option value="{{$item->id}}" placeholder="Select Course">{{$item->course_name}}</option>
            @endforeach
        
       
    </select>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>  
  
</form> -->


<!-- <table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Student Name</th>
      <th scope="col">Address</th>
      <th scope="col">E-Mail</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($student_list as $dataobj)
    <tr>
      <td>{{$dataobj->id}}</td>
      <td>{{$dataobj->st_name}}</td>
      <td>{{$dataobj->st_address}}</td>
      <td>{{$dataobj->e_mail}}</td>
      <td>{{$dataobj->mo_num}}</td>
      <td>{{$dataobj->course_id}}</td>
      <td>
        <a href="edit/{{$dataobj->id}}" class="btn btn-secondary">Edit</a>
        <a href="destroy/{{$dataobj->id}}" class="btn btn-danger">Delate</a>
      </td> 
    </tr>
    @endforeach
  </tbody>
</table> 
</div>-->
--}}
<!-- use model -->
<div class="container ">
  {{-- <div class="header text-right ">
  <h1 class="text-center mt-3" >Welcome {{ Session::get('name') }} </h1>
  <a href="{{URL::Route('logout')}}" class="btn btn-info ">Logout</a>
</div> --}}
  <!-- Trigger the modal with a button -->
  
  <button type="button" class="btn btn-info btn-lg mt-4 pull-right" data-toggle="modal" data-target="#myModal">Add Student</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Here you can add student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="container">
          <form>
            <div class="form-group">
              <label for="usr">Student Name:</label>
                <input type="text" class="form-control" id="st_name">
              <label for="st-address">Address</label>
              <input type="text" class="form-control" id="address">
              <label for="mo_num">Mobile no</label>
              <input type="number" class="form-control" id="mo_num">
              <label for="e-mail">E-Mail</label>
              <input type="e-mail" class="form-control" id="email">

              <select class="custom-select mt-3" style="width:150px;" id="coures_id">
              <option selected>Select Coures</option>
            @foreach($course_list as $item)
            <option value="{{$item->id}}" placeholder="Select Course">{{$item->course_name}}</option>
            @endforeach
            </select>
            </div>
          </form>
          <div id="alertmsg"></div>
    </div>
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary " id="saveBtn">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mt-4">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">Student Name</th>
      <th scope="col">Address</th>
      <th scope="col">E-Mail</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Coures ID</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody id="tblbody">
    

  </tbody>
</table>
</div>

@endsection



    <script>
      
jQuery(document).ready(function(){
  jQuery('#saveBtn').click(function(e){
    console.log('i am clicked');
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    jQuery.ajax({
      url:"{{url('/insert')}}",
      method:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        "st_name":jQuery('#st_name').val(),
        "st_address":jQuery('#address').val(),
        "e_mail":jQuery('#email').val(),
        "mo_num":jQuery('#mo_num').val(),
        "coures_id":jQuery('#coures_id').val()
      },
      success: function(result){
        addAlert(result.success);
      }
    });
  });
  function addAlert(message) {
    $('#alertmsg').append(
        '<div class="alert alert-success">' +
            '<button type="button" class="close" data-dismiss="alert">' +
            '&times;</button>' + message + '</div>');
      }
});
      fetchSt();
      function fetchSt(){
        // alert('i am fetch calling')
        $.ajax({
          url:"{{url('student_show')}}",
          dataType:"json",
          success:function(res){
            // console.log(res);
            $.each(res.st_list, function(key,student_list){
              $('#tblbody').append('<tr>\
                                        <td>'+student_list.id+'</td>\
                                        <td>'+student_list.st_name+'</td>\
                                        <td>'+student_list.st_address+'</td>\
                                        <td>'+student_list.e_mail+'</td>\
                                        <td>'+student_list.mo_num+'</td>\
                                        <td>'+student_list.coures_id+'</td>\
                                        <td>\
                                          <a href="" value="'+student_list.id+'" class="btn btn-info btn-sm">Edit</a>\
                                          <a href='+"destroy/"+student_list.id+' value="'+student_list.id+'" class="btn btn-danger btn-sm">Delete</a>\
                                        </td>\
                                    </tr>');
                                    // console.log(student_list.st_name);
            })
          }
        })
      }

    </script>
  {{-- </body>
</html> --}}