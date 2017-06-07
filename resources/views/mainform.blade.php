<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Jira</title>
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
    #create_user{
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
        <a class="navbar-brand" href="#" style="font-style:italic" >IModule</a>
    </div>
    <div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="#take_programmers">Take Programmer</a></li>
                <li><a href="#send_tasks">Send Task</a></li>
                <li><a href="#update_tasks">Update Task</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right ">
                <li><a href="http://localhost/diplom_1.1/public/" style="margin-right: 8%"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
            </ul>
        </div>
    </div>
</nav><br><br><br>
<form method="post" action="http://localhost/diplom_1.1/public/take_prog" id="take_programmers" class="container-fluid" >
    <div class="panel panel-primary">
        <div class="panel-heading">Take Programmer</div>
        <div class="panel-body" >
            <div class="row" id="all_user">
                @if(isset($users))
                    @foreach($users as $user)
                    <div class="dimasTopCoder">
                        <div class="col-md-5 user">
                                <label>Name:</label>
                                <div class="displayName">{{$user->displayName}}</div>
                        </div>

                        <div class="col-md-6 user">
                            <label>Email:</label>
                                <div class="email">{{$user->email}}</div>
                        </div>

                         <div class="col-md-1">
                             <label for="select_programmer">Select:</label>
                             <div>
                                <input type="checkbox" class="form-control" name="select_programmer" id="select_programmer" >
                             </div>
                         </div>
                    </div>
                    @endforeach
                @endif
        </div>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" id="take_programmer" name="take_programmer" value="Add to DB">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_user">Create User</button>
        </div>
    </div>
    {{csrf_field()}}
</form>

<div class="modal fade" id="myModal_user" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <form method="post" action="http://localhost/diplom_1.1/public/create_user" id="create_tasks" >
                <div class="panel panel-primary">
                    <div class="panel-heading">Create User</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="user_name">User name:</label>
                                <input class="form-control" type="text" placeholder="name" id="user_name" name="user_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_password">Password:</label>
                            <input class="form-control" type="password" placeholder="password" id="user_password" name="user_password">
                        </div>
                        <div class="form-group">
                            <label for="user_emailAddress">E-mail:</label>
                            <input class="form-control" type="email" placeholder="E-mail" id="user_emailAddress" name="user_emailAddress">
                        </div>
                        <div class="form-group">
                            <label for="user_displayName">Full name:</label>
                            <input class="form-control" type="text" placeholder="full name" id="user_displayName" name="user_displayName">
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" id="create_user" name="create_user" value="Create User">
                    </div>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </div>
</div>

<form method="post" action="http://localhost/diplom_1.1/public/send_task" id="send_tasks" class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">Send Task</div>
        <div class="panel-body">
            <div class="row">
                @if(isset($tasks))
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
                <div class="col-md-2">
                    <label for="name">Task:</label>
                    <select class="form-control" id="name" name="name{{$task->id}}">
                        <option>Task</option>
                        <option>Story</option>
                        <option>Bug</option>
                        <option>Epic</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <label for="select_task">Select:</label>
                    <div>
                        <input class="form-control check_task" type="checkbox" name="select_task{{$task->id}}" id="select_task" value="{{$task->id}}" >
                    </div>
                </div>
                @endforeach
                @endif
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
                            <select class="form-control" id="create_project" name="create_project">
                                @if(isset($projects))
                                    @foreach($projects as $project)
                                <option>{{$project->key}}</option>
                                    @endforeach
                                @endif
                            </select>
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
                <input class="form-control" type="text" placeholder="task" id="update_project" name="update_project">
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
<script>

    $("#take_programmer").click (function (e) {
        e.preventDefault();
        var user =  $( "input:checked" );
        console.log(user);
        var checkUser = [];
        for (var i = 0 ; i < user.length;i++){
            var parent = $(user[i]).closest(".dimasTopCoder");
             obj = {
                name : $($(parent[0]).find(".displayName")).html(),
                email : $($(parent[0]).find(".email")).html()
            };
            checkUser.push(obj);
            //console.log(checkUser);
        }


        var data = {
            "_token": "{{ csrf_token() }}",
            "dev": checkUser
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "http://localhost/diplom_1.1/public/task/take_prog",
            data: data,
            dataType: 'json',                    // тип загружаемых данных
            success: function (data) { // вешаем свой обработчик на функцию success
                console.log(data);
            }
        });

    })
</script>

</body>
</html>