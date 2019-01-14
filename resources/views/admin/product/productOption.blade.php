@extends('admin.app')
@section('content-header')
    @include('UEditor::head')
    <script src="{{ mix('js/index.js') }}"></script>


    <h1>
        产品属性管理
        <small>产品属性内容</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>产品属性管理</li>
        <li class="active">内容</li>
    </ol>
@stop


@section('content')
    <div id="apps">
        <a @click="Addfrom()" class="btn btn-primary margin-bottom"><i class="fa fa-paint-brush" style="margin-right: 6px"></i>新增产品属性</a>


        <!-- -->
        <el-dialog  custom-class="loadings"  :title="title" :visible.sync="ProductOptionForm">
            <el-form style="margin-left:75px" ref="ProductOptionForm" :model="form" :rules="rules">

                <div style="display:flex" class="nemes">
                    <el-form-item label="名称"  prop="name">
                        <el-input  v-model="form.name"  placeholder="请输入产品名称"></el-input>
                    </el-form-item>
                </div>

            </el-form>

            <div slot="footer" class="dialog-footer">
                <el-button @click="roleFrom = false" style="margin-top:20px;">取 消</el-button>
                <el-button type="primary" style="margin-top:20px;" @click="SubmitFrom('ProductOptionForm')">确 定</el-button>
            </div>
        </el-dialog>


    </div>


    <script>
    new Vue({
        el: '#apps',
        data() {
            return {
                title:'添加产品属性',//弹出框的名称
                ProductOptionForm:true,
                form:{
                       name:''
                },
                rules: {
                    name: [
                        { required: true, message: '产品名称不能为空！', trigger: 'blur' },
                    ],
                },
            }
        },
         methods:{
              Addfrom(){
                    this.ProductOptionForm = true
              },
             SubmitFrom(formName){

             }
        }
    })
    </script>


@stop





