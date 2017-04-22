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
</head>
<style>
    #autorisation{
        margin-top: 10%;
    }
    .form-group{
        margin-right: 35%;
        margin-left: 35%;
    }
    #registration_button{
        margin-left: 33%;
        margin-right: 35%;
    }
    .panel-primary {
        border-color: white;
    }
</style>
<body>
<form action="{{route('customer')}}" method="POST" id="registration">
    <div class="panel panel-primary">
        <div class="panel-heading" align="center">Registration</div>
        <div class="panel-body">
    <div class="form-group">
        <label for="name">First Name:</label>
        <input class="form-control" type="text" placeholder="first name" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="second_name">Second Name:</label>
        <input class="form-control" type="text" placeholder="second name" id="second_name" name="second_name">
    </div>
    <div class="form-group">
        <label for="email_registration">E-mail:</label>
        <input class="form-control" type="email" placeholder="e-mail" id="email_registration" name="email">
    </div>
    <div class="form-group">
        <label for="password_registration" >Password:</label>
        <input class="form-control" type="password" placeholder="password" id="password_registration" name="password">
    </div>
    <div class="form-group">
        <label for="remember_token" >Confirm Password:</label>
        <input class="form-control" type="password" placeholder="password" id="remember_token" name="remember_token">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" id="registration_button" name="registration_button" value="Sing up">
    </div>
    <div class="alert alert-success" id="alert" hidden>
        <h4 class="text-center" > Вы успешно прошли регистрацию</h4>
    </div>
    {{csrf_field()}}
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#registration').validate({
            rules:{
                name:{
                    required: true,
                    minlength: 2,
                    maxlength: 30
                },
                second_name:{
                    required:true,
                    minlength:2,
                    maxlength:30
                },
                email: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 12
                },
                remember_token: {
                    required: true,
                    minlength: 6,
                    maxlength: 12,
                    equalTo:'#password_registration'
                }
            }
        });
    });
    $(document).ready(function (){
        $('#registration_button').click(function () {
            if($('#name').val()!= '' && $('#second_name').val()!='' && $('#email_registration').val()!= '' && $('#password_registration').val()!= '' && $('#remember_token').val()!= '') {
                $('#alert').show()
            }
        });
    });
</script>
</body>
</html>