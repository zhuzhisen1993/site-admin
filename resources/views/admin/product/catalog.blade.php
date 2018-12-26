@extends('admin.app')
@section('content-header')

    <style>
    .el-dialog {
        position: relative;
        margin: 0 auto 50px;
        border-radius: 2px;
        -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.3);
        box-shadow: 0 1px 3px rgba(0,0,0,.3);
        box-sizing: border-box;
        width: 29%;
    }
</style>

    <h1>
         产品类型管理
        <small>产品类型</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>产品类型管理</li>
        <li class="active">产品</li>
    </ol>

@stop
@section('content')
<div id="apps">
<a @click="AddRoleFrom()" class="btn btn-primary margin-bottom"><i class="fa fa-paint-brush" style="margin-right: 6px"></i>新增类型</a>
                                    <el-table
                                        :data="tableData"
                                        style="width: 100%">
                                        <el-table-column
                                        label=""
                                        prop=""
                                        width="40">
                                        </el-table-column>
                                        <el-table-column
                                        label="name"
                                        prop="catalogName"
                                        width="200">
                                        </el-table-column>
                                        <el-table-column
                                        label="level"
                                        prop="level"
                                        width="80">
                                        </el-table-column>
                                        <el-table-column
                                        label="created_at"
                                        prop="created_at">
                                        </el-table-column>
                                        <el-table-column
                                        label="updated_at"
                                        prop="updated_at">
                                        </el-table-column>
                                        <el-table-column
                                        label="操作"
                                        align="right">
                                        <template slot-scope="scope">
                                            <el-tooltip :content="'Switch value: ' + value5" placement="top">
                                                <el-switch
                                                @change="handleEdit(scope.$index, scope.row)" 
                                                active-text="启用"
                                                 inactive-text="禁用"
                                                    v-model="scope.row.isshow+''"
                                                    active-color="#13ce66"
                                                    inactive-color="#ff4949"
                                                    active-value="1"
                                                    inactive-value="0">
                                                </el-switch>
                                                </el-tooltip>
                                                <el-button
                                            size="mini"
                                            @click="handleedit(scope.$index, scope.row)">编辑</el-button>
                                            <el-button
                                            size="mini"
                                            type="danger"
                                            @click="handleDelete(scope.$index, scope.row)">删除</el-button>
                                        </template>
                                        </el-table-column>
                                    </el-table>

                                    <el-dialog   :title="title" :visible.sync="roleFrom">
                                                        <el-form  :model="form" :rules="rules" ref="roleForm">
                                                            <el-form-item label="类型级别" :label-width="formLabelWidth" prop="Actionsku">
                                                            <el-input  @focus="showtree()" v-model="selectedOptions" placeholder="点击选择内容。"></el-input>
                                                            <div class="highlight" >
                                                                  <el-tree  accordion transiton="fade" v-show="tree" 
                                                                  node-key="id"  :data="options" :props="defaultProps" @node-click="handleNodeClick"></el-tree>
                                                            </div>
                                                            </el-form-item>
                                                            <el-form-item label="类型名称" :label-width="formLabelWidth" prop="">
                                                            <el-input  @focus="hidetree()" v-model="form.name" placeholder="请输入内容。"></el-input>
                                                            </el-form-item>
                                                            <el-form-item label="是否显示" :label-width="formLabelWidth" prop="">
                                                            <el-radio v-model="form.isshow" label="0">否</el-radio>
                                                            <el-radio v-model="form.isshow" label="1">是</el-radio>
                                                            </el-form-item>

                                                        </el-form>
                                                        <div slot="footer" class="dialog-footer">
                                                            <el-button @click="roleFrom = false">取 消</el-button>
                                                            <el-button type="primary"  v-loading.fullscreen.lock="fullscreenLoading" @click="SubmitFrom('roleForm')">确 定</el-button>
                                                    </div>
                                        </el-dialog>
                                        <el-dialog title="编辑级别" :visible.sync="dialogFormVisible">
                                        <el-form :model="fomedata">
                                        <el-form-item label="类型级别" :label-width="formLabelWidth" prop="Actionsku">
                                                            <el-input  @focus="showtree()" v-model="selectedOptions" placeholder="请输入内容"></el-input>
                                                            <div class="highlight" >
                                                                  <el-tree  accordion transiton="fade" v-show="tree" :data="options" :props="defaultProps" @node-click="handleNodeClick"></el-tree>
                                                            </div>
                                                            </el-form-item>
                                            <el-form-item label="级别名称" :label-width="formLabelWidth">
                                            <el-input v-model="fomedata.name" autocomplete="off"></el-input>
                                            </el-form-item>
                                        </el-form>
                                        <div slot="footer" class="dialog-footer">
                                            <el-button @click="dialogFormVisible = false">取 消</el-button>
                                            <el-button type="primary" @click="editoption">确 定</el-button>
                                        </div>
                                        </el-dialog>
