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
                            label="name"
                            prop="name">
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
                <el-form-item label="展示类型" :label-width="formLabelWidth" prop="show">
                    <el-select v-model="form.option_type_id" placeholder="请选择">
                            <el-option
                            v-for="item in options"
                            :key="item.id"
                            :label="item.type"
                            :value="item.id">
                            </el-option>
                 </el-select>
                    </el-form-item>
                    <el-form-item label="方法属性名称" :label-width="formLabelWidth" prop="name">
                        <el-input v-model="form.title" autocomplete="off" placeholder="请输方法名称"></el-input>
                    </el-form-item>
                  
                    <el-form-item label="属性值" v-if="eidtshow" :label-width="formLabelWidth" max-height="250"  prop="">
                                <el-table
                                border
                                :data="list.filter(data => !searchs || data.name.toLowerCase().includes(this.searchs.toLowerCase()))"
                                stripe
                                style="width: 100%"
                                max-height="250">
                                <el-table-column
                                prop="name"
                                label="属性值名称"
                               >
                                </el-table-column>
                                <el-table-column
                                prop="price"
                                label="price"
                               >
                                </el-table-column>
                                <el-table-column
                                prop="prices"
                                label="prices"
                               >
                                </el-table-column>
                                <el-table-column
                                prop="sku"
                                label="sku">
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
                                    @click.native.prevent="deleteRow(scope.$index, list)"
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
                <div class="listitem" v-if="eidtshow" >
                                <span> 属性值名称</span>
                                <input  ref="name" class="itemstyle" placeholder="请输入名称"/>
                                <span style="margin-left:10px"> 价格</span>
                                <input ref="price"  class="itemstyle" placeholder="请输入价格"/>
                                <br>
                                <span> sku</span>
                                <input ref="sku" class="itemstyle" placeholder="请输入内容"/>
                                <span style="margin-left:10px"> 价格2</span>
                                <input ref="prices"  class="itemstyle" placeholder="请输入内容"/>
                                <el-button @click="addlist" type="primary" class="addlist" >确认添加属性值</el-button>
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
                    list:[{name: "1", price: "2", sku: "3", prices: "4"},{name: "2", price: "2", sku: "3", prices: "4"}],
                    result1:null,
                    options:[ ],
                    eidtshow:false,
                    formLabelWidth: '120px',
                    rules: {
                        name: [
                            { required: true, message: '属性名称不能为空！', trigger: 'blur' },
                        ],
                        show:[
                            {required:true,message:'显示方式不能为空！',trigger:'blur'}
                        ],
                    },
                    loading: false
                }
            },
            methods:{
                    //删除本行属性值
                    deleteRow(index, rows) {
                        rows.splice(index, 1);
                    },
                    editRow(index, row){
                        this.$refs.name.value=row.name
                        this.$refs.price.value=row.price
                        this.$refs.prices.value=row.prices
                        this.$refs.sku.value=row.sku
                    },
                    //添加一行属性
                    addlist(){
                        let list = {}
                            list.name   =  this.$refs.name.value
                            list.price  =  this.$refs.price.value
                            list.sku    =  this.$refs.sku.value
                            list.prices =  this.$refs.prices.value
                            for(key in list){
                                if(list[key]===""||list[key]===null){
                                    this.$message({
                                    type: 'error',
                                    message: '属性值不能为空!'
                                });
                                return
                                }
                            }
                            this.form.list.push(list)
                            this.list.push(list)
                            this.resetlistitem()
                       
                    },
                getData:function () {
                    let that = this
                    axios.get("/admin/option/getData").then(function (res) {
                        console.log(res);
                        that.options = res.data.data.option_type
                    })
                },
                permissionAdd:function(){
                    this.title="添加商品属性"
                    // this.resetFrom();
                     this.permissionAddFrom = true
                },
                SubmitFrom:function (formName) {
                        var that = this;
                        this.$refs[formName].validate((valid) => {
                            if (valid) {
                                 that.fullscreenLoading=true
                                 axios.post("/admin/option/add",{ data:this.form}).then(function (res){
                                             if(res.data.msg == 'success'){
                                                    that.$message({
                                                        message: res.data.tips,
                                                        type: 'success'
                                                });
                                        that.permissionAddFrom = false
                                        console.log(res)
                                 })
                                
                                //     that.fullscreenLoading=false
                                //     if(res.data.msg == 'success'){
                                //         that.$message({
                                //             message: res.data.tips,
                                //             type: 'success'
                                //         });
                                //         that.permissionAddFrom = false
                                //         if(that.form.id){
                                //             that.tableData = that.tableData.map(function (item) {
                                //                 if(item.id == res.data.data.id){
                                //                     item = res.data.data
                                //                 }
                                //                 return item;
                                //             })
                                //         }else{
                                //             that.tableData.push(res.data.data)
                                //         }
                                //     }else{
                                //         that.$message.error(res.data.tips);
                                //     }
                                // })
                                console.log(this.form)
                            } else {
                                console.log('error submit!!');
                                return false;
                            }
                        });
                },
                handleEdit(index, row) {
                    //  this.form.id = row.id,
                    //  this.form.ControllerName = row.ControllerName,
                    //  this.form.ActionName = row.ActionName,
                    //  this.form.remarks =row.remarks,
                    //  this.permissionAddFrom= true
                },
                handleDelete(index, row) {
                    // this.$confirm('此操作将永久删除该文件, 是否继续?', '提示', {
                    //     confirmButtonText: '确定',
                    //     cancelButtonText: '取消',
                    //     type: 'warning'
                    // }).then(() => {
                    //     this.fullscreenLoading=true
                    //     let that = this
                    //     axios.post('/admin/permission/'+row.id+'/destroy').then(function (res) {
                    //         that.fullscreenLoading=false
                    //         if(res.data == 'success'){
                    //             that.tableData = that.tableData.filter(item=>{
                    //                 return item.id != row.id
                    //             })
                    //         }
                    //         that.$message({
                    //             type: 'success',
                    //             message: '删除成功!'
                    //         });
                    //     })

                    // }).catch(() => {
                    //     this.$message({
                    //         type: 'info',
                    //         message: '已取消删除'
                    //     });
                    // })
                },
                resetlistitem() {
                    this.$refs.name.value=""
                     this.$refs.price.value=""
                     this.$refs.sku.value=""
                    this.$refs.prices.value=""
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
        width:200px;
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



