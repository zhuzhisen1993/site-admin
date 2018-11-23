@extends('admin.app')
@section('other-css')
    <link rel="stylesheet" href="/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@endsection
@section('content-header')
    <h1>
        角色管理
        <small>角色</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{url('/admin/article/index')}}">角色管理</a></li>
        <li class="active">{{ $role->id?'修改':'新增' }}角色</li>
    </ol>
@stop

@section('content')
    <h2 class="page-header">{{ $role->id?'修改':'新增' }}角色</h2>
    <div class="box box-primary">
        @if($role->id)
        <form method="POST" action="{{ route('roles.update',['role'=>$role->id]) }}" accept-charset="utf-8">
            {{ method_field('PUT') }}
            @else
                <form method="POST" action="{{url('admin/roles')}}" accept-charset="utf-8">
                @endif
            {!! csrf_field() !!}
            <div class="nav-tabs-custom">
                <div class="tab-content">

                    <div class="tab-pane active">
                        <div class="form-group">
                            <label>角色名称
                                <small class="text-red">*</small>
                            </label>
                            <input required="required" type="text" class="form-control" name="title" autocomplete="off"
                                   placeholder="角色名称" value="{{$role->title}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $role->id?'修改':'新增' }}角色</button>

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

