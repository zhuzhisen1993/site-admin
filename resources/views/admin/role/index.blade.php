@extends('admin.app')
@section('content-header')
    <h1>
        角色管理
        <small>角色</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>角色管理</li>
        <li class="active">角色</li>
    </ol>
@stop

@section('content')
    <div id="apps">
            <a @click="AddRoleFrom()" class="btn btn-primary margin-bottom"><i class="fa fa-paint-brush" style="margin-right: 6px"></i>新增角色</a>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">角色列表</h3>
                    <div class="box-tools">
                        <form action="" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control input-sm pull-right" name="s_title"
                                       style="width: 150px;" placeholder="搜索角色标题">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive">

                    <template>
                        <el-table
                                :data="tableData.filter(data => !search || data.title.toLowerCase().includes(search.toLowerCase())).slice((currpage - 1) * pagesize, currpage * pagesize)"
                                style="width: 100%">
                            <el-table-column
                                    label="序号"
                                    prop="id">
                            </el-table-column>
                            <el-table-column
                                    label="角色名称"
                                    prop="title">
                            </el-table-column>
                            <el-table-column
                                    label="创建时间"
                                    prop="created_at">
                            </el-table-column>
                            <el-table-column
                                    label="更新时间"
                                    prop="updated_at">
                            </el-table-column>
                            <el-table-column
                                    align="right">
                                <template slot="header" slot-scope="scope">
                                    <el-input
                                            v-model="search"
                                            size="mini"
                                            placeholder="输入关键字搜索"/>
                                </template>
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
                    <el-dialog :title="title" :visible.sync="roleFrom">
                        <el-form :model="form" :rules="rules" ref="roleForm">
                            <el-form-item label="角色名称" :label-width="formLabelWidth" prop="ActionName">
                                <el-input v-model="form.title" autocomplete="off" placeholder="请输角色名称"></el-input>
                            </el-form-item>
                            <el-form-item label="权限列表">
                                <el-checkbox-group :min="1" v-model="checkPermission">
                                   <el-checkbox v-for="permission in permissions" :label="permission.id" :key="permission.id">@{{ permission.remarks }}</el-checkbox>
                                </el-checkbox-group>
                            </el-form-item>
                        </el-form>
                        <div slot="footer" class="dialog-footer">
                            <el-button @click="roleFrom = false">取 消</el-button>
                            <el-button type="primary"  v-loading.fullscreen.lock="fullscreenLoading" @click="SubmitFrom('roleForm')">确 定</el-button>
                        </div>
                    </el-dialog>

                </div>
            </div>
    </div>

    <script>
        new Vue({
            delimiters: ['@{{', '}}'],
            el: '#apps',
            data() {
                return {
                    fullscreenLoading: false,
                    title:'添加角色',
                    tableData:[],
                    search: '',
                    pagesize: 20,
                    currpage: 1,
                    roleFrom:false,
                    form:{
                        id:'',
                        title:'',
                    },
                    formLabelWidth:'120px',
                    rules: {
                        title:[
                            { required: true, message: '角色名称不能为空！', trigger: 'blur' },
                        ]
                    },
                    permissions:[],
                    checkPermission:[]
                }
            },
            methods:{
                getData:function () {
                    let that = this
                    axios.get("/admin/roles/getData").then(function (res) {
                        that.tableData = res.data.roles
                        console.log(res.data.roles);
                        that.permissions = res.data.permission
                    })
                },
                AddRoleFrom(){
                    this.title = '添加角色'
                    this.checkPermission =[]
                    this.resetFrom();
                    this.roleFrom = true
                },

                handleEdit(index, row) {
                    let that = this
                    this.form.id = row.id,
                    this.form.title = row.title
                    this.checkPermission =[]
                    row.permission_ids.forEach(function(item){
                        that.checkPermission.push(item)
                    })
                    this.title = '修改角色'
                    this.roleFrom= true
                },
                handleDelete(index, row) {
                    this.$confirm('此操作将永久删除该文件, 是否继续?', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                        this.fullscreenLoading=true
                        let that = this
                        axios.post('/admin/roles/'+row.id+'/destroy').then(function (res) {
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
                handleCurrentChange(cpage) {
                    this.currpage = cpage;
                },
                handleSizeChange(psize) {
                    this.pagesize = psize;
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
                    axios.post('/admin/roles/operation',{

                        data:this.form,
                        permission:this.checkPermission
                    }).then(function (res) {
                        if(res.data.msg == 'success'){
                            that.$message({
                                message: res.data.tips,
                                type: 'success'
                            });
                            that.roleFrom = false
                            if(that.form.id){
                                that.tableData = that.tableData.map(function (item) {
                                    if(item.id == res.data.data.id){
                                        res.data.data.permission_ids = that.checkPermission
                                        item = res.data.data
                                    }
                                    return item;
                                })
                            }else{
                                res.data.data.permission_ids = that.checkPermission
                                that.tableData.push(res.data.data)
                            }

                        }
                    })
                },

                //重置表单
                resetFrom:function () {
                    this.form.id = '',
                    this.form.title = ''
                },
            },
            mounted(){
                this.getData();
            }
        })
    </script>

@stop

