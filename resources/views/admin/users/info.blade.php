@extends('admin.app')
@section('other-css')
    <link rel="stylesheet" href="/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@endsection
@section('content-header')
    <h1>
        个人资料管理
        <small>用户资料</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li><a href="{{url('/admin/article/index')}}">编辑个人资料</a></li>
        <li class="active">编辑个人资料</li>
    </ol>
@stop

@section('content')
    <div id="apps">
            <h2 class="page-header">编辑个人资料</h2>
            <div class="box box-primary">
                <el-form status-icon ref="ruleForm2" label-width="100px" class="demo-ruleForm" style="width: 1000px;margin: 0 auto;border: 1px solid #6c6c6c;padding: 60px; margin: 100px auto;border-radius: 5px;">
                    <el-form-item label="用户名" prop="pass">
                        <el-input type="password" v-model="ruleForm2.pass" autocomplete="off"></el-input>
                    </el-form-item>
                    <el-form-item label="邮箱" prop="checkPass">
                        <el-input type="password" v-model="ruleForm2.checkPass" autocomplete="off"></el-input>
                    </el-form-item>
                    <el-form-item label="个人介绍" prop="age">
                        <el-input v-model.number="ruleForm2.age"></el-input>
                    </el-form-item>

                    <el-form-item label="用户头像" prop="avatar">
                        <el-upload
                                action="/admin/upload"
                                :headers="headers"
                                list-type="picture-card"
                                :on-preview="handlePictureCardPreview"
                                :on-remove="handleRemove">
                            <i class="el-icon-plus"></i>
                        </el-upload>
                        <el-dialog :visible.sync="dialogVisible">
                            <img width="100%" :src="dialogImageUrl" alt="">
                        </el-dialog>
                    </el-form-item>

                    <el-form-item>
                        <el-button type="primary" @click="submitForm('ruleForm2')">提交</el-button>
                        <el-button @click="resetForm('ruleForm2')">重置</el-button>
                    </el-form-item>
                </el-form>
            </div>
    </div>
    <script> new Vue({

            el: '#apps',
            delimiters: ['@{{', '}}'],
                data() {
                    return {
                        headers:{
                            'X-CSRF-TOKEN': document.getElementsByTagName('meta')['csrf-token'].getAttribute("content")
                        },
                        ruleForm2:{
                            pass:'',
                            checkPass:'',
                            age:''
                        },
                        dialogImageUrl: '',
                        dialogVisible: false,
                    };
                },
                methods: {
                    handleRemove(file, fileList) {
                        console.log(file, fileList);
                    },
                    handlePictureCardPreview(file) {
                        this.dialogImageUrl = file.url;
                        this.dialogVisible = true;
                    }
                }
            })

    </script>
@stop

