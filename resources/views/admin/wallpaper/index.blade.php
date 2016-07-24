@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                壁纸管理
                <small>全部壁纸列表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 仪表盘</a></li>
                <li class="active">壁纸管理</li>
            </ol>
        </section>

        <section class="content">

            <div class="box">
                <div class="box-header">
                    @if(is_object($errors) && count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p>{{ $errors->first() }}</p>
                        </div>
                    @endif
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>
                        <div class="row">

                            @foreach($wallpapers as $key => $wallpaper)
                                <div class="col-lg-2">
                                    <form role="form" action="{{ url('admin/wallpaper/' . $wallpaper->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <div class="thumbnail">
                                            <a href="javascript:;" onclick="showBigImage('{{ url($wallpaper->bigpath) }}')" target="_blank"><img class="img-responsive" src="{{ url($wallpaper->smallpath) }}" style="height: 300px;"/></a>
                                            <div class="caption">
                                                <div class="form-group">
                                                    <input style="width: 100%; margin-bottom: 5px;" class="form-control" type="text" value="{{ $wallpaper->bigpath }}">
                                                </div>
                                                <div class="form-group">
                                                    <input style="width: 100%; margin-bottom: 5px;" class="form-control" type="text" value="{{ $wallpaper->smallpath }}">
                                                </div>
                                                <div class="form-group" style="width: 100%; margin-bottom: 5px;">
                                                    <select style="width: 100%;" class="form-control" name="category">
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->alias }}" {{ $wallpaper->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div style="text-align: center">
                                                    <button type="submit" class="btn btn-primary">更新</button>
                                                    <a href="javascript:;" onclick="deleteWallpaper({{ $wallpaper->id }})" class="btn btn-default" role="button">删除</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach

                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">一共有{{ $wallpapers->total() }}个壁纸</div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    {{ $wallpapers->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </section>

    </div>
@endsection

<script>
    // 删除壁纸
    function deleteWallpaper(id) {
        layer.confirm('您确定要删除这个壁纸吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/wallpaper')}}/" + id, {'_token' : '{{ csrf_token() }}', '_method' : 'delete'}, function(data) {
                if (data.status == 1) {
                    layer.msg(data.msg, {icon: 6});
                } else {
                    layer.msg(data.msg, {icon: 5});
                }
                window.location.reload();
            });
        }, function(){
            // 取消
        });
    }

    function showBigImage(bigPath) {
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            shadeClose: true,
            skin: 'content',
            content: "<img style='width: 375px; height: 667px; position:fixed; float: left; margin: -500px 0 0 -200px;' src=" + bigPath +  ">"
        });
    }
</script>


