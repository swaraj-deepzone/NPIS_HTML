
@extends('layouts.master')

@section('content')
<style>
.close{
    text-align: end !important;
}
</style>

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right" style="font-size:10px;">
                                <a href="javascript: void(0);">
                                       <i class="mdi mdi-earth" style="font-style:normal">Geo-board ></i>
                                 </a>
                                 <a href="javascript: void(0);" style="font-style:normal">
                                       Pentadbir >
                                 </a>
                                       Profil Pengguna 
                        </div>
                        <h4 class="page-title">Profil Pengguna</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 justify-content-center">
                    <div class="card text-center p-5">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                        <div class="rounded-circle">
                            <img src="" id="gambar_image" class="border w-25 align-self-center rounded-circle" alt="...">
                        </div>
                        <h5>
                            <label id="nama"></label>
                            <br>
                            <label id="user_data_type"></label>
                        </h5>  
                        <button class="btn btn-success col-lg-6 col-md-3 mb-3 align-self-center" id="active">
                           <label> Aktif </label>
                        </button>
                        <button class="btn btn-danger col-lg-6 col-md-3 mb-3 align-self-center" id="inactive">
                           <label> Tidak Aktif </label>
                        </button>
                           
                        <label>Jurutera Awam</label>   
                        <label>Jabatan Pengiran dan saliran(JPS)</label>
                        <label>Bahagian Korporat(BKOR)</label>                       
                    </div> <!-- end card-->
                    <div class="card text-center">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <div>
                                <div class="rounded-circle d-flex">
                                    <img src="myfile.png" width="10%" class="border align-self-center rounded-circle">
                                    <label class="header-title align-self-center p-1">PERANAN</label>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-success btn-sm d-flex"><i class="fa-solid fa-plus"></i> Peranan</button>
                            </div>
                        </div>                   
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-xl-8 col-lg-8 justify-content-center">
                    <div class="card card-h-100 p-3">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <div>
                                <div class="rounded-circle d-flex">
                                    <h4 class="header-title align-self-center p-1"> <i class="mdi mdi-account"> </i> PROFIL</h4>
                                </div>
                            </div>
                            <div>
                            <button class="btn btn-sm btn-info"> <i class="mdi mdi-printer" style="font-style:normal"></i></button>
                            </div>
                        </div>
                        <div>
                        <form action="" method="post" id="update_user_form" name="myform">
                        <input type="hidden" id="api_url" value={{env('API_URL')}}>
                        <input type="hidden" id="user_type" value="table_users">
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="nama" class="text-primary">Nama</label>
                                <input type="text" class="form-control" id="name" placeholder="">
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                <label for="no_kod_penganalan" class="text-primary">No. Kad Pengenalan</label>
                                <input type="text" class="form-control" id="no_kod_penganalan" placeholder="">
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="no_telefon" class="text-primary">No Telefon</label>
                                <input type="text" class="form-control" id="no_telefon" placeholder="">
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                <label for="emel_rasmi" class="text-primary">Emel Rasmi</label>
                                <input type="text" class="form-control" id="emel_rasmi" placeholder="">
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="jawatan" class="text-primary">Jabatan</label>
                                <select id="jawatan" class="form-control">
                                </select>
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                <label for="gred" class="text-primary">Gred</label>
                                <select id="gred" class="form-control">
                                </select>
                                </div>
                            </div>
                            <!-- <div class="form-group" style="padding-right:15px; margin-bottom:12px;">
                                <label for="kementerian"  class="text-primary">Kementerian</label>
                                <select id="kementerian" class="form-control">
                                </select>
                            </div> -->
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="Jabatan" class="text-primary">Jawatan</label>
                                <select id="Jabatan" class="form-control">
                                </select>
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                    <label for="bahagian" class="text-primary">Bahagian</label>
                                    <select id="bahagian" class="form-control">
                                    </select>
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="negeri" class="text-primary">Negeri</label>
                                <select id="negeri" class="form-control">
                                </select>
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                <label for="daerah" class="text-primary">Doerah</label>
                                <select id="daerah" class="form-control">
                                </select>
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between">
                                <div class="form-group col-md-6" id="profile">
                                <label for="inputEmail4" class="text-primary">Status</label>
                                <select id="inputState" class="form-control">
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>                                
                                </select>
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                <label for="catatan" class="text-primary">Catatan</label>
                                <textarea class="form-control" rows="5" id="catatan"></textarea>
                                </div>
                            </div>
                            <div class="form-row d-md-flex justify-content-between" id="doku_sec" style="display:none !important;">
                                <div class="form-group col-md-6" id="profile">
                                    <label  class="text-primary">Dokumen Sokongan</label><br>
                                    <span><a target="blank" href="" id="document_url"><img src="pdf_image.png"width="10%"></a></span>
                                </div>
                                <div class="form-group col-md-6" id="profile">
                                </div>
                            </div>
                            <div class=" text-center p-3">
                                <button type="button" class="back btn btn-danger">kemboli</button>
                                <button type="button" class="save btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div> <!-- end card-->
                </div>
            <!-- end row -->
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <div class="card  mb-0">
                <button type="button" class="close border-0 bg-white text-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <div class="modal-body text-center" id="user_pop-up" style="display:none;">
                        Maklumat anda berjaya disimpan
                        <div class="p-1">
                            <button class="btn btn-primary btn-sm col-2 close">Tutup</button>
                        </div>
                    </div>
                    <div class="modal-body text-center" id="tmp_user_pop-up" style="display:none;">
                        pengesahan pengguna telah bergaja
                        <div class="p-1">
                            <button class="btn btn-primary btn-sm col-2 close">Tutup</button>
                        </div>
                    </div>
                <div>
                </div>               
            </div> <!-- end card-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
   <script src="assets/js/profile.js"></script>
@endsection


