<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>
    <body>

        <div class="container">
            <button class="btn">Log in / Register</button>
        </div>
        <div class="box">
            <form>
  First name:<br>
  <input type="text" name="firstname"><br>
</form>

      </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        </script>
        <script>
            $(function () {
                $('.btn').click(function (e) {
                 $('.box').addClass('appear');

                });
            });

        </script>
    </body>
</html>

