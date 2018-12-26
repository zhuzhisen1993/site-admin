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
                        :data="tableData.filter(data => !search || data.ActionName.toLowerCase().includes(search.toLowerCase()) || data.remarks.toLowerCase().includes(search.toLowerCase())|| data.ControllerName.toLowerCase().includes(search.toLowerCase())).slice((currpage - 1) * pagesize, currpage * pagesize)"
                        style="width: 100%"  v-loading="loading">

                    <el-table-column
                            label="序号"
                            prop="id">
                    </el-table-column>
                    <el-table-column
                            label="控制器名称"
                            prop="ControllerName">
                    </el-table-column>
                    <el-table-column
                            label="方法名称"
                            prop="ActionName">
                    </el-table-column>
                    <el-table-column
                            label="权限名称"
                            prop="remarks">
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
                    <el-form-item label="方法属性名称" :label-width="formLabelWidth" prop="name">
                        <el-input v-model="form.name" autocomplete="off" placeholder="请输方法名称"></el-input>
                    </el-form-item>
                </el-form>
                <div slot="footer" class="dialog-footer">
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
                  title:'添加商品属性',
                    fullscreenLoading: false,
                    pagesize: 20,
                    currpage: 1,
                    tableData: [],
                    search: '',
                    permissionAddFrom: false,
                    form: {
                        name:"",

                    },
                    formLabelWidth: '120px',
                    rules: {
                        name: [
                            { required: true, message: '属性名称不能为空！', trigger: 'blur' },
                        ],
                        ActionName:[
                            {required:true,message:'方法名称不能为空！',trigger:'blur'}
                        ],
                        remarks:[
                            {required:true,message:'备注不能为空！',trigger:'blur'}
                        ]
                    },
                    loading: false
                }
            },
            methods:{
                getData:function () {
                    let that = this
                    axios.get("/admin/permission/getData").then(function (res) {
                        that.tableData = res.data
                    })
                },
                permissionAdd:function(){
                    this.resetFrom();
                    this.permissionAddFrom = true
                },
                SubmitFrom:function (formName) {
                        var that = this;
                        this.$refs[formName].validate((valid) => {
                            if (valid) {
                                that.fullscreenLoading=true
                                axios.post("/admin/permisssion/add",{
                                    data:this.form
                                }).then(function (res) {
                                    that.fullscreenLoading=false
                                    if(res.data.msg == 'success'){
                                        that.$message({
                                            message: res.data.tips,
                                            type: 'success'
                                        });
                                        that.permissionAddFrom = false
                                        if(that.form.id){
                                            that.tableData = that.tableData.map(function (item) {
                                                if(item.id == res.data.data.id){
                                                    item = res.data.data
                                                }
                                                return item;
                                            })
                                        }else{
                                            that.tableData.push(res.data.data)
                                        }
                                    }else{
                                        that.$message.error(res.data.tips);
                                    }
                                })
                            } else {
                                console.log('error submit!!');
                                return false;
                            }
                        });
                },
                handleEdit(index, row) {
                     this.form.id = row.id,
                     this.form.ControllerName = row.ControllerName,
                     this.form.ActionName = row.ActionName,
                     this.form.remarks =row.remarks,
                     this.permissionAddFrom= true
                },
                handleDelete(index, row) {
                    this.$confirm('此操作将永久删除该文件, 是否继续?', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                        this.fullscreenLoading=true
                        let that = this
                        axios.post('/admin/permission/'+row.id+'/destroy').then(function (res) {
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
                resetFrom:function () {
                    this.form.id = '',
                    this.form.ControllerName = '',
                    this.form.ActionName = '',
                    this.form.remarks = ''
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
@stop



