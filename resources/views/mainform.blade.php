<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>{{ $title }} </title>
</head>
<style>
    #take_programmer{
        margin-left: 45%;
    }
    #send_task{
        margin-left: 45%;
    }
    #update_task{
        margin-left: 45%;
    }
    #create_task{
        margin-left: 45%;
    }
</style>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Integration Module</a>
    </div>
    <div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="#take_programmers">Take Programmer</a></li>
                <li><a href="#send_tasks">Send Task</a></li>
                <li><a href="#update_tasks">Update</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://localhost/diplom_1.1/public/autorisation"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
            </ul>
        </div>
    </div>
</nav><br><br><br>
<form method="post" action="http://localhost/diplom_1.1/public/take_prog" id="take_programmers" class="container-fluid" >
    <div class="panel panel-primary">
        <div class="panel-heading">Take Programmer</div>
        <div class="panel-body">

        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" id="take_programmer" name="take_programmer" value="Take from Jira">
        </div>
    </div>
    {{csrf_field()}}
</form>

<form method="post" action="http://localhost/diplom_1.1/public/send_task" id="send_tasks" class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">Send Task</div>
        <div class="panel-body">
            <div class="row">
                @foreach($tasks as $task)
                <div class="col-md-3">
                    <label>Project:</label>
                    <div>
                        {{$task->project}}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Summary:</label>
                    <div>
                        {{$task->summary}}
                    </div>
                </div>
                <div class="col-md-3">
                    <label>Description:</label>
                    <div>
                        {{$task->description}}
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="name">Task:</label>
                    <select class="form-control" id="name" name="name">
                        <option>Task</option>
                        <option>Story</option>
                        <option>Bug</option>
                        <option>Epic</option>
                    </select>
                </div>
                    @endforeach
            </div>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" id="send_task" name="send_task" value="Send to Jira">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create Task</button>
        </div>
    </div>
    {{csrf_field()}}
</form>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <form method="post" action="http://localhost/diplom_1.1/public/create_task" id="create_tasks" >
                <div class="panel panel-primary">
                    <div class="panel-heading">Create Task</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="create_project">Project:</label>
                            <input class="form-control" type="text" placeholder="project" id="create_project" name="create_project">
                        </div>
                        <div class="form-group">
                            <label for="create_summary">Summary:</label>
                            <input class="form-control" type="text" placeholder="summary" id="create_summary" name="create_summary">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input class="form-control" type="text" placeholder="description" id="create_description" name="create_description">
                        </div>
                        <div class="form-group">
                            <label for="create_name">Task:</label>
                            <select class="form-control" id="create_name" name="create_name">
                                <option>Task</option>
                                <option>Story</option>
                                <option>Bug</option>
                                <option>Epic</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" id="create_task" name="create_task" value="Create Task">
                    </div>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </div>
</div>

<form method="post" action="http://localhost/diplom_1.1/public/update_task" id="update_tasks" class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">Update Task</div>
        <div class="panel-body">
            <div class="form-group">
                <label for="update_project">Project:</label>
                <input class="form-control" type="text" placeholder="project" id="update_project" name="update_project">
            </div>
            <div class="form-group">
                <label for="update_summary">Summary:</label>
                <input class="form-control" type="text" placeholder="summary" id="update_summary" name="update_summary">
            </div>
            <div class="form-group">
                <label for="update_description">Description:</label>
                <input class="form-control" type="text" placeholder="description" id="update_description" name="update_description">
            </div>
            <div class="form-group">
                <label for="update_name">Task:</label>
                <select class="form-control" id="update_name" name="update_name">
                    <option>Task</option>
                    <option>Story</option>
                    <option>Bug</option>
                    <option>Epic</option>
                </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" id="update_task" name="update_task" value="Send to Jira">
        </div>
    </div>
    </div>
    {{csrf_field()}}
</form>

</body>
</html>