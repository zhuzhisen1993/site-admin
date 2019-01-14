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
        <el-dialog  custom-class="loadings"  :title="title" :visible.sync="roleFrom">
            <el-form style="margin-left:75px" ref="roleForm" :model="form" :rules="rules" ref="roleForm">

                <el-form-item label="网站标题">
                    <el-input  v-model="form.webtitle"   placeholder="请输入网站标题"></el-input>
                </el-form-item>

                <el-form-item label="网站内容">
                    <el-input  v-model="form.webkeywords"    placeholder="请输入网站内容"></el-input>
                </el-form-item>

                <el-form-item label="网站描述">
                    <el-input  v-model="form.webdescription" type="textarea"  placeholder="请输入网站描述"></el-input>
                </el-form-item>

                <div style="display:flex" class="nemes">

                    <el-form-item label="名称"  prop="name">
                        <el-input  v-model="form.name"  placeholder="请输入名称"></el-input>
                    </el-form-item>

                    <el-form-item label="类型"  prop="catalog">
                        <el-select v-model="catalog_id" filterable placeholder="请选择分类">
                            <el-option
                                    v-for="item in tableData"
                                    :key="item.id"
                                    :label="item.catalogName"
                                    :value="item.id">
                            </el-option>
                        </el-select>
                    </el-form-item>

                    <el-form-item label="型号"  prop="model">
                        <el-input  v-model="form.model"  placeholder="请输入型号"></el-input>
                    </el-form-item>
                </div>

                <div style="display:flex" class="prices">
                    <el-form-item label="价格"  prop="price">
                        <el-input  v-model.number="form.price"   placeholder="请输入价格"></el-input>
                    </el-form-item>
                    <el-form-item label="数量"  prop="num">
                        <el-input  v-model.number="form.num"  placeholder="请输入数量"></el-input>
                    </el-form-item>
                    <el-form-item label="SKU"  prop="sku">
                        <el-input  v-model.number="form.sku"  placeholder="请输入SKU"></el-input>
                    </el-form-item>
                </div>

                <el-form-item label="描述" style="margin-top:15px" >
                    <el-input  type="textarea" v-model="form.describe"  placeholder="请添加描述"></el-input>
                </el-form-item>

                <div>
                    <div style="text-align: left;font-size: 14px; color: #606266; line-height: 40px;font-weight: 900;padding: 0 12px 0 15px;">上传photo</div>
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

            </el-form>

            <div slot="footer" class="dialog-footer">
                <div style="text-align: left;font-size: 14px; color: #606266; line-height: 40px;font-weight: 900;padding: 0 12px 0 0;">编辑内容</div>
                <textarea id="editor" type="text/plain" style="width:900px;height:500px;"></textarea>
                <el-button @click="roleFrom = false" style="margin-top:20px;">取 消</el-button>
                <el-button type="primary" style="margin-top:20px;" @click="SubmitFrom('roleForm')">确 定</el-button>
            </div>
        </el-dialog>


    </div>

@stop

<script>
    new Vue({
        el: '#apps',
        data() {
            return {

            }
        },
        methods:{
            Addfrom(){

            }
        }
    })
</script>



