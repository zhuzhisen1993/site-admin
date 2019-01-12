@extends('admin.app')
@section('content-header')
    <h1>
        属性管理
        <small>属性</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>属性管理</li>
        <li class="active">属性</li>
    </ol>
@stop

@section('content')
    <div id="apps">
        <a class="btn btn-primary margin-bottom" @click="permissionAdd()"><i class="fa fa-paint-brush" style="margin-right: 6px"></i>新增属性</a>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">属性列表</h3>
                <div class="box-tools">
                    <form action="" method="get">
                        <div class="input-group">
                            <input   v-model="search" type="text" class="form-control input-sm pull-right" name="s_title"
                                   style="width: 150px;" placeholder="搜索属性名称">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <template>
                <el-table
                        :data="tableData.filter(data => !search || data.title.toLowerCase().includes(search.toLowerCase()) || data.id.toLowerCase().includes(search.toLowerCase())|| data.ControllerName.toLowerCase().includes(search.toLowerCase())).slice((currpage - 1) * pagesize, currpage * pagesize)"
                        style="width: 100%"  v-loading="loading">
                    <el-table-column
                            label="序号"
                            prop="id">
                    </el-table-column>
                    <el-table-column
                            label="属性名称"
                            prop="title">
                    </el-table-column>
                    <el-table-column
                            label="类型"
                            prop="option_type.type">
                    </el-table-column>
                    <el-table-column
                            label="创建时间"
                            prop="created_at">
                    </el-table-column>
                    <el-table-column
                            label="修改时间"
                            prop="updated_at">
                    </el-table-column>
                    <el-table-column
                            align="right">
                        <template slot-scope="scope">
                            <el-button
                                    size="mini"
                                    @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
                            <el-button
                                    size="mini"
                                    type="danger"
                                    @click="handleDelete(scope.$index, scope.row)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </template>

            <div style="text-align: center;padding:10px 0px;">
                <el-pagination
                        @size-change="handleSizeChange"
                        @current-change="handleCurrentChange"
                        :current-page="currpage"
                        :page-sizes="[20, 30, 40, 50]"
                        :page-size="pagesize"
                        layout="total, sizes, prev, pager, next, jumper"
                        :total="tableData.length">
                </el-pagination>
            </div>

            <!-- Form -->
            <el-dialog :title="title" :visible.sync="permissionAddFrom">
                <el-form :model="form" :rules="rules" ref="permissionForm">
                <el-form-item label="展示类型" :label-width="formLabelWidth" prop="option_type_id">
                    <el-select v-model="form.option_type_id" placeholder="请选择">
                            <el-option
                            v-for="item in options"
                            :key="item.id"
                            :label="item.type"
                            :value="item.id">
                            </el-option>
                 </el-select>
                    </el-form-item>
                    <el-form-item label="方法属性名称" :label-width="formLabelWidth" prop="title">
                        <el-input v-model="form.title" autocomplete="off" placeholder="请输方法名称"></el-input>
                    </el-form-item>
                  
                    <el-form-item label="属性值" v-if="eidtshow" :label-width="formLabelWidth" max-height="250"  prop="">
                                <el-table
                                border
                                :data="list.filter(data => !searchs || data.sku.toLowerCase().includes(this.searchs.toLowerCase()))"
                                stripe
                                style="width: 100%"
                                max-height="250">

                                <el-table-column
                                prop="title"
                                label="属性值名称">
                                 </el-table-column>

                                <el-table-column
                                        prop="sku"
                                        label="sku">
                                </el-table-column>

                                </el-table-column>
                                <el-table-column
                                prop="created_at"
                                label="添加时间"
                               >
                                </el-table-column>

                                <el-table-column
                                prop="updated_at"
                                label="修改时间"
                               >
                                </el-table-column>

                                <el-table-column
                                    fixed="right"
                                    label="操作"
                                    width="180">
                                    <template slot="header" slot-scope="scope">
                                        <el-input
                                        v-model="searchs"
                                        size="mini"
                                        placeholder="输入关键字搜索"/>
                                    </template>
                                    <template slot-scope="scope">
                                    <el-button
                                    @click.native.prevent="deleteRow(scope.$index, list,scope.row)"
                                    type="text"
                                    size="small">移除 </el-button>
                                    <el-button
                                    @click.native.prevent="editRow(scope.$index,  scope.row)"
                                    type="text"
                                    size="small">编辑 </el-button>
                                    </template>
                                    </el-table-column>
                            </el-table>
                    </el-form-item>
                </el-form>
                <div class="listitem"  v-if="eidtshow" >
                            <div style="text-align: center;">
                                <span> 属性值名称</span>
                                <input  ref="name" class="itemstyle" placeholder="请输入名称"/>
                            </div>
                            <div style="text-align: center;">
                                <span> sku</span>
                                <input ref="sku" class="itemstyle" placeholder="请输入内容"/>
                            </div>
                            <el-button @click="addlist" type="primary" class="addlist" >@{{controller}}</el-button>
                </div>
                <div slot="footer" class="dialog-footer"style="margin-top: 60px;" >
                    <el-button @click="permissionAddFrom = false">取 消</el-button>
                    <el-button type="primary"  v-loading.fullscreen.lock="fullscreenLoading" @click="SubmitFrom('permissionForm')">确 定</el-button>
                </div>
            </el-dialog>

        </div>
    </div>


    <script>
        new Vue({
            el: '#apps',
            data() {
                return {
                controller:"添加属性",
                  title:'',
                    fullscreenLoading: false,
                    pagesize: 20,
                    currpage: 1,
                    tableData: [],
                    search: '',
                    searchs: '',
                    permissionAddFrom: false,
                    form: {
                        title:"",
                        option_type_id:"",
                    },
                    list:[],
                    editindex:"",
                    result1:null,
                    options:[ ],
                    isedit: false,
                    eidtshow:false,
                    formLabelWidth: '120px',
                    rules: {
                        title: [
                            { required: true, message: '属性名称不能为空！', trigger: 'blur' },
                        ],
                        option_type_id:[
                            {required:true,message:'显示方式不能为空！',trigger:'blur'}
                        ],
                    },
                    loading: false,
                    option_catalog_id :'',
                    id:'',
                }
            },
            methods:{
                    //删除本行属性值
                    deleteRow(index, rows,row) {
                        let that = this
                        this.$confirm('此操作将永久删除该条, 是否继续?', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                            }).then(() => {
                                axios.post("option/"+row.id+"/destory").then(res=>{
                                    if(res.data.msg == "success"){
                                        rows.splice(index, 1);
                                        that.$message({
                                            message: res.data.tips,
                                            type: 'success'
                                        })
                                    }else{
                                        that.$message({
                                            message: res.data.tips,
                                            type: 'error'
                                        })
                                    }
                                })       
                            }).catch(() => {
                                this.$message({
                                    type: 'info',
                                    message: '已取消删除'
                                });
                            })
                    },
                    editRow(index, row){
                        this.controller="修改属性"
                        this.id = row.id
                        this.isedit= true
                        this.editindex = index
                        this.$refs.name.value=row.title
                        this.$refs.sku.value=row.sku
                    },
                    //添加一行属性
                    addlist(){
                        let list = {}
                        let that = this
                        list.title   =  this.$refs.name.value
                        list.option_catalog_id  =  this.option_catalog_id
                        list.sku    =  this.$refs.sku.value

                            for(key in list){
                                if(list[key]===""||list[key]===null){
                                    this.$message({
                                    type: 'error',
                                    message: '属性值不能为空!'
                                });
                                return
                                }
                            }
                           // console.log(list.sku.length) 
                            if(list.sku.length<6){
                                this.$message({
                                    type: 'error',
                                    message: 'sku不能小于6位且必须为数字!'
                                });
                                return
                            }
                            if(this.isedit===true){
                                this.resetlistitem()
                                axios.post("/admin/option/"+this.id+"/edit",list).then(res=>{
                                that.$message({
                                type: 'success',
                                message: '修改成功!'
                                });
                                that.list[this.editindex]=res.data.data
                                that.controller="添加属性"
                                that.resetlistitem()
                                that.isedit=false
                                })
                            }else{
                                axios.post("/admin/option/add",list).then(res=>{
                                    that.list.push(res.data.data)
                                    that.resetlistitem()
                                    that.$message({
                                        type: 'success',
                                        message: '添加成功!'
                                    });
                                })
                            }
                           
                    },
                getData:function () {
                    let that = this
                    axios.get("/admin/option/getData").then(function (res) {
                       // console.log(res);
                        that.options = res.data.data.option_type
                        that.tableData = res.data.data.option_catalog
                    })
                },
                permissionAdd:function(){
                    this.eidtshow = false
                    this.title="添加商品属性"
                    // this.resetFrom();
                     this.permissionAddFrom = true
                },
                SubmitFrom:function (formName) {
                        var that = this;
                        this.$refs[formName].validate((valid) => {
                            if (valid) {
                                if(this.eidtshow==false){
                                    that.fullscreenLoading=true
                                     axios.post("/admin/option/add",{ data:this.form}).then(function (res){
                                             if(res.data.msg == 'success'){
                                                    that.$message({
                                                        message: res.data.tips,
                                                        type: 'success'
                                                });
                                                that.permissionAddFrom = false
                                                that.fullscreenLoading = false
                                                //console.log(res)
                                                that.tableData.push(res.data.data)
                                             }
                                 })
                                //console.log(this.form)
                                }else{
                                    console.log(111)
                                }
                               
                            } else {
                                //console.log('error submit!!');
                                return false;
                            }
                        }
                        );
                },
                handleEdit(index, row) {
                        //console.log(row)
                        this.form.option_type_id = row.option_type_id,
                        this.form.title = row.title,
                        this.fullscreenLoading=true
                        this.option_catalog_id = row.id
                        let that = this
                       //console.log(index, row)
                        axios.post("/admin/option/"+row.id+"/getOption",{ data:this.form}).then(function (res){
                            that.permissionAddFrom=true
                            that.fullscreenLoading=false
                            that.eidtshow = true
                            that.list = res.data.data
                        })

                },
                handleDelete(index, row) {
                    this.$confirm('此操作将永久删除该文件, 是否继续?', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                        this.fullscreenLoading=true
                        let that = this
                        axios.post('/admin/option/'+row.id+'/destroy').then(function (res) {
                            //console.log(res)
                            that.fullscreenLoading=false
                            if(res.data == 'success'){
                                that.tableData = that.tableData.filter(item=>{
                                    return item.id != row.id
                                })
                            }
                            that.$message({
                                type: 'success',
                                message: '删除成功!'
                            });
                        })

                    }).catch(() => {
                        this.$message({
                            type: 'info',
                            message: '已取消删除'
                        });
                    })
                },
                resetlistitem() {
                    this.$refs.name.value=""
                    this.$refs.sku.value=""
                },
                handleCurrentChange(cpage) {
                    this.currpage = cpage;
                },
                handleSizeChange(psize) {
                    this.pagesize = psize;
                }
            },
            mounted(){
                this.getData();
            }
        })
    </script>

    <style>

    .el-table__row td, .el-table th{
        padding:5px 0
    }
   .addproperty .el-table td,.addproperty .el-table th{
        padding: 5px 0!important;
    }
    .listitem{
    border: 1px solid #333;
    border-radius: 5px;
    padding: 60px 20px;
    color: #606266;
    -webkit-appearance: none;
    background-color: #fff;
    background-image: none;
    border-radius: 4px;
    border: 1px solid #dcdfe6;
    margin-bottom:15px;
    position:relative;
    width: 75%;
    margin:0 auto;
    }
    .addlist{
        padding:10px;
        margin:10px 20px 40px 0;
        float: right;
    }
    .itemstyle{
    width:300px;
    -webkit-appearance: none;
    background-color: #fff;
    background-image: none;
    border-radius: 4px;
    border: 1px solid #dcdfe6;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    color: #606266;
    display: inline-block;
    font-size: inherit;
    height: 40px;
    line-height: 40px;
    outline: 0;
    padding: 0 15px;
    -webkit-transition: border-color .2s cubic-bezier(.645,.045,.355,1);
    transition: border-color .2s cubic-bezier(.645,.045,.355,1);
    }
    .itemclose{
    padding:5px;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    }
    .listitem span{
        padding:15px;
        display:inline-block;
        width: 105px;
    }
    .addlist span{
        padding:0
    }
    </style>
@stop