</div>
<script>
         const array2tree = (array, pflag = "pid", sflag = "id", root = 0) => {
                            function cascader(pid, level = 1) {
                                const target = [];
                                array.forEach(a=> {
                                const _clone = Object.assign({}, a);
                                if (_clone[pflag] == pid) {
                                    _clone.level = level;
                                    target.push(_clone);
                                    const _child = cascader(_clone[sflag], level + 1);
                                    if (_child.length) {
                                    _clone.children = _child;
                                    }
                                }
                                });
                                return target;
                            }
                            return cascader(root);
            }
        new Vue({
            delimiters: ['@{{', '}}'],
            el: '#apps',
            data() {
                return {
                    fullscreenLoading: false,
                    rules: {
                        title:[
                            { required: true, message: '类型不能为空！', trigger: 'blur' },
                        ]
                    },
                    
                    dialogFormVisible:false,
                    tree:false,
                    formLabelWidth:'120px',
                    roleFrom:false,
                    checkPermission:false,
                    title:"",
                    fomedata:{
                        name:"123"
                    },
                    form:{
                        isshow:'1',
                        id:"",
                        name:"",
                        level:"",
                    },
                    value5:"0",
                    options: [],
                    selectedOptions: "",
                    name:"",
                    defaultProps:{
                        value: 'id',
                        label:'name',
                        children: 'children'
                    },
                    tableData: [],
                    catalogData:[],
                    ids:"",
                    str:'',
                    listData:[]
               }
            },
            methods:{
                //保存编辑
                editoption(){
                    console.log(this.fomedata)
                    let that = this
                   
                    axios.post("productCatalog/"+this.ids+"/edit",{data:this.fomedata}).then(res=>{
                        this.dialogFormVisible = false
                        that.tableData.map(item=>{
                                console.log(res)
                            })
                        })
                    console.log(this.fomedata)
                },
                //编辑操作
                handleedit(inde,row){
                    this.ids = row.id
                    this.selectedOptions = row.catalogName
                    this.dialogFormVisible = true
                    this.fomedata.name=row.name
                    this.fomedata.pid=row.pid
                    this.fomedata.level = row.level
                    this.fomedata.isshow=row.isshow
                },
                //禁用操作
                handleEdit(index, row) {
                    let that = this
                    let statemessage=""
                    if(row.isshow==1){
                        statemessage="禁用"
                    }
                    if(row.isshow==0){
                        statemessage="启用"  
                    }
                    this.$confirm(`此操作将${statemessage}, 是否继续?`, '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                    //     axios.post("/admin/users/"+row.id+"/status").then(function(res){
                    //     that.$message({
                    //         type: 'success',
                    //         message: `${res.data.tips}`
                    // });
                    // axios.post("").then(function(){
                    //  })
                    that.tableData.map(item=>{
                        if(item.id == row.id){
                            if(item.isshow==1){
                                    item.isshow=0
                             }else{
                                item.isshow=1
                             }
                        }
                    })
                    }).catch(() => {
                        that.$message({
                            type: 'info',
                            message: '已取消'
                        });          
                    
                    })
                },
                //删除操作
                handleDelete(index, row) {
                    let oneoption={name:"添加顶级",cname:"添加顶级",isshow: 1,level: -1}
                    //console.log(row.id);
                    let that = this
                    let statemessage="删除本条"
                    this.$confirm(`此操作将${statemessage}, 是否继续?`, '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                        axios.post("productCatalog/"+row.id+"/destory").then(res=>{
                        if(res.data.msg=="success"){
                            that.$message({
                            type: 'success',
                            message: '删除成功'
                        })  
                        that.tableData.map(item=>{
                            that.tableData = that.tableData.filter(item=>{
                                    return item.id != row.id
                            })
                        })
                        that.options=array2tree(that.tableData)
                        that.options.unshift(oneoption)
                        }
                    })  

                    }).catch(() => {
                        that.$message({
                            type: 'info',
                            message: '已取消'
                        });          
                    })
                },
                handleNodeClick(data) {
                    this.str = '';
                    this.selectedOptions = this.ftree(data);
                    this.fomedata.level = data.level
                    //console.log(this.selectedOptions);

                    //console.log(this.tableData);
                    // if(this.selectedOptions.indexOf(data.name)=="-1"){
                    //     this.selectedOptions = this.selectedOptions+data.name
                    // }else{
                        //this.selectedOptions = data.name
                         this.form.id = data.id
                         this.form.level= data.level
                         this.fomedata.level=data.level
                    // // }
                    //      this.form.id = data.id
                    //      this.form.level= data.level

                 },
                ftree(data){
                    if(this.catalogData[data.pid] != undefined){
                         this.str = this.catalogData[data.pid].name+' >> '+this.str
                        this.ftree(this.catalogData[data.pid])
                    }
                    return this.str+data.name;
                 },
                 showtree(){
                    this.tree= true
                 },
                 hidetree(){
                    this.tree= false
                 },
                 //获取数据
                getdata(){
                    let that=this
                    let level=0
                    axios.get("productCatalog/getDate").then(function(res){
                         that.tableData=res.data
                         that.tableData.forEach(function (res,index) {
                            that.str = ''
                            that.catalogData[res.id] = res
                            res.catalogName = that.ftree(res);
                         })
                         let oneoption={name:"添加顶级",cname:"添加顶级",isshow: 1,level: -1}
                        that.options.push(oneoption)
                        let children = []
                        that.options=array2tree(res.data)
                        that.options.unshift(oneoption)
                        //console.log(that.tableData)
                        let a =[]
                        // that.tableData.map(item=>{
                        //
                        //
                        // })
                        console.log(that.tableData);
                    })

                },
                //显示表单
                AddRoleFrom(){
                    this.title = '添加类型'
                    this.resetFrom();
                    this.roleFrom = true
                },
                //重置表单
                resetFrom:function () {
                    this.form.name = ''
                },
                  //提交表单
                  SubmitFrom(){
                    let oneoption={name:"添加顶级",name:"添加顶级",isshow: 1,level: -1}
                    let that = this
                    if(this.form.name==""){
                        that.$message({
                            message: '名称不能为空',
                            type: 'warning'
                        });
                        return false;
                    }
                    if(this.form.selectedOptions==""){
                        that.$message({
                            message: '级别不能为空',
                            type: 'warning'
                        });
                        return false;
                    }
                    axios.post('productCatalog/add',{data:this.form}).then(res=>{
                        that.$message({
                            message: '添加成功',
                            type: 'success'
                        });
                        that.roleFrom=false
                        that.tableData.push(res.data.data)
                        that.tableData.forEach(function (res,index) {
                            that.str = ''
                            that.catalogData[res.id] = res
                            res.catalogName = that.ftree(res);
                         })
                        that.options=array2tree(that.tableData)
                        that.options.unshift(oneoption)

                    })
                },
            },
            mounted(){
                this.getdata()
            }
        })
    </script>
    
    <style scoped>
        .block{
            display:inline-block
        }
        .el-tree{
            border: 1px solid #ebebeb;
            border-radius: 3px;
            transition: .2s;
        }
    </style>
@stop



