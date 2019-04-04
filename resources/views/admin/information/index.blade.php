@extends('admin.app')
@section('content-header')
    @include('UEditor::head')
    <!-- <script type="text/javascript" charset="utf-8" src="{{url('dist/js/neditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src=" {{url('dist/js/neditor.all.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{url('dist/js/neditor.service.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{url('dist/js/i18n/zh-cn/zh-cn.js')}}"></script>
    <script type="text/javascript" src="{{url('dist/js/third-party/browser-md5-file.min.js')}}"></script>
    <script type="text/javascript" src="{{url('dist/js/third-party/jquery-1.10.2.min.js')}}"></script> -->
    <h1>
        基本信息管理
        <small>内容</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>基本信息管理</li>
        <li class="active">内容</li>
    </ol>
@stop

@section('content')

    <div id="apps">
        <div class="box box-infomation">
            <el-form ref="form" :model="form" label-width="80px">
                <el-form-item label="商店名称">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
                <el-form-item label="商店电话">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
                <el-form-item label="商店邮箱">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
                <el-form-item label="商店地址">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>

                <el-form-item label="商店Logo">
                    <el-upload
                            class="avatar-uploader"
                            action="/admin/upload"
                            :headers="headers"
                            :show-file-list="false"
                            :on-success="handleAvatarSuccess"
                            :before-upload="beforeAvatarUpload">
                        <img v-if="form.name" :src="form.name" class="avatar">
                        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                    </el-upload>
                </el-form-item>

                <el-form-item label="脚本代码">
                    <el-input type="textarea" v-model="form.desc"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">确认修改</el-button>
                    <el-button>取消</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>


    <script>

        new Vue({
            el: '#apps',
            data() {
                return {
                    headers: {
                        'X-CSRF-TOKEN': document.getElementsByTagName('meta')['csrf-token'].getAttribute("content")
                    },
                    ArticlesFormVisible: false,
                    form: {
                        name: '',
                        region: '',
                        date1: '',
                        date2: '',
                        delivery: false,
                        type: [],
                        resource: '',
                        desc: ''
                    },
                }
            },
            methods: {
                onSubmit() {
                    console.log('submit!');
                },
                //处理图片方法
                handleAvatarSuccess(res, file, fileList) {
                    this.data.img_url = res.path.replace('http://localhost',"")
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
            }
        })
    </script>


    <style>
        .box-infomation{
            padding:40px 25%;
        }
    </style>
@stop

