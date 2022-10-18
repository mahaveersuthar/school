@extends('layouts.slidebaar')
@section('title'){{'course'}}@endsection
@section('page-name')
<h4>Coures</h4>
@endsection

@section('main-section')
<body>
    <div class="container text-center">
    <h1 class="text-center">Course Details</h1>
    <hr>
    <form >
        <label for="course_name">Course Name</label>
            <input type="text" id="course_name">
        <label for="course_fee">Course Fee</label>
            <input type="text" id="course_fee">
        <button id="ajaxSumbit" class="btn btn-primary" >Add Coures</button>
        <!-- <button class="btn btn-secondary btn-sm"  id="show" >show coures list</button> -->
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    </form>
</div>
<div class="container mt-xl-5">
<table class="table table-striped table-dark text-center">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Couers Name</th>
      <th scope="col">Couers Fee</th>
      <th scope="col" >Action</th>
    </tr>
  </thead>
  <tbody id="table-body">
  <td>
    <!-- <button href="34" value="1" id="del" class="btn btn-primary"> chake btn</button> -->
  </td>
  </tbody>
</table>
</div>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
<script>
    // const btn_id = document.getElementById("demo");
    // document.getElementById("ajaxSumbit").addEventListener("click", fetchCoures);
    
    jQuery(document).ready(function(){
            jQuery('#ajaxSumbit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                    //   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
              jQuery.ajax({
                url:"{{ url('course/post')}}",
                method:'post',
                data: {
                    "course_name": jQuery('#course_name').val(),
                    "course_fee": jQuery('#course_fee').val(),
                    "_token": "{{ csrf_token() }}",
                },
                success: function(result){
                    console.log(result.data);
                    jQuery('.alert').show();
                    jQuery('.alert').html(result.success);
                    $('#table-body').append('<tr>\
                    <td>'+result.data[0].id+'</td>\
                    <td>'+result.data[0].course_name+'</td>\
                    <td>'+result.data[0].course_fee+'</td>\
                    <td><button value="'+result.data[0].id+'" id="del_btn" class="btn btn-primary btn-sm ">Edit</button></td>\
                    <td><button value="'+result.data[0].id+'" id="edit_btn" class="btn btn-danger btn-sm mt-0">Delete</button></td>\
                    </tr');

                }
              });
            });
            });
            // use get method and show daa
            fetchCoures();
            function fetchCoures(){
                $.ajax({
                    url:"{{url('/fetchCoures')}}",
                    dataType:'json',
                    success: function (respo){
                      // console.log(respo);
                        $.each(respo.coures, function(key, item){
                          
                          // console.log(respo);
                            $('#table-body').append('<tr>\
                                                <td>'+item.id+'</td>\
                                                <td>'+item.course_name+'</td>\
                                                <td>'+item.course_fee+'</td>\
                                                <td><button href="" value="'+item.id+'" id="edit_btn" class="btn btn-primary btn-sm ">Edit</button></td>\
                                                <td><a href=' +" del_coures/"+item.id +' value="'+item.id+'" id="del_btn" class="btn btn-danger btn-sm mt-0">Delete</a></td>\
                                                </tr>');
                        });
                    }
                 
                });
            }
            // delete btn code
                    // $(document).on('click','#del_btn', function(e){
                    //   e.preventDefault();
                    //   // var del_btn =$(this).parent().parent();
                    //   var id =$(this).val();
                    //   urlp="{{'del_coures/'}}"+id,
                    //   $.ajax({
                    //     url:urlp,
                    //     method:"POST",
                    //     data:{
                    //       "_token": "{{ csrf_token() }}",
                    //       // "method":"POST",
                    //       "id":id
                    //     },
                    //     success: function(result){
                    //       console.log(result);  
                    //     }
                    //   })

                    // });
  
</script>
</body>
@endsection