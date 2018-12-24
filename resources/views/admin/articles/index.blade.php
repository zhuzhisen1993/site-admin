@extends('admin.app')
@section('content-header')
    <h1>
        文章管理
        <small>内容</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li>文章管理</li>
        <li class="active">内容</li>
    </ol>
@stop

@section('content')

<div id="apps">

    <a @click="OpenArticle()" class="btn btn-primary margin-bottom"><i class="fa fa-paint-brush" style="margin-right: 6px"></i>新增文章</a>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">文章列表</h3>
            <div class="box-tools">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm pull-right" name="s_title"
                               style="width: 150px;" placeholder="搜索文章标题">
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
                        style="width: 100% ; text-align: center;"  border>
                    <el-table-column
                            label="序号"
                            width="180">
                        <template slot-scope="scope">
                            <span >@{{ scope.row.id }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="类型名称"
                            width="180">
                        <template slot-scope="scope">
                            <span>@{{ scope.row.title }}</span>
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
                                    @click="openSaveArticleFrom(scope.row,scope.$index)">修改</el-button>
                            <el-button
                                    size="mini"
                                    @click="deleteArticleType(scope.row,scope.$index)">删除</el-button>
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
        </div>
    </div>




    <el-dialog title="新增文章" :visible.sync="ArticlesFormVisible">
        <el-form :model="data">
            <el-form-item label="网页标题" :label-width="formLabelWidth">
                <el-input v-model="data.webtitle"></el-input>
            </el-form-item>
            <el-form-item label="网页关键字" :label-width="formLabelWidth">
                <el-input type="textarea" :autosize="{ minRows: 2, maxRows: 4}" v-model="data.webkeywords"></el-input>
            </el-form-item>
            <el-form-item label="网页描述" :label-width="formLabelWidth">
                <el-input type="textarea" :autosize="{ minRows: 2, maxRows: 4}" v-model="data.webdescription"></el-input>
            </el-form-item>


            <el-form-item label="文章分类" :label-width="formLabelWidth">
                <el-select v-model="data.pid" placeholder="请选择">
                    <el-option
                            v-for="item in ArticleTypeData"
                            :key="item.id"
                            :label="item.title"
                            :value="item.id">
                    </el-option>
                </el-select>
            </el-form-item>

            <el-form-item label="文章名称" :label-width="formLabelWidth">
                <el-input v-model="data.title" autocomplete="off"></el-input>
            </el-form-item>
        </el-form>
        <div slot="footer" class="dialog-footer">
            <el-button @click="ArticlesFormVisible = false">取 消</el-button>
            <el-button type="primary" @click="SubmitArticles()">确 定</el-button>
        </div>
    </el-dialog>








    </div>
</div>

    <script>
        new Vue({
            //delimiters: ['@{{', '}}'],
            el: '#apps',
            data() {
                return {
                    ArticlesFormVisible: false,
                    data: {
                        id:'',
                        pid:'',
                        title: '',
                        webtitle:'',
                        webkeywords:'',
                        webdescription:''
                    },
                    formLabelWidth: '120px',
                    tableData: [],
                    search:"",
                    pagesize: 20,
                    currpage: 1,
                    currentIndex:'',
                    ArticleTypeData:''
                }
            },
            methods:{
                getData(){
                    var that = this
                    axios.get('/admin/article/getData').then(function (res) {
                        console.log(res.data.data);
                        that.tableData = res.data.data.article
                        that.ArticleTypeData = res.data.data.articleType
                    })
                },
                OpenArticle:function(){
                    this.data.id =''
                    this.ArticlesFormVisible = true

                    for(var key in this.data){
                        this.data[key] = ''
                    }
                },
                openSaveArticleFrom:function (row,index) {
                    this.currentIndex = index
                    this.ArticlesFormVisible = true

                    for(var key in this.data){
                        this.data[key] = row[key]
                    }

                    // this.data.id = row.id
                    // this.data.title = row.title
                    // this.data.webtitle = row.webtitle
                    // this.data.webkeywords = row.webkeywords
                    // this.data.webdescription = row.webdescription
                },
                SubmitArticles:function(){
                    let that = this
                    if(this.data.id !=""){
                        axios.post('/admin/article/'+this.data.id+'/edit',{data:that.data}).then(function (res) {
                            if(res.data.msg == 'success'){
                                that.$message({
                                    type: 'success',
                                    message: res.data.tips
                                });
                                that.tableData[that.currentIndex] = res.data.data
                                that.ArticlesFormVisible = false
                            }else{
                                that.$message.error(res.data.tips);
                            }
                        })
                    }else{
                        axios.post("/admin/article/add",{data:that.data}).then(function (res) {
                            if(res.data.msg == 'success'){
                                that.$message({
                                    type: 'success',
                                    message: res.data.tips
                                });
                                that.tableData.push(res.data.data)
                                that.ArticlesFormVisible = false
                            }else{
                                that.$message.error(res.data.tips);
                            }
                        })
                    }
                },
                handleCurrentChange(cpage) {
                    this.currpage = cpage;
                },
                handleSizeChange(psize) {
                    this.pagesize = psize;
                },
                deleteArticleType:function (row,index) {
                    let that = this

                    this.$confirm('此操作将永久删除, 是否继续?', '提示', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                        axios.post('/admin/article/' + row.id + '/destroy', {data: that.data}).then(function (res) {
                            if (res.data.msg == 'success') {
                                that.$message({
                                    type: 'success',
                                    message: res.data.tips
                                });
                                that.ArticlesFormVisible = false
                                that.tableData.splice(index, 1)
                            }
                        })
                    }).catch(() => {
                        this.$message({
                            type: 'info',
                            message: '已取消删除'
                        });
                    })
                }
            },
            created(){
                this.getData();
            }
        })
    </script>

@stop

