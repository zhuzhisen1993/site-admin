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
                <el-form status-icon ref="ruleForm" :rules="rules" label-width="100px" :model="ruleForm" class="demo-ruleForm" style="width: 1000px;margin: 0 auto;border: 1px solid #6c6c6c;padding: 60px; margin: 100px auto;border-radius: 5px;">
                    <el-form-item label="用户名"  prop="name">
                        <el-input type="text" v-model="ruleForm.name" autocomplete="off"></el-input>
                    </el-form-item>
                    <el-form-item label="邮箱" prop="email">
                        <el-input type="text" v-model="ruleForm.email" autocomplete="off"></el-input>
                    </el-form-item>
                    <el-form-item label="个人介绍" prop="userinfo">
                        <el-input  type="textarea" v-model.number="ruleForm.userinfo"></el-input>
                    </el-form-item>

                    <el-form-item label="用户头像" prop="">
                        <el-upload
                            class="avatar-uploader"
                            action="/admin/upload"
                            :headers="headers"
                            :show-file-list="false"
                            :on-success="handleAvatarSuccess"
                            :before-upload="beforeAvatarUpload">
                            <img v-if="imageUrl" :src="imageUrl" class="avatar">
                            <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                        </el-upload>
                    </el-form-item>

                    <el-form-item>
                        <el-button type="primary" @click="submitForm('ruleForm')">提交</el-button>
                        <el-button @click="resetForm('ruleForm')">重置</el-button>
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
                        ruleForm:{
                            name:'',
                            email:'',
                            userinfo:'',
                            
                        },
                        imageUrl: '',
                        dialogVisible: false,
                        rules: {
                            name: [
                                { required: true, message: '请输入姓名', trigger: 'blur' },
                                { min: 2, max: 10, message: '长度在 3 到 10 个字符', trigger: 'blur' }
                            ],
                            email: [
                            { required: true, message: '请输入邮箱地址', trigger: 'blur' },
                            { type: 'email', message: '请输入正确的邮箱地址', trigger: ['blur', 'change'] }
                            ]
                        }
                    };
                },
                methods: {
                    submitForm(formName) {
                            this.$refs[formName].validate((valid) => {
                            if (valid) {
                                console.log(this.ruleForm)
                                console.log(this.imageUrl)
                                alert('submit!');
                            } else {
                                console.log('error submit!!');
                                return false;
                            }
                            });
                        },
                        handleAvatarSuccess(res, file) {
                            this.imageUrl = URL.createObjectURL(file.raw);
                        },
                        beforeAvatarUpload(file) {
                            const isJPG = file.type === 'image/jpeg';
                            const isLt2M = file.size / 1024 / 1024 < 2;

                            // if (!isJPG) {
                            // this.$message.error('上传头像图片只能是 JPG 格式!');
                            // }
                            if (!isLt2M) {
                            this.$message.error('上传头像图片大小不能超过 2MB!');
                            }
                            //return isJPG && isLt2M;
                            return isLt2M;
                        },
                    resetForm(formName) {
                            this.$refs[formName].resetFields();
                    }
                }
            })

    </script>
    <style>
        .box{
            padding-bottom: 40px;
        }
        input[type=file]{
            display:none
        }
      .avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .avatar-uploader .el-upload:hover {
    border-color: #409EFF;
  }
  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 100px;
    height: 100px;
    line-height: 100px;
    text-align: center;
  }
  .avatar {
    width: 100px;
    height: 100px;
    display: block;
  }
    </style>
@stop

