@extends('layouts.master')

@section('content')
<style>
    hr { 
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1.8px;
} 
.border-bottom{
    border-bottom-color: aqua !important;
}
</style>


<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Pengesahan Pengguna Baharu</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    </div> <!-- end col -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card card-h-100">
                                <div class="d-flex card-header justify-content-between align-items-center">
                                    <h4 class="header-title">SENARAI PENGGUNA BAHARU JPS</h4>
                                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-printer" style="font-style:normal"></i>
                                          </a>      
                                </div>
                                <div>

                                </div>
                                <div>
                                <button style="margin-bottom: -8px;" onclick="jps_user()" class="btn btn-white col-3 col-lg-1  btn-sm  border-bottom text-black"><strong>JPS</strong></button>
                                <button style="margin-bottom: -8px;" onclick="agensi_user()" class="btn btn-white text-info btn-sm">AGENSI LUAR</button>
                                </div>
                                <hr><br>
                                <div class="card-body pt-0">
                                    <table id="jps_user" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No. Kod Pengenalan</th>
                                            <th>Emel</th>
                                            <th>Jabatan</th>
                                            <th>Jawatan</th>
                                            <th>No. Telefon</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    </table>
                                </div> <!-- end card-body-->
                                <div class="card-body pt-0">
                                    <table id="agensi_user" class="display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No. Kod Pengenalan</th>
                                            <th>Emel</th>
                                            <th>Jabatan</th>
                                            <th>Jawatan</th>
                                            <th>No. Telefon</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    </table>
                                </div> <!-- end card-body-->
                                
                            </div> <!-- end card-->

                        </div> <!-- end col -->
                    </div>
            <!-- end row -->
        </div>
    </div>
</div>

@endsection
   
@section('scripts')

<script type="text/javascript">
  $(function () {

    $('#agensi_user').hide();
    $('#jps_user').show();
    $('#jps_user_wrapper').show();
    $('#agensi_user_wrapper').hide();
    
    var table = $('#jps_user').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('user-verification.list') }}",
        columns: [
            {data: 'name', name: 'name', orderable: true, searchable: true},
            {data: 'no_kod', name: 'nama', orderable: true, searchable: true},
            {data: 'email', name: 'emel', orderable: true, searchable: true},
            {data: 'jabatan', name: 'jabatan', orderable: true, searchable: true},
            {data: 'jawatan', name: 'jawatan', orderable: true, searchable: true},
            {data: 'no_telefon', name: 'no_telefon', orderable: true, searchable: true},
            {
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: true
            },
        ]
    });
    
  });

  function jps_user(){
        $('#agensi_user').hide();
        $('#jps_user').show();
        $('#jps_user_wrapper').show();
    $('#agensi_user_wrapper').hide();
        $(document).ready(function () {
            var table = $('#jps_user').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,

                    ajax: "{{ route('user-verification.list') }}",
                    columns: [
                        {data: 'name', name: 'nama', orderable: true, searchable: true},
                        {data: 'no_kod', name: 'nama', orderable: true, searchable: true},
                        {data: 'email', name: 'emel', orderable: true, searchable: true},
                        {data: 'jabatan', name: 'jabatan', orderable: true, searchable: true},
                        {data: 'jawatan', name: 'jawatan', orderable: true, searchable: true},
                        {data: 'no_telefon', name: 'no_telefon', orderable: true, searchable: true},
                        {
                            data: 'action', 
                            name: 'action', 
                            orderable: false, 
                            searchable: true
                        },
                    ]
        });
            
        })

    }
    function agensi_user(){
        $('#agensi_user').show();
        $('#jps_user').hide();
        $('#jps_user_wrapper').hide();
    $('#agensi_user_wrapper').show();
        $(document).ready(function(){
            var table = $('#agensi_user').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "{{ route('user-verification.list') }}",
                columns: [
                    {data: 'name', name: 'nama', orderable: true, searchable: true},
                    {data: 'no_kod', name: 'nama', orderable: true, searchable: true},
                    {data: 'email', name: 'emel', orderable: true, searchable: true},
                    {data: 'jabatan', name: 'jabatan', orderable: true, searchable: true},
                    {data: 'jawatan', name: 'jawatan', orderable: true, searchable: true},
                    {data: 'no_telefon', name: 'no_telefon', orderable: true, searchable: true},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: false, 
                        searchable: true
                    },
                ]
            });
        })
    }
</script>
@endsection
