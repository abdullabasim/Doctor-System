<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prescription</title>
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- NProgress -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  </head>
  <style>
    body {
      background: rgb(204,204,204);
    }
    page[size="A4"] {
      background: white;
      width: 21cm;
      height: 29.7cm;
      display: block;
      margin: 0 auto;
      margin-bottom: 0.5cm;
      box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);

    }
    @media print {
      body, page[size="A4"] {
        margin: 0;

      }
    }
  </style>

  <style>
    @font-face {
      font-family: 'AraJozoor-Regular';
      src: url({{ url('font/AraJozoor-Regular.eot')}});
      src: local('☺'), url('{{ url('font/AraJozoor-Regular.woff')}}') format('woff'), url('{{ url('font/AraJozoor-Regular.ttf')}}') format('truetype'), url('{{ url('font/AraJozoor-Regular.svg')}}') format('svg');
      font-weight: normal;
      font-style: normal;
    }
    .font,body {
      font-family: 'AraJozoor-Regular',Sans-Serif !important;
    }

    #rcorners {
      border-radius: 10px;
      border: 2px solid red;

      width: 350px;
      height: 70px;

    }

  </style>
  <body onload="window.print(); history.go(-1);" >
  <div class="container">
  <page size="A4"  >


      <div style="background:transparent !important" class="jumbotron">
        <h1 style="margin-left: 350px;color: red">عبدالله باسم خضير</h1>

        <div style="margin-left: 320px" id="rcorners"><h3 style="text-align:center">أخصائي أنف - أذن - جنجرة</h3></div>
        <div style="margin-left: 370px;margin-bottom: -10px" ><h3 >دكتوراه في الجراحة العام </h3></div>
        <div style="margin-left: 390px" ><h3 >دار النجاه  - حياه الراهبات</h3></div>
        <div style="margin-left: 405px;margin-bottom: -10px" ><h3 >M. B. Ch. B.,D.,G.</h3></div>
        <div style="margin-left: 450px" ><h3 >OFICOG</h3></div>
        <hr style="margin-left: 200px" >

        <h4 style="float: right !important;margin-right: -185px">  أسم المريض : {{$examination->session->patient->name}}  </h4>
        <h4 style="float: left"> {{$examination->session->patient->age}} : العمر </h4>
        <br>
        <br>
        <h4 style="float: right !important;margin-right: -185px">{{date('Y/m/d')}} : التاريخ </h4>

        <ul style="margin-top: 70px">

             <li style="padding: 10px"><font size="4">{{$examination->desc}}</font></li>

        </ul>



      </div>










  </page>

    <footer  STYLE="margin-top: 120px !important;" class="page-footer font-small blue pt-4 mt-4">

      <!--Footer Links-->
      <div class="container-fluid text-center text-md-left">
        <div class="row">
          <hr size="30">
          <!--First column-->
          <div style="text-align: right !important;float: right !important;" class="col-md-6">

            <p >بغداد - حي المستنصرية - شارع الصخرة </p>
            <p style="margin-right: 20px" >مثابل كلية النخبة الجامعة </p>
            <p style="margin-right: 20px">موبايل :07709253410 </p>
          </div>
          <!--/.First column-->

          <!--Second column-->

          <!--/.Second column-->
        </div>
      </div>
      <!--/.Footer Links-->



    </footer>
  </div>
  <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  {{--<script src="../vendors/fastclick/lib/fastclick.js"></script>--}}
  {{--<!-- NProgress -->--}}

  </body>
</html>
