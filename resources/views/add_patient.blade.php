@extends('layouts.default')
@section('title')
    Add Patient
@endsection

@section('content')

    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title font">Add Patient</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <br>
                @include('alertNotifications/alertNotifications')

                <form method="post" action="{{url('addPatient')}}">
                 @csrf
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-8  col-md-offset-2">
                            <div class="form-group">
                                <label><font size="4">Full Name *</font></label>
                                <input  type="text" name="name" class="form-control input-lg" value="{{old('name')}}"  placeholder="Enter Patient Full Name">

                                @if($errors->first('name'))
                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>{{ $errors->first('name') }}</b></span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-8  col-md-offset-2">
                            <div class="form-group">
                                <label><font size="4">Age *</font></label>
                                <input  type="text" name="age" class="form-control input-lg" value="{{old('age')}}" placeholder="Enter Patient Age">
                                @if($errors->first('age'))
                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>{{ $errors->first('age') }}</b></span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-8  col-md-offset-2">
                            <div class="form-group">
                                <label><font size="4">Mobile</font></label>
                                <input  type="text" name="mobile" class="form-control input-lg " value="{{old('mobile')}}"  placeholder="Enter Patient Mobile">

                                @if($errors->first('mobile'))
                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>{{ $errors->first('mobile') }}</b></span>
                                @endif
                            </div>
                            <!-- /.form-group -->

                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-2  col-md-offset-5">
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary btn-flat"><font size="4"><b>Save</b></font></button>
                            </div>
                            <!-- /.form-group -->

                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.box-body -->
                </form>
            </div>

        </section>
        <!-- /.content -->
    </div>
@section('js')

    <script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });


    </script>
@endsection
@endsection