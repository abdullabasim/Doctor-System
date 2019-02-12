
@extends('layouts.default')
@section('title')
    Manage Session
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
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title font">Manage Sessions for Patient : <b style="color: #3c8dbc">{{$patient->name}}</b></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    @include('alertNotifications/alertNotifications')
                    <table   id="patientTable" class="table table-bordered table-striped">
                        <thead>
                        <tr style="color:#3c8dbc">

                            <th><font size="3">Session ID</font></th>
                            <th><font size="3">Diagnosis</font></th>
                            <th><font size="3">Date</font></th>
                            <th><font size="3">Show and Edit Medicals</font></th>
                            <th><font size="3">Add Examination</font></th>
                            <th><font size="3">Manage Examination</font></th>
                            <th><font size="3">Manage</font></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sessions as $session)

                        <tr>
                            <td><font size="3">{{$session->id}}</font></td>
                            <td id="diagnosise" title="{{$session->diagnosis}}"> <font size="3">{{str_limit($session->diagnosis,50)}}</font></td>
                            <td class=" "><font size="3">{{ Carbon\Carbon::parse($session->created_at)->format('d/m/Y')}}</font></td>
                            <td><button  type="button" sessionId="{{$session->id}}" class="btn btn-success medicals">show & edit</button></td>
                            <td><button  type="button" sessionId="{{$session->id}}" class="btn btn-warning addExamination ">Add</button></td>
                            @if(App\Helper\Helper::examinationCheck($session->id) == "yes")
                            <td><button  type="button" sessionId="{{$session->id}}" class="btn btn-success  showExaminations ">Show</button></td>
                            @else
                                <td>No Examinations</td>
                            @endif
                            <td>
                                <div class="btn-group">
                                    <button style="margin-right: 5px" type="button" sessionId="{{$session->id}}" class="btn btn-warning editShow medicals" >Edit</button>
                                    <button data-session-id="{{$session->id}}" data-patient-id="{{$patient->id}}" style="margin-right: 5px" type="button" class="btn btn-danger btn-delete">Delete</button>
                                    <a href="{{url('prescriptionPrint/'.$session->id)}}"><button style="margin-right: 5px" type="button"  class="btn btn-primary " >Print</button></a>
                                </div>
                            </td>
                        </tr>

                        @endforeach

                    </table>
                </div>
                    <!-- /.box-body -->

            </div>

        </section>


        <div id="myModalMedical" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title font">Show and Edit Diagnosis & Medicals</h4>
                    </div>
                    <div class="modal-body">

                        <form role="form" id="update" method="post" action="{{url('/editMedical')}}">
                            {{csrf_field()}}
                            <div id="section" class="box-body">



                            </div>
                            <!-- /.box-body -->
                            <input type="hidden"  id="patientIds"  name="patientId" value="{{$patient->id}}">
                            <input type="hidden"  id="sessionIds"  name="sessionId" value="">
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

        <div id="myModalAddExam" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title font">Add Examination</h4>
                    </div>
                    <div class="modal-body">

                        <form role="form" id="update" method="post" action="{{url('/addExamination')}}">
                            {{csrf_field()}}
                            <div  class="box-body">

                               <div class="row">

                                <!-- /.col -->

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input  type="text" required name="title" class="form-control input-lg " value="{{old('title')}}"  placeholder="Enter Examination Title">

                                        @if($errors->first('title'))
                                            <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>{{ $errors->first('title') }}</b></span>
                                        @endif

                                    <!-- /.form-group -->

                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>

                                <div class="row">

                                    <!-- /.col -->


                                            <div class="form-group">
                                                <label>Descriptions</label>
                                                <textarea required class="form-control" id="desc" name="desc"  placeholder="Enter Examination for {{$patient->name}} Patient"   cols="30" rows="5"></textarea>

                                                @if($errors->first('desc'))
                                                    <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>{{ $errors->first('desc') }}</b></span>
                                                @endif




                                        <!-- /.form-group -->

                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>

                            <input type="hidden"  id="sessionsId"  name="sessionId" value="">
                            <input type="hidden"    name="patientId" value="{{$patient->id}}">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <div id="myModalEditExam" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title font">Edit Examination</h4>
                    </div>
                    <div class="modal-body">

                        <form role="form" id="update" method="post" action="{{url('/editExamination')}}">
                            {{csrf_field()}}
                            <div  class="box-body">

                                <div class="row">

                                    <!-- /.col -->

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input  type="text" required name="title" id="editTitleExam" class="form-control input-lg " value="{{old('title')}}"  placeholder="Enter Examination Title">

                                        @if($errors->first('title'))
                                            <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>{{ $errors->first('title') }}</b></span>
                                    @endif

                                    <!-- /.form-group -->

                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>

                                <div class="row">

                                    <!-- /.col -->


                                    <div class="form-group">
                                        <label>Descriptions></label>
                                        <textarea required class="form-control" id="editDescExam" name="desc"  placeholder="Enter Examination for {{$patient->name}} Patient"   cols="30" rows="5"></textarea>

                                        @if($errors->first('desc'))
                                            <span style="float: left ;color: red"  class="help-block"><i class="fa fa-times-circle-o"></i> <b>{{ $errors->first('desc') }}</b></span>
                                    @endif




                                    <!-- /.form-group -->

                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>

                            <input type="hidden"  id="sessionIdExamEdits"  name="sessionId" value="">
                            <input type="hidden"    name="patientId" value="{{$patient->id}}">
                            <input type="hidden"  id="examId"  name="examId" value="">
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

        <div id="myModalShowExam" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width:1000px;">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Examination</h4>
                    </div>
                    <div class="modal-body">

                        <table id="examinationTable" class="table table-bordered table-striped">
                            <thead >
                            <tr>

                                <th>Examination ID</th>
                                <th>Title</th>
                                <th>Descriptions</th>
                                <th>Date</th>
                                <th>Manage</th>

                            </tr>
                            </thead>
                            <tbody id="examTable">


                        </table>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default  " data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <div id="myModalDelete" class="modal fade"  role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title font">Delete Session</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you Sure you want to delete this Session?</p>
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

        <div id="myExamDeletes" class="modal fade"  role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title font">Delete Examination</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you Sure you want to delete this Examination?</p>
                        <div style="margin-left: 70px">
                            <button type="button" class="btn btn-info btn-exam-yes" data-dismiss="modal">Yes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                    </div>
                    <div class="modal-footer">

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
            $('#examinationTable').DataTable({
                'paging'      : false,
                'lengthChange': true,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })



        })
        var urlExam = "/examinationDelete/";
        $(document).ready(function(){
            // var fileID;
            var url = "/sessionDelete/";

            $('.btn-delete').click(function(){

                $('#myModalDelete').modal('show');
                url= url+ $(this).data('session-id') +'/'+$(this).data('patient-id')
            });




            $(".addExaminationss").click(function (e) {

                $('#myModalEditExam1').modal('show');
            });

            $(".btn-yes").click(function (e) {

                window.location = url;
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
        });

        $(".medicals").click(function (e) {

            var sessionId = $(this).attr('sessionId');
            var items = $("#section");
            var sessionId = $(this).attr('sessionId');
            var dignosis = $('#diagnosise').attr('title');

            $("#sessionIds").val(sessionId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                sessionId:sessionId ,

            }



            $.ajax({

                type: "get",
                url: "/getMedicals",
                data: formData,
                dataType    : 'json',
                success: function (data) {

                    console.log(data[0]);
                    key = 1;
                    document.getElementById('section').textContent = '';

                    items.append(' <div class="form-group">\n' +
                        '                                    <label for="exampleInputEmail1">Diagnosis</label>\n' +
                        '                                                                    <textarea required class="form-control" id="diagnosis" name="diagnosis" placeholder="Enter Diagnosis" cols="60" rows="10" required>'+dignosis+'</textarea>\n' +
                        '                                </div>');



                    var item ="";
                    for (var i in data)
                    {
                      item = data[i];
                    items.append(' <div class="form-group">\n' +
                        '                                    <label for="exampleInputEmail1">Medical Item '+ key +'</label>\n' +

                        '                                   <textarea required class="form-control"  name="medicals[]" placeholder="Enter Medical name" cols="60" rows="1" required>'+item+'</textarea>\n' +
                        '                                </div>');

                       key = key +1;
                    }
                    $('#myModalMedical').modal('toggle');


                },
                error: function (data) {


                    console.log(data);

                }
            });

        });

        $(".addExamination").click(function (e) {

            var sessionId = $(this).attr('sessionId');

            $("#sessionsId").val(sessionId);

            $('#myModalAddExam').modal('toggle');
        });

        $(".showExaminations").click(function (e) {

            var sessionId = $(this).attr('sessionId');

           //  alert(sessionId);
           // $("#sessionIdExamEdit").val(sessionId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                sessionId:sessionId ,
            }



            $.ajax({

                type: "get",
                url: "/getExamination",
                data: formData,
                dataType    : 'json',
                success: function (data) {

                    var items = $("#examTable");
                     if( JSON.stringify(data) !== '{}')
                     {
                //      alert(data[1]['title']);
                      console.log(data);
                         var printUrl = "";
                         var desc = ""
                         $("#examTable  tr").remove();
                         for(var i in data)
                      {
//                          alert(data[i]['desc'].length);
//
//                          for(var j1=0; j1 < data[i]['desc'].length; j1++)
//                          {
//
//                              data[i]['desc'] = data[i]['desc'].replace(/n/g, '&nbsp;');
//                        //      data[i]['desc'] = data[i]['desc'].replace('\\n', '\\n');
//
//
//                          }



//                          for(var j=0; j < data[i]['title'].length; j++)
//                          {
//
//                              data[i]['title'] = data[i]['title'].replace(" ", "\u00a0");
//
//                          }

                        //  alert(data[i]['title']);
                           printUrl = "examinationPrint/" + data[i]['id'];
                          items.append(
                              '  <tr>\n' +
                              '                                <td>'+data[i]['id'] +'</td>\n' +
                              '                                <td>'+data[i]['title']+'</td>\n' +
                              '                                <td>'+data[i]['desc']+'</td>\n' +
                              '                                <td>'+data[i]['created_at']+'</td>\n' +
                              '                                <td>\n' +
                              '                                <div class="btn-group">\n' +
                              '                                    <button  style="margin-right: 5px;white-space: pre-wrap;" examId = '+data[i]['id']+' data-exam-desc=""  examTitle = '+data[i]['title']+'   examDesc = '+data[i]['desc']+' sessionsIds='+data[i]['session_id']+'  id="editExamination" type="button"  class="btn btn-warning  editExamination" data-dismiss="modal" >Edit</button>\n' +
                              '                                    <button data-examination-id='+data[i]['id']+'  id ="examinations"  type="button" class="btn btn-danger btn-delete-examinations" data-dismiss="modal"  style="margin-right: 5px"   >Delete</button>\n' +
                              '                                   <a href='+printUrl+' > <button     type="button" class="btn btn-primary "   style="margin-right: 5px"   >Print</button></a>\n' +

                              '                                </div>\n' +
                              '                                </td>\n' +
                              '                            </tr>');


//                             $('#examinationTable tr:last .editExamination:last').attr('exam-desc',data[i]['desc']);
//                             alert( $('#examinationTable tr:last .editExamination:last').attr('exam-desc'));
//
//                        $("#editTitleExam").val(data[i]['title']);
//
//                        $("#editDescExam").val(data[i]['desc']);
//
//                        $("#examId").val(data[i]['id']);

                      }
                    $('#myModalShowExam').modal('toggle');
                     }

                },
                error: function (data) {


                    console.log(data);

                }
            });

        });

        $(".btn-exam-yes").click(function (e) {

            window.location = urlExam;
        });

        $(document).on("click", "#examinations", function(){

            $('#myExamDeletes').modal('show');
            urlExam= urlExam+ $(this).data('examination-id')
        });

        $(document).on("click", "#editExamination", function(){



            $("#editTitleExam").val($(this).attr('examTitle'));

            $("#editDescExam").val($(this).attr('examDesc'));

            $("#sessionIdExamEdits").val($(this).attr('sessionsIds'));

            $("#examId").val($(this).attr('examId'));

            $('#myModalEditExam').modal('show');

        });


        $("#toggles").trigger('click') //trigger its click

    </script>


@endsection
@endsection