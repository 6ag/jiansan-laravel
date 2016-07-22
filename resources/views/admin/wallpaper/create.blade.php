@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                创建壁纸
                <small>上传新的壁纸</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 仪表盘</a></li>
                <li class="active">创建壁纸</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-warning">

                <div class="box-header with-border">
                    @if(is_object($errors) && count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p>{{ $errors->first() }}</p>
                        </div>
                    @endif
                </div>

                <div class="box-body">
                    <form role="form" action="{{ url('admin/wallpaper') }}" method="post">
                    {{ csrf_field() }}
                    <!-- 选择门派 -->
                        <div class="form-group">
                            <label>壁纸分类</label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                <option value="{{ $category->alias }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input id="imagePaths" type="hidden" value="" name="imagePaths">
                            <input id="file_upload" type="file" multiple="true">
                            <script src="{{ url('vendor/uploadifive/jquery.uploadifive.min.js') }}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{ url('vendor/uploadifive/uploadifive.css') }}">
                            <script type="text/javascript">
                                // 用于拼接图片路径
                                var imagePaths = '';
                                $(function() {
                                    $('#file_upload').uploadifive({
                                        'auto' : true,
                                        'debug' : false, // 是否开启浏览器调试
                                        'fileTypeExts':'*.jpg;*.gif;*.bmp;*.png;*.jpeg', //允许的图片类型
                                        'buttonText' : '选择图片',
                                        'successTimeout' : 300,
                                        'uploadLimit' : 100,
                                        'formData' : {
                                            '_token' : '{{ csrf_token() }}'
                                        },
                                        'uploadScript' : '{{ url('admin/upload') }}',
                                        'onUploadComplete' : function(file, imagePath) {
                                            if (imagePaths == '') {
                                                imagePaths += imagePath;
                                            } else {
                                                imagePaths += ',' + imagePath;
                                            }

                                            // 赋值给隐藏域
                                            $('input[name=imagePaths]').val(imagePaths);

                                            // 临时预览图
                                            createThumb(imagePath);

                                            // 设置提交表单按钮可用
                                            $('#submit').attr('disabled', false);
                                        },
                                        onUpload : function(file) {
                                            // 设置提交表单按钮不可用
                                            $('#submit').attr('disabled', true);
                                        },
                                    });
                                });

                                // 创建缩略图节点
                                function createThumb(imagePath) {
                                    var thumb = $("<div class='col-sm-6 col-md-3' id='" + imagePath + "'>").appendTo($("#thumbnail"));
                                    var span = $("<span class='thumbnail'>").appendTo(thumb);
                                    var img = $("<img src='" + "/" + imagePath + "'>").appendTo(span);
                                    var close = $("<a id='closeimg' href='javascript:;' onclick=\"removeImage(this, '" + imagePath + "');\">").appendTo(span);
                                }

                                // 移除图片
                                function removeImage(close, imagePath) {
                                    // 移除缩略图元素
                                    close.parentElement.parentElement.remove();

                                    // 移除缩略图路径
                                    if (imagePaths.match(imagePath + ',')) { // 删除不是末尾一张
                                        imagePaths = imagePaths.replace(imagePath + ',', "");
                                    } else if (imagePaths.match(',' + imagePath)) { // 删除末尾一张
                                        imagePaths = imagePaths.replace(',' + imagePath, "");
                                    } else { // 删除最后剩余的一张
                                        imagePaths = imagePaths.replace(imagePath, "");
                                    }

                                    // 赋值给隐藏域
                                    $('input[name=imagePaths]').val(imagePaths);
                                }
                            </script>
                        </div>

                        <div class="form-group">
                            <div class="row" id="thumbnail">
                                {{-- 这里是缩略图 --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary btn-block btn-flat">提交到数据库</button>
                        </div>

                    </form>
                </div>
            </div>

        </section>

    </div>
@endsection


