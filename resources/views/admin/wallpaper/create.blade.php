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
                    <h3 class="box-title">General Elements</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form">

                        <!-- 选择门派 -->
                        <div class="form-group">
                            <label>Select</label>
                            <select class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>

                        <!-- text input -->
                        <div class="form-group">
                            <label>Text</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                        </div>



                    </form>
                </div>
                <!-- /.box-body -->
            </div>

        </section>

    </div>
@endsection


