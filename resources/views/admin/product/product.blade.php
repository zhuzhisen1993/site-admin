@extends('admin.app')
@section('content-header')
    <script type="text/javascript" charset="utf-8" src="{{url('dist/js/neditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src=" {{url('dist/js/neditor.all.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{url('dist/js/neditor.service.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{url('dist/js/i18n/zh-cn/zh-cn.js')}}"></script>
    <script type="text/javascript" src="{{url('dist/js/third-party/browser-md5-file.min.js')}}"></script>
    <script type="text/javascript" src="{{url('dist/js/third-party/jquery-1.10.2.min.js')}}"></script>
    <h1>
        产品内容管理
        <small>产品内容</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>内容管理</li>
        <li class="active">内容</li>
    </ol>
@stop
  

@section('content')
<div id="apps">
<a @click="AddRoleFrom()" class="btn btn-primary margin-bottom"><i class="fa fa-paint-brush" style="margin-right: 6px"></i>新增产品</a> 
        <el-dialog  custom-class="loadings"  :title="title" :visible.sync="roleFrom">
                        <el-form  ref="roleForm" :model="form" :rules="rules" ref="roleForm">
                            <el-form-item label="名称"  prop="name">
                            <el-input  v-model="form.name"  placeholder="请输入名称"></el-input>
                            </el-form-item>
                            <el-form-item label="型号"  prop="model">
                            <el-input  v-model="form.model"  placeholder="请输入型号"></el-input>
                            </el-form-item>
                            <el-form-item label="SKU"  prop="sku">
                            <el-input  v-model="form.sku"  placeholder="请输入SKU"></el-input>
                            </el-form-item>
                            <div>
                            <div style="text-align: left;font-size: 14px; color: #606266; line-height: 40px;font-weight: 900;padding: 0 12px 0 0;">上传photo</div>
                            <el-upload
                                action="https://jsonplaceholder.typicode.com/posts/"
                                list-type="picture-card"
                                :on-preview="handlePictureCardPreview"
                                :on-success="successupload"
                                :on-remove="handleRemove">
                                <i class="el-icon-plus"></i>
                                </el-upload>
                                <el-dialog :visible.sync="dialogVisible">
                                <img width="100%" :src="dialogImageUrl" alt="">
                            </el-dialog>
                            </div>
                            <el-form-item label="描述"  prop="content">
                            <el-input  type="textarea" v-model="form.content"  placeholder="请添加描述"></el-input>
                            </el-form-item>
                        </el-form>
                        <div slot="footer" class="dialog-footer">
                            <div style="text-align: left;font-size: 14px; color: #606266; line-height: 40px;font-weight: 900;padding: 0 12px 0 0;">编辑内容</div>
                            <script id="editor" type="text/plain" style="width:900px;height:500px;"></script>
                            <el-button @click="roleFrom = false">取 消</el-button>
                            <el-button type="primary" @click="SubmitFrom('roleForm')">确 定</el-button>
                         </div>

        </el-dialog>

</div>
<script>
  var ue = UE.getEditor('editor');
  //获取content 内容
  function getContent() {
        var arr = [];
        arr.push(UE.getEditor('editor').getContent());
        return arr.join("\n");
    }

new Vue({
         
            delimiters: ['@{{', '}}'],
            el: '#apps',
            data() {
                return {
                    dialogImageUrl: '',
                    dialogVisible: false,
                    roleFrom:false,
                    fileList:[],
                    form:{
                        name:"",
                        model:"",
                        sku:"",
                        content:""
                    },
                    title:"",
                    rules: {
                        name: [
                            { required: true, message: '名称不能为空！', trigger: 'blur' },
                        ],
                        model:[
                            {required:true,message:'型号不能为空！',trigger:'blur'}
                        ],
                        sku:[
                            {required:true,message:'SKU不能为空！',trigger:'blur'}
                        ],
                        content:[
                            {required:true,message:'content不能为空！',trigger:'blur'}
                        ]
                    },
               }
            },
            methods:{
                successupload(response, file, fileList){
                    console.log(fileList)
                    this.fileList=filelist
                },
                handleRemove(file, fileList) {
                    console.log(file, fileList);
                    this.fileList=fileList
                },
                handlePictureCardPreview(file) {
                    console.log(file)
                    this.dialogImageUrl = file.url;
                    this.dialogVisible = true;
                },
                //获取数据
                getdata(){
                    console.log(0)
                },
                //显示表单
                AddRoleFrom(){
                    this.title = '添加产品'
                    this.roleFrom = true
                },
                SubmitFrom(formName){
                   let content =  getContent()
                   this.$refs[formName].validate((valid) => {
                       if(valid){
                           console.log(this.form)
                           console.log(content)
                           console.log(this.fileList)
                       }
                   })

                }

            },
            mounted(){
                this.getdata()
            },
           
        })
</script>   
<style>

    .el-textarea__inner{
        min-height:120px!important
    }
</style>

@stop



