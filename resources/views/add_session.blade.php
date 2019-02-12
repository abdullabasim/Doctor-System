@extends('layouts.default')
@section('title')
    Add Session
@endsection

@section('content')

    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Add Session for Patient :</b> <b style="color: #3c8dbc">{{$patient->name}}</b></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <br>
                @include('alertNotifications/alertNotifications')

                <form id="myForm" method="post" action="{{url('addSession')}}">
                 @csrf
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-8  col-md-offset-2">
                            <div class="form-group">
                                <label><font size="4">Diagnosis *</font></label>
                                <textarea class="form-control" id="diagnosis" name="diagnosis" placeholder="Enter {{$patient->name}} Diagnosis" cols="60" rows="10" required></textarea>

                                @if($errors->first('name'))
                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>{{ $errors->first('name') }}</b></span>
                                @endif
                                <span id="err" style="float: left ;color: red; visibility: hidden"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>Diagnosis Field is Required</b></span>

                            </div>
                            <!-- /.form-group -->

                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>


                    <div style="margin-top: 50px" class="row">

                        <!-- /.col -->
                        <div class="col-md-8  col-md-offset-2">
                            {{--<fieldset class="form-group row">--}}
                                <div class="form-group row panel panel-default">
                                    <div style="text-align: center !important; margin-bottom: 15px;margin-top: 5px">
                                        <label><font size="4" ><span ><u style="color: #3c8dbc">Medical Section</u> </span></font></label>
                                    </div>
                                <div class="row">

                                    <!-- /.col -->
                                    <div class="col-md-8  col-md-offset-2">
                                        <div class="col-md-10 ">
                                        <div class="form-group">
                                            <label><font size="4">Julphar Medical</font></label>

                                            <select  id ="julphar"  class="form-control select2" style="width: 100%;" data-placeholder="Select from Julphar Medical">
                                                <option selected="selected"></option>
                                                @foreach($julphar as $julphars)
                                                    <option>{{$julphars->title}}</option>

                                                 @endforeach
                                            </select>
                                        </div>

                                        </div>
                                        <div class="col-md-2 ">
                                            <div class="form-group">
                                                <label><font size="4"></font></label>
                                                <span id="addBtn1" style="margin-top: 12px" href="#" class="btn btn-primary ">
                                                    <span  class="glyphicon glyphicon-plus addBtns"></span> Add
                                                </span>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <!-- /.col -->
                                    <div class="col-md-8  col-md-offset-2">
                                        <h3><b>OR</b> Write specific Medical and press add Button</h3>
                                    </div>
                                    <!-- /.col -->
                                </div>

                                <div class="row">

                                    <!-- /.col -->
                                    <div class="col-md-8  col-md-offset-2">
                                        <div  class="col-md-10 ">
                                        <div class="form-group">
                                            <label><font size="4">Medical</font></label>
                                            <textarea class="form-control" id="medical"  placeholder="Enter {{$patient->name}} Medical"   cols="30" rows="5"></textarea>

                                            @if($errors->first('medical'))
                                                <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>{{ $errors->first('medical') }}</b></span>
                                            @endif
                                        </div>
                                        </div>

                                        <div class="col-md-2 ">
                                            <div class="form-group">
                                                <label><font size="4"></font></label>
                                                <span id="addBtn2" style="margin-top: 40px" href="#" class="btn btn-primary ">
                                                    <span  class="glyphicon glyphicon-plus "></span> Add
                                                </span>
                                            </div>

                                        </div>
                                        <!-- /.form-group -->

                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>

                                <div class="row" style="margin-top: 50px">

                                        <!-- /.col -->
                                        <div class="col-md-8 col-md-offset-2">


                                            <div  id="list" style="margin-left: 15px" class="panel panel-default form-group">
                                                <label style="margin-left: 15px ;margin-bottom: 10px"><font size="4">Selected Medical</font></label>

                                                <div id="space">
                                                    <br>
                                                <br><br><br><br>
                                                </div>


                                                </div>

                                        </div>
                                        <!-- /.col -->
                                    </div>
                            </div>



                        </div>

















                    </div>


                <input type="hidden" name="patientId" value="{{$patient->id}}">
                <input id ="medicalList" type="hidden" name="medicalsPatient">

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-2  col-md-offset-5">
                            <div class="form-group">
                                <button id="submits" type="button" class="btn btn-block btn-primary btn-flat"><font size="4"><b>Save</b></font></button>
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

            $('.select2').select2()
        });
        var items = $("#list");
        var medicals = [];
        $('#addBtn1,#addBtn2').click(function(){



            if ($(this).attr('id') == 'addBtn1' && $('#julphar :selected').val() !="")
            {
                $('#space').remove();

                medicals.push($('#julphar :selected').val());
                items.append(

                    '                                                <div class="list">\n' +
                    '                                                    <div class="col-md-10 " >\n' +
                    '\n' +
                    '                                                        <span>'+$('#julphar :selected').val()+'</span>\n' +
                    '\n' +
                    '\n' +
                    '                                                    </div>\n' +
                    '                                                    <div inData='+$('#julphar :selected').val()+' id="rem" style="margin-top: 5px" class="col-md-2 remove " >\n' +
                    '\n' +
                    '                                                        <span   role="button" class="glyphicon glyphicon-remove"></span>\n' +
                    '\n' +
                    '\n' +
                    '                                                    </div>\n' +

                    '\n' +
                    '                                                 <br>\n' +
                    '                                                <br>'+
                    '                                                </div>\n' );
            }
            else if($(this).attr('id') == 'addBtn2' && $('#medical').val() && $.trim($('#medical').val()))
            {
                $('#space').remove();

                medicals.push($('#medical').val());

                items.append(

                    '                                                <div class="list">\n' +
                    '                                                    <div class="col-md-10 " >\n' +
                    '\n' +
                    '                                                        <span>'+$('#medical').val()+'</span>\n' +
                    '\n' +
                    '\n' +
                    '                                                    </div>\n' +
                    '                                                    <div inData= '+$('#medical').val()+' id="rem" style="margin-top: 5px" class="col-md-2 remove " >\n' +
                    '\n' +
                    '                                                        <span  role="button" class="glyphicon glyphicon-remove"></span>\n' +
                    '\n' +
                    '\n' +

                    '                                                </div>\n' +
                    '\n' +
                    '                                                 <br>\n' +
                    '                                                <br>'+
                    '                                                </div>\n' );
            }

        });

        $(items).on("click","#rem", function(e){


            for(var i in medicals){
                if( medicals[i]== $(this).attr('inData')){
                    medicals.splice(i,1);
                    break;
                }
            }


            e.preventDefault();

            $(this).parent('div').remove();

        });

        $('#submits').click(function(){


            if( $('#diagnosis').val() && $.trim($('#diagnosis').val()) )
            {

                $('#medicalList').val(medicals);

                document.getElementById('myForm').submit();
            }
            else
            {
                document.getElementById("err").style.visibility="visible";
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }


        });

    </script>
@endsection
@endsection