<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>{{ $title }} </title>
    <style>
        #autorisation{
            margin-top: 30%;
        }
        #button{
            margin-left: 35%;
        }
        .panel-default {
            border-color: white;
        }
    </style>
</head>
<body>
<div class="col-md-4"></div>
<div class="col-md-4">
<form method="POST" id="autorisation" >
    <div class="panel panel-default">
        <div class="panel-body"><h1 class="text-center" > {{isset($paget) ? $paget : 'Autorisation'}} </h1></div>
    <div class="form-group">
        <label for="autorisation_email">E-mail</label>
        <input type="email" placeholder="e-mail" id="autorisation_email" name="autorisation_email" class="form-control">
    </div>
    <div class="form-group">
        <label for="autorisation_password">Password</label>
        <input type="password" placeholder="password" id="autorisation_password" name="autorisation_password" class="form-control">
    </div>
    <div class="form-group" id="button">
        <a href="http://localhost/diplom_1.1/public/task"><input class="btn btn-primary" id="autorisation_button" type="button"  value="Log in"></a>
        <input class="btn btn-primary" id="registration_button" type="button"  value="Sing up" onclick="window.location.href = 'registration'">
    </div>
    </div>
</form>
</div>
<div class="col-md-4"></div>
<script>
    $(document).ready(function() {
        $('#autorisation').validate({
            rules: {
                autorisation_email: {
                    required: true
                },
                autorisation_password: {
                    required: true
                }
            }
        });
    });
</script>
</body>
</html>