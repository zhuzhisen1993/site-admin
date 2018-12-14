@extends('admin.app')
@section('content-header')

    <style>
    .el-dialog {
        position: relative;
        margin: 0 auto 50px;
        border-radius: 2px;
        -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.3);
        box-shadow: 0 1px 3px rgba(0,0,0,.3);
        box-sizing: border-box;
        width: 29%;
    }
</style>

    <h1>
         产品类型管理
        <small>产品类型</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>产品类型管理</li>
        <li class="active">产品</li>
    </ol>

@stop
@section('content')
<div id="apps">
<a @click="AddRoleFrom()" class="btn btn-primary margin-bottom"><i class="fa fa-paint-brush" style="margin-right: 6px"></i>新增类型</a>
                     <el-dialog  :title="title" :visible.sync="roleFrom">
                                        <el-form :model="form" :rules="rules" ref="roleForm">
                                            <el-form-item label="类型名称" :label-width="formLabelWidth" prop="Actionsku">
                                                <el-input v-model="form.title"  autocomplete="off" placeholder="请输类型名称"></el-input>
                                            </el-form-item>
                                            <el-form-item label="类型" :label-width="formLabelWidth" prop="Actionnames">
                                                <el-select v-model="form.value" placeholder="请选择">
                                                    <el-option
                                                    v-for="item in options2"
                                                    :key="item.value"
                                                    :label="item.label"
                                                    :value="item.value"
                                                    :disabled="item.disabled">
                                                    </el-option>
                                                </el-select>
                                            </el-form-item>
                                        </el-form>
                                        <div slot="footer" class="dialog-footer">
                                            <el-button @click="roleFrom = false">取 消</el-button>
                                            <el-button type="primary"  v-loading.fullscreen.lock="fullscreenLoading" @click="SubmitFrom('roleForm')">确 定</el-button>
                                    </div>
                        </el-dialog>
</div>
<script>
        new Vue({
            delimiters: ['@{{', '}}'],
            el: '#apps',
            data() {
                return {
                    fullscreenLoading: false,
                    rules: {
                        title:[
                            { required: true, message: '类型不能为空！', trigger: 'blur' },
                        ]
                    },
                    formLabelWidth:'120px',
                    roleFrom:false,
                    checkPermission:false,
                    title:"",
                    checkPermission:[],
                    form:{
                        title:"",
                        value:""
                    },
                    options2: [{
                    value: '选项1',
                    label: '黄金糕'
                    }, {
                    value: '选项2',
                    label: '双皮奶',
                    disabled: true
                    }, {
                    value: '选项3',
                    label: '蚵仔煎'
                    }, {
                    value: '选项4',
                    label: '龙须面'
                    }, {
                    value: '选项5',
                    label: '北京烤鸭'
                    }],
                }
            },
            methods:{
                AddRoleFrom(){
                    this.title = '添加类型'
                    this.checkPermission =[]
                    this.resetFrom();
                    this.roleFrom = true
                },
                //重置表单
                resetFrom:function () {
                    this.form.title = ''
                },
                  //提交表单
                  SubmitFrom(){
                    let that = this
                    if(this.checkPermission.length<=0){
                        that.$message({
                            message: '权限不能为空',
                            type: 'warning'
                        });
                        return false;
                    }
                  
                },
            },
            mounted(){
            }
        })
    </script>
@stop



