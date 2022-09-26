<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/to-do-list.css') }}">
</head>
<body>
    <div class="container">
        <header><img src="{{ asset('images/logo.png') }}"></header>
            <div class='flex-grid'>
                <aside class="col sidebar">
                        <form method="post">
                            @csrf
                            <div class="form-group">
                                <input class= "form-control" type="text" id="task" name="task" placeholder="Insert task name">
                            </div>
                            <button class="btn btn-primary" type="submit">Add</button>
                        </form>
                </aside>
                <section class="col main">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                        </thead>
                        @if($tasks ?? '')
                            <tbody>
                                @foreach($tasks ?? '' as $task)
                                    <tr>
                                        <th scope="row">{{ $task->id }}</th>
                                        <td class="{{ $task->complete ? 'strikethrough': '' }}">
                                            {{$task->description}}
                                        </td>
                                        <td class="control-column">
                                            <form class="form-button" method="POST" action="/tasks/{{$task->id}}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success control  {{ $task->complete ? 'hidden': '' }}">&#10004;</button>
                                            </form>
                                            <form class="form-button" method="POST" action="/tasks/{{$task->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger control  {{ $task->complete ? 'hidden': '' }}">&#10006;</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <span>No tasks yet!</span>
                        @endif
                    </table>
                </section>
            </div>
        <footer>Copyright {{ date('Y') }}. All rights reserved.</footer>
    </div>
</body>
</html>
