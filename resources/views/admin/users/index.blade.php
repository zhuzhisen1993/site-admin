@extends('admin.app')
@section('content-header')
    <h1>
        用户管理
        <small>用户</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>用户管理</li>
        <li class="active">用户</li>
    </ol>
@stop

@section('content')
    <div id="apps">
    <a href="{{url('admin/users/create')}}" class="btn btn-primary margin-bottom"><i class="fa fa-paint-brush" style="margin-right: 6px"></i>新增用户</a>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">用户列表</h3>
            <div class="box-tools">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm pull-right" name="s_title"
                               style="width: 150px;" placeholder="搜索用户标题">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered">
                <tbody>
                <!--tr-th start-->
                <thead>
                <tr>
                    <th>序号</th>
                    <th>用户名称</th>
                    <th>角色</th>
                    <th>创建时间</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <!--tr-th end-->

                <tbody>
                @foreach($users as $val)
                        <tr>
                            <td>{{$val->id}}</td>
                            <td class="text-muted">{{$val->name}}</td>
                            <td class="text-muted">
                                @foreach($val->roles as $role)
                                    {{$role->title}}
                                @endforeach
                            </td>
                            <td class="text-navy">{{$val->created_at}}</td>
                            <td class="text-navy">{{$val->updated_at}}</td>
                            <td>

                                <a class="btn btn-xs btn-warning" @click="openSavePasswordFrom({{$val->id}})">重置密码</a>
                                <a href="{{url('admin/users/'.$val->id.'/edit')}}" class="btn btn-xs btn-primary">编辑</a>
                                <a href="javascript:;" data-url="http://laracms.test/administrator/users/1" class="btn btn-xs btn-danger form-delete">删除</a>

                                {{--<a style="font-size: 16px" href="{{url('admin/users/'.$val->id.'/edit')}}"><i class="fa fa-fw fa-pencil" title="修改"></i></a>--}}
                                {{--<form style="display: inline-block;" action="{{url('admin/users/'.$val->id)}}" method="POST" id="del-user-{{$val->id}}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--{{ method_field('DELETE') }}--}}
                                    {{--<a style="font-size: 16px;color: #dd4b39;"><i class="fa fa-fw fa-trash-o" title="删除" onclick="document.getElementById('del-user-{{$val->id}}').submit();"></i></a>--}}
                                {{--</form>--}}

                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>


        <!-- Form -->
        <el-dialog title="修改密码" :visible.sync="dialogFormVisible"   width="30%">
            <el-form :model="form" ref="numberValidateForm">
                <el-input type="hidden" v-model="form.id" autocomplete="off"></el-input>
                <el-form-item label="密码" :label-width="formLabelWidth"  prop="password"
                              :rules="rules" >
                    <el-input type="password" v-model="form.password" autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item label="确认密码" :label-width="formLabelWidth" prop="password1"
                              :rules="rules">
                    <el-input type="password" v-model="form.password1" autocomplete="off"></el-input>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button @click="dialogFormVisible = false">取 消</el-button>
                <el-button type="primary" @click="savePassword('numberValidateForm')">确 定</el-button>
            </div>
        </el-dialog>
    </div>


    </div>


    <script>
        new Vue({
            el: '#apps',
            data() {
                return {
                    dialogTableVisible: false,
                    dialogFormVisible: false,
                    rules:[
                        {
                            required: true,
                            message: '密码不能为空！'
                        },{
                        min:6,
                            message:"长度不能小于6"
                        },{
                        max:12,
                            message:"长度不能大于12"
                        }

                    ],
                    form: {
                        id:'',
                        password: '',
                        password1: '',
                    },
                    formLabelWidth: '120px'
                };
            },
            methods:{
                openSavePasswordFrom:function(userId){
                    this.form.id = userId;
                    this.dialogFormVisible = true
                },
                savePassword:function(formName){
                        var that = this;
                        this.$refs[formName].validate((valid) => {
                            if (valid) {
                                if(this.form.password !== this.form.password1){
                                     this.$message.error('两次密码不一致，请从新输入！');
                                }
                                let data = this.from
                                axios.post("/admin/reset/password",{
                                    data:this.form
                                }).then(function (res) {
                                    if(res.data== 'success'){
                                        that.$message({
                                            message: '密码更新成功!',
                                            type: 'success'
                                        });
                                        that.dialogFormVisible = false
                                    }else{
                                        that.$message.error(res.data);
                                    }
                                })
                            } else {
                                console.log('error submit!!');
                                return false;
                            }
                        });

                }
            }
        })
    </script>


@stop



