@extends('layouts.master')
   @section('content')
   <?php header('Access-Control-Allow-Origin: *'); ?>

      <div class="content-page ScrollStyle">
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
                                       Daftar Pengguna Bhaharu 
                           </div>
                           <h4 class="page-title">Daftar Pengguna Bhaharu</h4>
                     </div>
                  </div>
                  <form action="" method="post" id="create_user_form" name="myform">
                     <input type="hidden" id="api_url" value={{env('API_URL')}}>
                  <div class="row">
                     <div class="col-xl-12 col-lg-12">
                                <div class="card card-h-100">
                                    <div class="d-flex card-header justify-content-between align-items-center">
                                        <h6><i class="mdi mdi-account-plus"> </i>  DAFTAR BAHARU</h6>
                                          <!-- <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                                <i class="mdi mdi-printer" style="font-style:normal"></i>
                                          </a>                                    -->
                                    </div>
                                    <div class="card-body pt-0">

                                    <div class="kategori">
                                          <label style="padding-bottom:10px;">Kategori Pengguna </label><br>
                                          <input type="radio" id="pengguna_jps" name="kategori" value="1" checked>
                                          <label class="diff-category" for="pengguna_jps"><b>Pengguna JPS</b></label><br>
                                          <input type="radio" id="agensi_luar" name="kategori" value="2">
                                          <label class="diff-category" for="agensi_luar"><b>Agensi Luar</b></label>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Nama</label><br>
                                        <input class="form-control" type="text" name="nama" id="name">
                                        <span class="error" id="error_name"></span>
                                       </div>
                                       <div class="col-md-6">
                                        <label>No Kod penganalan</label><br>
                                        <input class="form-control" type="text" name="no_kod_penganalan" id="no_kod_penganalan"> 
                                        <span class="error" id="error_no_kod_penganalan"></span>
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Emel Rasmi</label><br>
                                        <input class="form-control" type="email" name="emel_rasmi" id="emel_rasmi">
                                        <span class="error" id="error_email"></span>
                                       </div>
                                       <div class="col-md-6">
                                        <label>No. Telefon</label><br>
                                        <input class="form-control" type="text" name="no_telefon" id="no_telefon"> 
                                        <span class="error" id="error_telefon"></span>
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Jawatan</label><br>
                                          <select class="form-select" name="jawatan" id="jawatan">
                                          </select>
                                       </div>
                                       <div class="col-md-6">
                                        <label>Gred</label><br>
                                          <select class="form-select" name="gred" id="gred">
                                          </select>
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-12">
                                        <label>Kementerian</label><br>
                                        <select class="form-select form-control-light" name="kementerian" id="kementerian">
                                        </select>
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Jabatan</label><br>
                                          <select class="form-select form-control-light" name="Jabatan" id="Jabatan">
                                          </select>
                                       </div>
                                       <div class="col-md-6">
                                        <label>Bahagian</label><br>
                                        <select class="form-select" name="bahagian" id="bahagian">
                                          <option value=""> - Tidak Berkenan - </option>
                                          </select>                                       
                                       </div>
                                    </div>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                        <label>Negeri</label><br>
                                          <select class="form-select" name="negeri" id="negeri">
                                             <option value=""> - Tidak Berkenan - </option>
                                          </select>
                                       </div>
                                       <div class="col-md-6">
                                        <label>Daerah</label><br>
                                          <select class="form-select" name="daerah" id="daerah">
                                             <option value=""> - Tidak Berkenan - </option>
                                          </select>                                      
                                       </div>
                                    </div>
                                    <div class="row input-data">

                                       <div class="col-md-6">
                                          <label>Gambar Profil <h7 class="types">(jenis fail yang disyorkan: jpeg, png)</h7></label><br>
                                          <div class="drop-zone">
                                             <span class="drop-zone__prompt"><b><i class="mdi mdi-cloud-upload"></i> <br>Drop files here or click to upload<br><h6>(saiz fail tidak membiri 2 mb)</h6></b></span>
                                             <input type="file" name="myFile" id="myFile" class="drop-zone__input">
                                          </div>
                                          <span id="gambar_profile" style="display:none;color:red;"></span>
                                       </div>
                                       <input type="hidden" name="image_path" id="image_path" value="">
                                       <input type="hidden" name="image_name" id="image_name" value="">

                                       <div class="col-md-6" id="show-me">
                                          <label>Dokumen Sokongan  <h7 class="types">(jenis fail yang disyorkan: pdf, jpeg, docx, png)</h7></label><br>
                                          <div class="drop-zone_dokumen">
                                             <img id="doku_image_new" src="pdf_image.png"width="10%" style="display:none;"><label id="doku_label"></label>
                                             <span id="dokumen_span" class="drop-zone__prompt_dockumen"><b><i class="mdi mdi-cloud-upload"></i> <br>Drop files here or click to upload<br><h6>(saiz fail tidak membiri 2 mb)</h6></b></span>
                                             <input type="file" name="dockumen" id="dokumen" class="drop-zone__input_dokumen">
                                          </div>
                                          <div>
                                       </div>
                                          <span id="dokumen_error" style="display:none;color:red;"></span>
                                       </div>
                                       <input type="hidden" name="dokumen_path" id="dokumen_path" value="">
                                       <input type="hidden" name="dokumen_name" id="dokumen_name" value="">

                                       <div class="col-md-6">
                                          <label>Catatan</label><br>
                                          <textarea class="form-control"  rows="3" name="catatan"></textarea>
                                       </div>
                                    </div><br>
                                    <div class="row input-data">
                                       <div class="col-md-6">
                                       <button type="button" class="btn btn-danger" style="float:right">Kembali</button>
                                       </div>
                                       <div class="col-md-6">
                                       <button type="button" class="btn btn-primary" id="submit">Simpan</button>
                                       </div>
                                    </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                     </div>
                  </div>
                  </form>
               </div>
            </div>
            <!-- End Content-->
         </div>
      </div>
   @endsection

   @section('scripts')
   <script src="assets/js/main.js"></script>
   @endsection
