
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Blog Template for Bootstrap</title>

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
            <a class="text-muted" href="#">Subscribe</a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">ajax</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
          </div>
        </div>
      </header>

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input id="name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter name">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">address</label>
                <input id="address" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter address">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">phone</label>
                <input id="phone" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter phone">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input id="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input id="password" type="password" class="form-control" placeholder="Password">
            </div>
            <button id="addButton" onclick="addData()" type="submit" class="btn btn-primary">Add</button>
            <button id="updateButton" type="submit" class="btn btn-primary">Update</button>
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
                url: "/laravelajax/public/all/user",
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
                        data = data + "<a href=''class='btn btn-primary'>edit</a>"
                        data = data + " <a href=''class='btn btn-info'>delete</a>"
                        data = data + "</td>"
                        data = data + "</tr>"
                    })
                    $('tbody').html(data);
                }
            })
        }
        readData();

        //create data
        function addData(){
            var name = $('#name').val();
            var address = $('#address').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var password = $('#password').val();
            console.log(name);

            $.ajax({
                type:"post",
                dataType:'json',
                data: {name:name,address:address,phone:phone,email:email,password:password},
                url:"/laravelajax/public/user/store",
                success:function(data){
                    readData();
                    console.log("data added successfully");
                }
            
            })
        }
      </script>

  </body>
</html>
