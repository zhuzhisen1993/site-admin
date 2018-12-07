@extends('admin.app')
@section('content-header')
    <h1>
        用户管理
        <small>用户</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>用户管理</li>
        <li class="active">用户</li>
    </ol>
@stop

@section('content')
    <div id="apps">
    <span href="#" @click="editPasswordFrom('')" class="btn btn-primary margin-bottom"><i class="fa fa-paint-brush" style="margin-right: 6px"></i>新增用户</span>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">用户列表</h3>
            <div class="box-tools">
            <div class="input-group">
                        <input type="text" class="form-control input-sm pull-right"  v-model="search" name="s_title"      style="width: 150px;" placeholder="搜索用户标题">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="input-group">
                    <template>
                <el-select v-model="value" size="mini" @change="searchstatus"  placeholder="请选择状态">
                    <el-option
                    v-for="item in options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value">
                    </el-option>
                </el-select>
                </template>
                    </div>
            </div>
        </div>
        <div class="box-body table-responsive">
            
            <template>
                <el-table
                    :data="tableData.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase())||data.status-0==value-0).slice((currpage - 1) * pagesize, currpage * pagesize)"
                    style="width: 100% ; text-align: center;"  border>
                    <el-table-column
                    label="序号"
                    width="180">
                    <template slot-scope="scope">
                        <span >@{{ scope.row.id }}</span>
                    </template>
                    </el-table-column>
                    <el-table-column
                    label="用户名称"
                    width="180">
                    <template slot-scope="scope">
                        <span>@{{ scope.row.name }}</span>
                    </template>
                    </el-table-column>
                    <el-table-column
                    label="角色"
                    width="180">
                    <template slot-scope="scope">
                        <span v-for="(item, index) in scope.row.roles" :key="index">--@{{item.title}}</span>
                    </template>
                    </el-table-column>
                    <el-table-column
                    label="创建时间"
                    >
                    <template slot-scope="scope">
                        <span >@{{ scope.row.created_at }}</span>
                    </template>
                    </el-table-column>
                    <el-table-column
                    label="更新时间"
                    >
                    <template slot-scope="scope">
                        <span>@{{ scope.row.updated_at }}</span>
                    </template>
                    </el-table-column>
                    <el-table-column label="操作"  width="400">
                    <template slot-scope="scope">
                    <el-button
                        size="mini"
                        type="mini"
                        @click="openSavePasswordFrom(scope.$index, scope.row.id)">重置密码</el-button>
                        <el-button
                        size="mini"
                        @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
                        <el-tooltip :content="'Switch value: ' + scope.row.status" placement="top">
                        <el-switch
                        @change="handleDelete(scope.$index, scope.row)"
                            v-model="scope.row.status + ''"  
                            active-color="#13ce66"
                            inactive-color="#ff4949"
                            active-value="1"
                            inactive-value="0"
                            active-text="启用"
                            inactive-text="禁用">
                        </el-switch>
                        </el-tooltip>
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
            <el-dialog title="更改" :visible.sync="dialogTableVisible">
        <template>
        <el-checkbox :indeterminate="isIndeterminate" v-model="checkAll" @change="handleCheckAllChange">全选</el-checkbox>
        <div style="margin: 15px 0;"></div>
        <el-checkbox-group v-model="checkedCities" @change="handleCheckedCitiesChange">
            <el-checkbox v-for="city,i in cities" :label="city.id" :key="i">@{{city.title}}</el-checkbox>
        </el-checkbox-group>
        </template>
            <div slot="footer" class="dialog-footer">
                <el-button @click="dialogTableVisible = false">取 消</el-button>
                <el-button type="primary" @click="eite()">确 定</el-button>
            </div>
            </el-dialog>

        <!-- Form -->
        <el-dialog   title="修改密码" :visible.sync="dialogFormVisible"   width="30%">
            <el-form :model="form" ref="numberValidateForm">
                <el-form-item v-if="editmune" label="用户名" :label-width="formLabelWidth"  prop="username"
                              :rules=" rules.title" >
                    <el-input type="text" v-model="form.username" ></el-input>
                </el-form-item>
                <el-form-item label="密码" :label-width="formLabelWidth"  prop="password"
                              :rules="rules.rules" >
                    <el-input type="password" v-model="form.password" autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item label="确认密码" :label-width="formLabelWidth" prop="password1"
                              :rules="rules.rules">
                    <el-input type="password" v-model="form.password1" autocomplete="off"></el-input>
                </el-form-item>
        <template v-if="editmune">
        <el-checkbox :indeterminate="isIndeterminate" v-model="checkAll" @change="handleCheckAllChange">全选</el-checkbox>
        <div style="margin: 15px 0;"></div>
        <el-checkbox-group v-model="checkedCities" @change="handleCheckedCitiesChange">
            <el-checkbox v-for="city,i in cities" :label="city.id" :key="i">@{{city.title}}</el-checkbox>
        </el-checkbox-group>
        </template>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button @click="dialogFormVisible=false;">取 消</el-button>
                <el-button type="primary" @click="savePassword('numberValidateForm')">确 定</el-button>
            </div>
        </el-dialog>



        </div>
    </div>


    </div>


    <script>
        new Vue({

            el: '#apps',
            delimiters: ['@{{', '}}'],
            data() {
                return {
                    options: [{
                    value: '1',
                    label: '启用'
                    }, {
                    value: '0',
                    label: '禁用'
                    }],
                    value:"",
                    search:"",
                    pagesize: 20,
                    currpage: 1,
                    tableData: [],
                    tableDatas:[],
                    dialogTableVisible: false,
                    dialogFormVisible: false,
                    rules: {
                        rules:[
                        {
                            required: true,
                            message: '密码不能为空！'
                        },{
                        min:6,
                            message:"长度不能小于6"
                        },{
                        max:12,
                            message:"长度不能大于12"
                        }

                    ],
                    title:{
                            required: true,
                            message: '用户名不能为空！'
                        }
                    },
                  
                    form: {
                        id:'',
                        password: '',
                        password1: '',
                        username:"",
                    },
                    formLabelWidth: '120px',
                    checkAll: false,
                    checkedCities: [],
                    cities: [],
                    isIndeterminate: true,
                    id:[],
                    editmune:false,
                    itemid:""
                };
            },
            watch:{
                dialogFormVisible(val){
                    if(this.$refs['numberValidateForm']){
                    this.$refs['numberValidateForm'].resetFields();
                }
                }
            },
            methods:{
                searchstatus(){
                        this.tableData= this.tableDatas.filter(data => {return data.status-0==this.value-0})
                },
                getdate(){
                    let that = this
                    axios.get("/admin/users/getData").then(function (res) {
                        that.tableData=res.data.users
                        that.tableDatas=res.data.users

                        res.data.roles.map(item=>{
                            that.cities.push(item)
                            that.id.push(item.id)
                        })
                      //console.log(that.cities)
                    })
                },
                eite(){
                    if(this.checkedCities.length==0){
                            this.$message.error('权限不能为空！');
                             this.editmune=true
                     return
                    }
                    let that = this
                    axios.post("/admin/users/add",{
                            data:{id:this.itemid},
                            roles:this.checkedCities
                        }).then(function(res){
                      that.tableData.map(item=>{
                            if(item.id == that.itemid){
                             item.roles_ids=that.checkedCities
                            }
                        })
                        that.dialogTableVisible = false
                        that.$message({
                                message: '修改成功!',
                                type: 'success'
                            });
                    })
                },
                editPasswordFrom(){
                    this.dialogFormVisible = true
                    this.editmune=true
                    this.checkedCities=[]
                },
                openSavePasswordFrom:function(userId){
                    if(userId){
                        this.form.id = userId;
                    }
                    this.dialogFormVisible = true
                    this.editmune=false
                },
                savePassword:function(formName){
                        var that = this;
                        this.$refs[formName].validate((valid) => {
                            if (valid) {
                                if(this.form.password !== this.form.password1){
                                     this.$message.error('两次密码不一致，请从新输入！');
                                     return
                                }
                                if(that.editmune==false){
                                    let data = this.from
                                axios.post("/admin/reset/password",{
                                    data:this.form
                                }).then(function (res) {
                                    if(res.data== 'success'){
                                        that.$message({
                                            message: '密码更新成功!',
                                            type: 'success'
                                        });
                                        that.dialogFormVisible = false
                                    }else{
                                        that.$message.error(res.data);
                                    }
                                })
                            }else{
                                if(this.checkedCities.length==0){
                                    this.$message.error('权限不能为空！');
                                    return
                                }
                                let that = this
                                 axios.post("/admin/users/add",{
                                     data:this.form,
                                     roles:this.checkedCities
                                 }).then(function(res){

                                 })
                            }
                            } else {
                                console.log('error submit!!');
                                return false;
                            }
                        });
                },
                handleCurrentChange(cpage) {
                    this.currpage = cpage;
                },
                handleSizeChange(psize) {
                    this.pagesize = psize;
                },
                handleEdit(index, row) {
                    this.dialogTableVisible = true
                    this.checkedCities=row.roles_ids
                    this.itemid = row.id
                },
                handleCheckAllChange(val) {
                    this.checkedCities = val ? this.id : [];
                    this.isIndeterminate = false;
                },
                handleCheckedCitiesChange(value) {
                    let checkedCount = value.length;
                    this.checkAll = checkedCount === this.cities.length;
                    this.isIndeterminate = checkedCount > 0 && checkedCount < this.cities.length;
                },
                handleDelete(index, row) {
                    let that = this
                    let statemessage=""
                    if(row.status==1){
                        statemessage="禁用"
                    }
                    if(row.status==0){
                        statemessage="启用"  
                    }
                    this.$confirm(`此操作将${statemessage}, 是否继续?`, '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                   // /admin/users/参数/status  post方式
                    axios.post("/admin/users/"+row.id+"/status").then(function(res){
                        that.$message({
                            type: 'success',
                            message: `${res.data.tips}`
                    });
                    that.tableData.map(item=>{
                            if(item.id == row.id){
                                if(item.status==1){
                                    item.status=0
                                }else{
                                    item.status=1
                                }
                            }
                        })
                        //console.log(that.tableData)
                    })
                    }).catch(() => {
                        that.$message({
                            type: 'info',
                            message: '已取消'
                        });          
                    
                    })
                  


                },
            },
            created() {
                this.getdate()
                 },
           
        })
    </script>
    <style scope> 
    .el-input--mini .el-input__inner {
    height: 30px;
    line-height: 28px;
}
.input-group{
    margin-right: 20px
}
    .box-tools{
        display:flex
    }
    </style>


@stop



