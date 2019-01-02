@include('UEditor::head') 

    <!-- 加载编辑器的容器 -->

    <div id="detail_info">
        <script id="container" name="content" type="text/plain" style="width: 900px;position:absolute;left:300px;top:120px;"></script>

        <!-- 实例化编辑器 -->
   </div>



    <script>
        var ue = UE.getEditor('container');
    </script>




