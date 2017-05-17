<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>{{ $title }} </title>
</head>
<style>

    #add{
        margin-left: 45%;
    }
    #add2{
        margin-left: 45%;
    }
    #send{
        margin-left: 45%;
    }

</style>
<body>
<div class="container">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <form action="http://localhost/diplom_1.1/public/autorisation" method="POST" id="programmers">
        <div class="panel panel-primary">
            <div class="panel-heading" align="center">Add Programmer</div>
            <div class="panel-body">
        <div class ="form-group">
            <label for="name">Name</label>
            <input class="form-control" placeholder="name" name="name" type="text" id="name">
        </div>
        <div class="form-group">
            <label for="second_name">Second Name</label><br>
            <input class="form-control" type="text" placeholder="second name" name="second_name"  id="second_name">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input class="form-control" placeholder="email" name="email" type="email" id="email">
        </div>
        <div class="form-group">
            <label for="specialization">Specialization</label>
            <input class="form-control" placeholder="specialization" name="specialization" type="text" id="specialization">
        </div>
        <div class="form-group">
            <label for="rank">Rank Programmer</label>
            <input class="form-control" placeholder="rank" name="rank" type="text" id="rank">
        </div>
        <div class="form-group">
            <input class="btn btn-primary " id="add" type="submit" value="Add">
        </div>
            </div>
        </div>
        {{csrf_field()}}

    </form>

    <form action="http://localhost/diplom_1.1/public/autorisation" method="POST" id="tasks">
        <div class="panel panel-primary">
            <div class="panel-heading" align="center">Add Task</div>
            <div class="panel-body">
        <div class="form-group">
            <label for="project">Project:</label>
            <input class="form-control" type="text" placeholder="project" name="project" id="project">
        </div>
        <div class="form-group">
            <label for="project_code">Summary:</label>
            <input class="form-control" type="text" placeholder="summary" name="summary" id="summary">
        </div>
        <div class="form-group">
            <label for="project_type">Description:</label>
            <input class="form-control" type="text" placeholder="description" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="issue_type">Issue Type:</label>
            <select class="form-control" id="issue_type" name="issue_type">
                <option>Task</option>
                <option>Story</option>
                <option>Bug</option>
                <option>Epic</option>
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" id="add2" name="add2" value="Add">
        </div>
            </div>
        </div>
        {{csrf_field()}}
    </form>


    <form method="POST" id="send_prog">
        <div class="panel panel-primary">
            <div class="panel-heading" align="center">Add Programmer</div>
            <div class="panel-body">
                <div class = "form-group">
                    <input class="btn btn-primary" onclick="window.location.href = 'autorisation'" id="send" type="button"  value="Send">
                </div>
            </div>
        </div>
        {{csrf_field()}}
    </form>
    </div>
        <div class="col-md-2"></div>
</div>
</body>
</html>