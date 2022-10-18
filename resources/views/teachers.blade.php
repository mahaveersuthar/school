@extends('layouts.slidebaar')
@section('title')
    {{ 'Teachers' }}
@endsection

@section('page-name')
    <h4>Teacher's Details</h4>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@endsection

@section('main-section')
    <div class="container mt-4">
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Teacher</button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Here you can add teacher</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="addTeacher" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="usr">Teacher Name:</label>
                                    <input type="text" class="form-control" name="name">
                                    <label for="st-address">subject</label>
                                    <input type="text" class="form-control" name="sub">
                                    <label for="mo_num">Contect No</label>
                                    <input type="number" class="form-control" name="contect">
                                    <select class="custom-select mt-3" style="width:150px;" name="possition">
                                        <option selected>Select position</option>
                                        <option>Lecturer</option>
                                        <option>2nd grade</option>
                                        <option>3rd grade</option>
                                        <option>4th grade</option>
                                    </select>
                                </div>
                            
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="sumbit" class="btn btn-primary " id="saveBtn">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
                <th scope="col">possition</th>
                <th scope="col">Contect No</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $teacher_list)
              <tr>
                <td >{{$teacher_list->id}}</td>
                <td >{{$teacher_list->name}}</td>
                <td >{{$teacher_list->sub}}</td>
                <td >{{$teacher_list->possition}}</td>
                <td >{{$teacher_list->contect}}</td>
                <td >
                    <a href="" class="btn btn-info btn-dm">Edit</a>
                    <a href="teacherDel/{{$teacher_list->id}}" class="btn btn-danger btn-dm">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>



@endsection
