@extends('admin.app')
@section('content-header')
    @include('UEditor::head')
    <script src="{{ mix('js/index.js') }}"></script>


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


                <el-table
                    :data="tableData"
                    style="width: 100%">
                    <el-table-column label=""
                            prop=""
                            width="40">
                            </el-table-column>
                            <el-table-column
                            label="ID"
                            prop="id"
                            width="40">
                            </el-table-column>
                            <el-table-column
                            label="名称"
                            prop="catalogName"
                            width=>
                            </el-table-column>
                            <el-table-column
                            label="级别"
                            prop="level"
                            width=>
                            </el-table-column>
                            <el-table-column
                            label="创建时间"
                            prop="created_at">
                            </el-table-column>
                            <el-table-column
                            label="更新时间"
                            prop="updated_at">
                            </el-table-column>
                    <el-table-column  label="操作" width="200" fixed="right" >
                    <template slot-scope="scope"  >
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
        
        <el-dialog  custom-class="loadings"  :title="title" :visible.sync="roleFrom">
                        <el-form style="margin-left:75px" ref="roleForm" :model="form" :rules="rules" ref="roleForm">
                        <template>
                                <el-tabs v-model="activeName" @tab-click="tableedit">
                                    <el-tab-pane label="商品编辑" name="first">
                                    <el-form-item label="描述" style="margin-top:15px" >
                                                                        <el-input  type="textarea" v-model="form.describe"  placeholder="请添加描述"></el-input>
                                                        </el-form-item>
                                                        <el-form-item label="网站标题">
                                                    <el-input  v-model="form.webtitle"   placeholder="请输入网站标题"></el-input>
                                                    </el-form-item>
                                                    
                                                    <el-form-item label="网站内容">
                                                        <el-input  v-model="form.webkeywords"    placeholder="请输入网站内容"></el-input>
                                                    </el-form-item>
                                                    
                                                    <el-form-item label="网站描述">
                                                        <el-input  v-model="form.webdescription" type="textarea"  placeholder="请输入网站描述"></el-input>
                                                    </el-form-item>
                                    <div style="display:flex" class="prices">
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
                                              
                                    </el-tab-pane>
                            <el-tab-pane label="内容编辑" name="third">
                                            <div style="text-align: left;font-size: 14px; color: #606266; line-height: 40px;font-weight: 900;padding: 0 12px 0 0;">编辑内容</div>
                                            <textarea id="editor" type="text/plain" style="width:900px;height:500px;"></textarea></el-tab-pane>
                             </el-tab-pane>
                             <el-tab-pane label="图片编辑" name="fourth">
                             	
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
                             </el-tab-pane>
                                </el-tabs>
                        </template>



                    
                        </el-form> 
						
						 <div slot="footer" class="dialog-footer">
								<el-button @click="roleFrom = false" style="margin-top:20px;">取 消</el-button>
								<el-button type="primary" style="margin-top:20px;" @click="SubmitFrom('roleForm')">确 定</el-button>
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
                            activeName: 'first',
                            dialogImageUrl: '',
                            dialogVisible: false,
                            roleFrom:true,
                            fileList:[],
                            form:{
								webtitle:"",
								webkeywords:"",
								webdescription:"",
                                name:"",
                                catalog_id:"",
                                model:"",
                                sku:"",
                                content:"",
                                num:"",
                                price:"",
                                photo:"",
								sort:"",
								isshow:"",
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
                                    {required:true,message:'SKU不能为空！',trigger:'blur'},
                                    {type: 'number',message:'SKU必须为数字'}
                                ],
                                content:[
                                    {required:true,message:'content不能为空！',trigger:'blur'}
                                ],
                                price:[
                                    {required:true,message:'price不能为空！',trigger:'blur'},
                                    {type: 'number',message:'price必须为数字'}
                                ],
                                num:[
                                    {required:true,message:'num不能为空！',trigger:'blur'},
                                    {type: 'number',message:'num必须为数字'}
                                ],
                                net:[
                                    {required:true,message:'net不能为空！',trigger:'blur'}
                                ],
                                nettitle:[
                                    {required:true,message:'nettitle不能为空！',trigger:'blur'}
                                ],
                                netcontent:[
                                    {required:true,message:'netcontent不能为空！',trigger:'blur'}
                                ],
                            },
                            tableData: [],
							catalog_id:'',
							catalogData:[]
                    }
                    },
                    methods:{
                        tableedit(tab, event) {
                            // console.log(tab, event);
                        },
                        handleEdit(index, row) {
                            this.roleFrom = true
                            this.form = row
                            console.log(row);
                        },
                        successupload(response, file, fileList){
                            //console.log(fileList)
                            this.fileList=filelist
                        },
                        handleRemove(file, fileList) {
                            //console.log(file, fileList);
                            this.fileList=fileList
                        },
                        handlePictureCardPreview(file) {
                           // console.log(file)
                            this.dialogImageUrl = file.url;
                            this.dialogVisible = true;
                        },
                        //获取数据
                        getdata(){
							let that=this
							let level=0
                            axios.get("productCatalog/getDate").then(function(res){
								that.tableData=res.data
								
                                that.tableData.forEach(function (res,index) {
									//console.log(index);
                                   that.str = ''
                                   that.catalogData[res.id] = res
                                   res.catalogName = that.ftree(res)
                                })
								console.log(that.catalogData);
                            })
						
                        },
						ftree(data){
						    if(this.catalogData[data.pid] != undefined){
						        this.str = this.catalogData[data.pid].name+' >> '+this.str
						        this.ftree(this.catalogData[data.pid])
						    }
						    return this.str+data.name;
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

                            }
                        })

                        },
                        handleDelete(index,row) {
                            let that = this
                            let statemessage="删除本条"
                            this.$confirm(`此操作将${statemessage}, 是否继续?`, '提示', {
                                confirmButtonText: '确定',
                                cancelButtonText: '取消',
                                type: 'warning'
                            }).then(() => {
                            //     axios.post("productCatalog/"+row.id+"/destory").then(res=>{
                            //     if(res.data.msg=="success"){
                                    that.$message({
                                    type: 'success',
                                    message: '删除成功'
                                })  
                                that.tableData.map(item=>{
                                    that.tableData = that.tableData.filter(item=>{
                                            return item.id != row.id
                                    })
                                })
                        
                            //     }
                            // })  
                            }).catch(() => {
                                that.$message({
                                    type: 'info',
                                    message: '已取消'
                                });          
                            })
                        
                            
                            
                        },

                    },
                    mounted(){
                        this.getdata()
                    },
                
                })
        </script>   
<style>
    .el-textarea__inner{
        min-height:79px!important
    }
    .el-form-item__content {
    line-height: 40px;
    position: relative;
    font-size: 14px;
    padding-left:10%
}
.el-form-item__error{
    margin-left:16%
}
  .nemes .el-form-item__content{
      margin-left:12%;
      padding-left:-5%
  }
  .prices .el-form-item__content{
    margin-left:22%;

  }
 .nemes  .el-form-item{
     width:45%;
 }
 .prices  .el-form-item{
     width:31%;
 }
label{
     padding-left:15px!important
 }
.el-upload--picture-card{
    margin-left:80px
}
</style>

@stop



