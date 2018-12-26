@extends('admin.app')
@section('content-header')
    <script type="text/javascript" charset="utf-8" src="{{url('dist/js/neditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src=" {{url('dist/js/neditor.all.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{url('dist/js/neditor.service.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{url('dist/js/i18n/zh-cn/zh-cn.js')}}"></script>
    <script type="text/javascript" src="{{url('dist/js/third-party/browser-md5-file.min.js')}}"></script>
    <script type="text/javascript" src="{{url('dist/js/third-party/jquery-1.10.2.min.js')}}"></script>
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
                            label="类型名称">
                        <template slot-scope="scope">
                            <span>@{{ scope.row.articletypes.title }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="文章名称">
                        <template slot-scope="scope">
                            <span>@{{ scope.row.title }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="创建时间"
                            width="180">
                        <template slot-scope="scope">
                            <span >@{{ scope.row.created_at }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column
                            label="更新时间"
                            width="180">
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
    <el-dialog :title="title" :visible.sync="ArticlesFormVisible">
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

            <div class="wenzhang" style="display:flex">
            <el-form-item label="文章分类" :label-width="formLabelWidth">
                <el-select v-model="data.article_type_id" placeholder="请选择">
                    <el-option
                            v-for="item in ArticleTypeData"
                            :key="item.id"
                            :label="item.title"
                            :value="item.id">
                    </el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="网页头部显示" :label-width="formLabelWidth">
            <el-radio v-model="data.top" label="1">是</el-radio>
            <el-radio v-model="data.top" label="0">否</el-radio>
            </el-form-item>
            </div>
            <el-form-item label="文章名称" :label-width="formLabelWidth">
                <el-input v-model="data.title" autocomplete="off"></el-input>
            </el-form-item>
            <el-form-item label="文章图片" :label-width="formLabelWidth">
                <el-upload
                        class="avatar-uploader"
                        action="/admin/upload"
                        :headers="headers"
                        :show-file-list="false"
                        :on-success="handleAvatarSuccess"
                        :before-upload="beforeAvatarUpload">
                    <img v-if="data.img_url" :src="data.img_url" class="avatar">
                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                </el-upload>
            </el-form-item>
        </el-form>

        <div slot="footer" class="dialog-footer">
            <div style="text-align: left;font-size: 14px; color: #606266; line-height: 40px;font-weight: 900;padding: 0 12px 0 0;">文章内容</div>
            <textarea id="editor" style="width:900px;height:500px;" v-model="data.content">{{data.content}}</textarea>
            {{--<textarea id="editor" style="width:900px;height:500px;">@{{data.content}}</textarea>--}}
            <el-button @click="ArticlesFormVisible = false">取 消</el-button>
            <el-button type="primary" @click="SubmitArticles()">确 定</el-button>
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
            //delimiters: ['@{{', '}}'],
            el: '#apps',
            data() {
                return {

                    headers:{
                        'X-CSRF-TOKEN': document.getElementsByTagName('meta')['csrf-token'].getAttribute("content")
                    },

                    ArticlesFormVisible: false,
                    data: {
                        id:'',
                        article_type_id:'',
                        title: '',
                        webtitle:'',
                        webkeywords:'',
                        webdescription:'',
                        img_url:'',
                        content:'',
                        top:"1"
                    },
                    formLabelWidth: '120px',
                    tableData: [],
                    search:"",
                    pagesize: 20,
                    currpage: 1,
                    currentIndex:'',
                    ArticleTypeData:'',
                    imageUrl:'',
                    title:"新增文章"
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
                    this.title="修改文章"
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
                    this.title="修改文章"
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
                        this.data.content = getContent();
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
                },
                //处理图片方法
                handleAvatarSuccess(res, file, fileList) {
                    this.data.img_url = res.path.replace('http://localhost',"")
                },
                beforeAvatarUpload(file) {
                    const isJPG = file.type === 'image/jpeg';
                    const isLt2M = file.size / 1024 / 1024 < 2;

                    // if (!isJPG) {
                    // this.$message.error('上传头像图片只能是 JPG 格式!');
                    // }
                    if (!isLt2M) {
                        this.$message.error('上传头像图片大小不能超过 2MB!');
                    }
                    //return isJPG && isLt2M;
                    return isLt2M;
                },
            },
            created(){
                this.getData();
            }
        })
    </script>

<style>
        label{
            width:40px  
        }
    .box{
        padding-bottom: 40px;
    }
    input[type=file]{
        display:none
    }
    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
    }
    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 100px;
        height: 100px;
        line-height: 100px;
        text-align: center;
    }
    .avatar {
        width: 100px;
        height: 100px;
        display: block;
    }
</style>


@stop

