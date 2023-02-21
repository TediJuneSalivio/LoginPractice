<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <h1>Login Page</h1>
    <div class="card">

      <div class="card-header">Login</div>

      <div class="card-body">

        <div id="error-msg" class="alert alert-danger" role="alert"></div>

        <form id="login-form" action="/login.php" method="post" name="login-form">
          <div class="mb-3">
            <label for="email">Email address</label>
            <input id="email" class="form-control" name="email" type="email" placeholder="Enter email">
          </div>
          <div class="mb-3">
            <label for="password">Password</label>
            <input id="password" class="form-control" name="password" type="password" placeholder="Password">
          </div>
          <button id="login" class="btn btn-primary" type="submit">Login</button>
        </form>

      </div>
    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script>
    $(function() {
      $("#error-msg").hide();
      $('#login').click(function(e) {

        let self = $(this);

        e.preventDefault(); // prevent default submit behavior

        self.prop('disabled', true);

        var data = $('#login-form').serialize(); // get form data

        // sending ajax request to login.php file, it will process login request and give response.
        $.ajax({
          url: 'login.php',
          type: "POST",
          data: data,
        }).done(function(res) {
          res = JSON.parse(res);
          if (res['status']) // if login successful redirect user to secure.php page.
          {
            location.href = "secure.php"; // redirect user to secure.php location/page.
          } else {

            var errorMessage = '';
            // if there is any errors convert array of errors into html string, 
            //here we are wrapping errors into a paragraph tag.
            console.log(res.msg);
            $.each(res['msg'], function(index, message) {
              errorMessage += '<div>' + message + '</div>';
            });
            // place the errors inside the div#error-msg.
            $("#error-msg").html(errorMessage);
            $("#error-msg").show(); // show it on the browser, default state, hide
            // remove disable attribute to the login button, 
            //to prevent multiple form submissions 
            //we have added this attribution on login from submit
            self.prop('disabled', false);
          }
        }).fail(function() {
          alert("error");
          console.log("Error ka po e")
        }).always(function() {
          self.prop('disabled', false);
        });
      });
    });
  </script>
</body>

</html>