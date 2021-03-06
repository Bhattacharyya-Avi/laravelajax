
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>AJAX</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.0/examples/blog/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">ajax</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
            </a>
          </div>
        </div>
      </header>

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input id="name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter name">
                <span style="color: white ;" id="nameError" class="form-text text-muted"> </span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">address</label>
                <input id="address" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter address">
                <span style="color: white ;" id="addressError" class="form-text text-muted"> </span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">phone</label>
                <input id="phone" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter phone">
                <span style="color: white ;" id="phoneError" class="form-text text-muted"> </span>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input id="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                <span style="color: white ;" id="emailError" class="form-text text-muted"> </span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input id="password" type="password" class="form-control" placeholder="Password">
                <span style="color: white ;" id="passwordError" class="form-text text-muted"> </span>

            </div>
            <input type="hidden" id="id">
            <button type="submit" id="addButton" onclick="addData()" class="btn btn-primary">Add</button>
            <button type="submit" id="updateButton" onclick="updateData()" class="btn btn-primary">Update</button>
        </form>
        </div>
      </div>

      
    </div>

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-12 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            Data from DB
          </h3>

          <div class="blog-post">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">address</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>uttara,bd</td>
                        <td>test@gmail.com</td>
                        <td>
                            <a href=""class="btn btn-primary">edit</a>
                            <a href=""class="btn btn-info">delete</a>
                        </td>
                    </tr> -->
                    
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </main><!-- /.container -->
    <!-- Bootstrap core JavaScript-->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>

      <!-- ajax -->
      <script>
        // for show or hide perticuller section
        $('#addButton').show();
        $('#updateButton').hide();

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        // read data
        function readData() {
            $.ajax({
                type:"GET",
                dataType:'json',
                url: "/all/user",
                success:function(user) {
                    var data = ""
                    $.each(user, function(key,value) {
                        console.log(value)
                        data = data + "<tr>"
                        data = data + "<td>"+key+"</td>"
                        data = data + "<td>"+value.name+"</td>"
                        data = data + "<td>"+value.address+"</td>"
                        data = data + "<td>"+value.email+"</td>"
                        data = data + "<td>"+value.phone+"</td>"
                        data = data + "<td>"
                        data = data + "<button class='btn btn-primary' onclick='editData("+value.id+")'>edit</button>"
                        data = data + "<button class='btn btn-info' onclick='deleteData("+value.id+")'>delete</button>"
                        data = data + "</td>"
                        data = data + "</tr>"
                    })
                    $('tbody').html(data);
                }
            })
        }
        readData();

        //clear data
        function clearData(){
          $('#name').val(' ');
          $('#address').val(' ');
          $('#phone').val(' ');
          $('#email').val(' ');
          $('#password').val(' ');
        }

        //create data
        function addData(){
          var name = $('#name').val();
          var address = $('#address').val();
          var phone = $('#phone').val();
          var email = $('#email').val();
          var password = $('#password').val();
        
          $.ajax({
            type: "post",
            dataType:'json',
            data: {name:name,address:address,phone:phone,email:email,password:password},
            url:"/user/store",
            success:function(data){
                clearData();
                readData();
                console.log("data added successfully");
            },
            error:function(error){
              $('#nameError').text(error.responseJSON.errors.name);
              $('#addressError').text(error.responseJSON.errors.address);
              $('#phoneError').text(error.responseJSON.errors.phone);
              $('#emailError').text(error.responseJSON.errors.email);
              $('#passwordError').text(error.responseJSON.errors.password);
            }
          })
        }

        //edit data
        function editData(id){
          $.ajax({
            type: "GET",
            dataType: "json",
            url: "/user/edit/"+id,
            success:function(data){
              // show update button
              $('#addButton').hide();
              $('#updateButton').show();

              $('#id').val(data.id);
              $('#name').val(data.name);
              $('#address').val(data.address);
              $('#phone').val(data.phone);
              $('#email').val(data.email);
              $('#password').val(data.password);
            }
          })
        }

        // update data
        function updateData(){
          var id = $('#id').val();
          var name = $('#name').val();
          var address = $('#address').val();
          var phone = $('#phone').val();
          var email = $('#email').val();
          var password = $('#password').val();

          $.ajax({
            type: "post",
            dataType:"json",
            data: {name:name,address:address,phone:phone,email:email,password:password},
            url: "/user/store/"+id,

            success:function(data){
              readData();
              console.log("data updated");
            },
            error:function(error){
              $('#nameError').text(error.responseJSON.errors.name);
              $('#addressError').text(error.responseJSON.errors.address);
              $('#phoneError').text(error.responseJSON.errors.phone);
              $('#emailError').text(error.responseJSON.errors.email);
              $('#passwordError').text(error.responseJSON.errors.password);
            }
          })
        }

        // delete data
        function deleteData(id) {
          $.ajax({
            type: "GET",
            dataType: "json",
            url:"/user/delete/"+id,
            success:function(data){
              readData();
              console.log("data deleted");
            }
          })
        }
      </script>

  </body>
</html>
