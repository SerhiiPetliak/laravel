@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Список пользователей</div>

                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Имя</td>
                                    <td>Эл. почта</td>
                                    <td>Дата регистрации</td>
                                    <td>Действия</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{date("d.m.Y", strtotime($user->created_at)) }}</td>
                                        <td>
                                            <form action="users/{{$user->id}}" method="post">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="submit" name="name" value="Удалить">
                                            </form>
                                            <a href="{{route('user.ban',['user'=>$user->id])}}" title="Заблокировать"><span class="glyphicon glyphicon-ban-circle"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@stop