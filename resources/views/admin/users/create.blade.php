@extends('admin.app')
@section('other-css')
    <link rel="stylesheet" href="/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@endsection
@section('content-header')
    <h1>
        用户管理
        <small>用户</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{url('/admin/article/index')}}">用户管理</a></li>
        <li class="active">{{ $user->id?'修改':'新增' }}用户</li>
    </ol>
@stop

@section('content')
    <h2 class="page-header">{{ $user->id?'修改':'新增' }}用户</h2>
    <div class="box box-primary">
        @if($user->id)
        <form method="POST" action="{{ route('users.update',['user'=>$user->id]) }}" accept-charset="utf-8">
            {{ method_field('PUT') }}
            @else
                <form method="POST" action="{{url('admin/users')}}" accept-charset="utf-8">
                @endif
            {!! csrf_field() !!}
            <div class="nav-tabs-custom">
                <div class="tab-content">


                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="tab-pane active">
                        @if(!$user->id)
                            <div class="form-group">
                                <label>用户名称
                                    <small class="text-red">*</small>
                                </label>
                                <input required="required" type="text" class="form-control" name="username" autocomplete="off"
                                       placeholder="用户名称" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label>密码
                                    <small class="text-red">*</small>
                                </label>
                                <input required="required" type="password" class="form-control" name="password" autocomplete="off"
                                       placeholder="密码">
                            </div>
                            <div class="form-group">
                                <label>确认密码
                                    <small class="text-red">*</small>
                                </label>
                                <input required="required" type="password" class="form-control" name="confirm_password" autocomplete="off"
                                       placeholder="确认密码">
                            </div>
                        @endif


                        <div class="form-group">
                            <div>
                                <label>请选择用户角色
                                    <small class="text-red">*</small>
                                </label>
                            </div>
                            <div clss="roles" style="margin-top:20px;">
                                @foreach($roles as $val)
                                    <label style="margin-right:10px;">
                                        <input type="checkbox" name="roles[]" value="{{$val->id}}"
                                        @if(in_array($val->id,$roleId))
                                            checked="checked"
                                                @endif >
                                        {{$val->title}}
                                    </label>

                                @endforeach
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">{{ $user->id?'修改':'新增' }}用户</button>

                </div>
            </div>
        </form>
    </div>
@stop

@section('other-js')
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script src="/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            $(".textarea").wysihtml5();
        });
    </script>
@endsection

