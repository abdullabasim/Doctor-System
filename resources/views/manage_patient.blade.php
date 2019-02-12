@extends('layouts.default')
@section('title')
    Manage Patients
@endsection
@section('css')
   <style>
       .dataTables_filter {
           float: right !important;
       }


   </style>
@endsection
@section('content')

    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title font">Manage Patients</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('alertNotifications/alertNotifications')
                    <table id="patientTable" class="table table-bordered table-striped">
                        <thead>
                        <tr style="color:#3c8dbc" >


                            <th><font size="3">#ID</font></th>
                            <th><font size="3">Name</font></th>
                            <th><font size="3">Age</font></th>
                            <th><font size="3">Mobile</font></th>
                            <th><font size="3">Date</font></th>
                            <th><font size="3">Add Session</font></th>
                            <th><font size="3">Manage</font></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)

                        <tr>
                            <td><font size="3">{{$patient->id}}</font></td>
                            <td><font size="3">{{$patient->name}}</font></td>
                            <td><font size="3">{{$patient->age}}</font></td>
                            <td><font size="3">{{$patient->mobile}}</font></td>
                            <td class=" "><font size="3">{{ Carbon\Carbon::parse($patient->created_at)->format('d/m/Y')}}</font></td>
                            <td ><button patientName="{{$patient->name}}" patientId="{{$patient->id}}"  type="button" class="btn btn-success addPatient">Add</button></td>
                            <td>
                                <div class="btn-group">
                                    <button style="margin-right: 5px" type="button" class="btn btn-warning editShow"

                                            editID="{{$patient->id}}"
                                            editName="{{$patient->name}}"
                                            editMobile="{{$patient->mobile}}"
                                            editAge="{{$patient->age}}"


                                    >Edit</button>
                                    <button data-file-id="{{$patient->id}}" style="margin-right: 5px" type="button" class="btn btn-danger btn-delete">Delete</button>
                                    <a href="{{url('manageSession/'.$patient->id)}}"><button style="margin-right: 5px" type="button" class="btn btn-primary">Sessions</button></a>
                                </div>
                            </td>
                        </tr>

                        @endforeach

                    </table>
                </div>
                    <!-- /.box-body -->

            </div>

        </section>

        <div class="modal fade" id="myModalDelete" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title font">Delete Patients</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you Sure you want to delete this Patient?</p>
                        <div style="margin-left: 70px">
                            <button type="button" class="btn btn-info btn-yes" data-dismiss="modal">Yes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title font">Update</h4>
                    </div>
                    <div class="modal-body">

                        <form role="form" id="update" method="post" action="{{url('/editPatient')}}">
                            {{csrf_field()}}
                            <div class="box-body">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Full Name *</label>
                                    <input type="text" class="form-control"  placeholder="Full Name" id="name"  name="name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Age *</label>
                                    <input type="text" class="form-control"  placeholder="Age" id="age"  name="age">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile</label>
                                    <input type="text" class="form-control"  placeholder="Enter Mobile Number" id="mobile"  name="mobile">
                                </div>

                                <input type="hidden"  id="patientId"  name="patientId" value="">
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <div id="myModalAddSession" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width:750px;">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4  id="patientNames" class="modal-title font"> </h4>
                    </div>
                    <div class="modal-body">

                        <form role="form" id="addSessionsForm" method="post" action="{{url('/addSession')}}">
                            {{csrf_field()}}
                            <div class="box-body">

                                <div class="row">

                                    <!-- /.col -->
                                    <div class="col-md-12  ">
                                        <div class="form-group">
                                            <label><font size="4">Diagnosis *</font></label>
                                            <textarea class="form-control" id="diagnosis" name="diagnosis" placeholder="Enter  Diagnosis" cols="60" rows="10" required></textarea>

                                            <span id="err" style="float: left ;color: red; visibility: hidden"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>Diagnosis Field is Required</b></span>

                                        </div>
                                        <!-- /.form-group -->

                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>


                                <div style="margin-top: 50px" class="row">

                                    <!-- /.col -->
                                    <div class="col-md-12  ">
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
                                            <br>
                                            <div class="row">

                                                <!-- /.col -->
                                                <div class="col-md-8  col-md-offset-2">
                                                    <h4 class="font"><b style="color:red">OR</b> Write specific Medical and press add Button</h4>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <br>
                                            <div class="row">

                                                <!-- /.col -->
                                                <div class="col-md-8  col-md-offset-2">
                                                    <div  class="col-md-10 ">
                                                        <div class="form-group">
                                                            <label><font size="4">Medical</font></label>
                                                            <textarea class="form-control" id="medical"  placeholder="Enter  Medical"   cols="30" rows="5"></textarea>

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


                                <input type="hidden" id="patientIds"  name="patientId" value="">
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

                            <div class="box-footer">
                                {{--<button type="submit" class="btn btn-primary">Update</button>--}}
                            </div>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@section('js')

    <script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });

        $(function () {

            $('#patientTable').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        })

        $(document).ready(function(){
            // var fileID;
            var url = "/patientDelete/";
            $('.btn-delete').click(function(){

                $('#myModalDelete').modal('show');
                url= url+ $(this).data('file-id')
            });


            $(".btn-yes").click(function (e) {

                window.location = url;
            });

            $(".addPatient").click(function (e) {


                 // alert($("#patientNames").text());
                $("#patientIds").val($(this).attr('patientId'));

                $("#patientNames").text('Add Session to Patient '+$(this).attr('patientName'));
                $('#myModalAddSession').modal('show');
            });


            $('.editShow').click(function(){

                $('#myModal').modal('toggle');


                var id = $(this).attr('editID');
                var editName = $(this).attr('editName');
                var editAge = $(this).attr('editAge');
                var editMobile = $(this).attr('editMobile');


                $("#name").val(editName);
                $("#age").val(editAge);
                $("#mobile").val(editMobile);
                $("#patientId").val(id);


            });

            var items = $("#list");
            var medicals = [];
            $('#addBtn1,#addBtn2').click(function()
            {

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

                    document.getElementById('addSessionsForm').submit();
                }
                else
                {
                    document.getElementById("err").style.visibility="visible";
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }


            });
        });
    </script>


@endsection
@endsection