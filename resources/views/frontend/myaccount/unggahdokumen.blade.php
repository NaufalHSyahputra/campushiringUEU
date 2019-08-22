@extends('frontend.layouts.main')
@section('content')
<!-- section page  start -->
<div class="jbm-page-title page-title-bg-2 margin-bottom-80">
    <div class="container">
         <div class="row">
            <div class="col-xs-12 text-center">
                <span class="section-tit-line"></span>
                    <h2><span class="fw-400">Akun</span>
                    Saya</h2>
            </div>
        </div>
    </div>
</div>

<!-- employer dashboard -->
<div class="jbm-emp-dashboard pad-xs-top-60">
    <div class="container">
        <div class="row margin-bottom-100">
            <!-- right section -->
                <div class="col-md-8 col-sm-12 col-xs-12 pull-right">
                    <div class="payment-history">
                        <h4>Kelola Dokumen</h4>
                        <span class="section-tit-line-2 margin-bottom-40"></span>

                        <div class="job-posted padding-bottom-20 table-sm-setting">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-8 col-sm-12 col-xs-12">
                                    <h5 class="margin-bottom-40">List Dokumen</h5>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <a href="#" class="jbm-button jbm-button-3 btn" data-toggle="modal" data-target="#myModal">Unggah Dokumen</a>
                                    </div>
                                </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Kategori File</td>
                                        <td>Nama File</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dokumens as $i => $dokumen)
                                    <tr>
                                            <td>{{ $i+1 }}</td>
                                            <td>{{ $dokumen->tbldokumen_mst->doc_desc }}</td>
                                            <td><a href="{{ url('/').'/document/mahasiswa/'.$dokumen->doc_file }}">{{ $dokumen->doc_file }}</a></td>
                                            <td><span class="delete margin-bottom-20 delbutton" data-url="{{ route('myaccount.dokumen.delete', $dokumen->mhs_doc_id) }}"><i class="fa fa-trash"></i></span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div><!--job-posted end-->
                    </div>
                </div>
            <!-- right section -->
            <!-- Emp sidebar -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="jbm-emp-sidebar padding-bottom-30 padding-top-30">
                        <ul class="jbm-dashboard-links">
                            <li>
                                <a href="{{ route('myaccount.index') }}">Informasi Akun</a>
                            </li>
                            <li>
                                <a href="{{ route('myaccount.riwayat') }}">Riwayat Lamaran Pekerjaan</a>
                            </li>
                            <li>
                                <a href="{{ route('myaccount.dokumen.index') }}" class="active">Unggah Dokumen</a>
                            </li>
                            <li>
                                <a href="{{ route("myaccount.index") }}">Ubah Password</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            <!-- Emp sidebar -->
        </div>
        <hr>
    </div>

</div>
<!-- employer dashboard -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Unggah Dokumen</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger">CV, Transkrip Nilai, dan Ijazah hanya bisa diupload 1 kali. Silahkan hapus terlebih dahulu untuk memperbaharui.</div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('myaccount.dokumen.save') }}">
            @csrf
                    <p>Kategori Dokumen</p>
                    <div class="form-group">
                        <select class="form-control" name="doc_id" id="doc_id">
                            @foreach ($mstdocs as $mstdoc)
                                <option value="{{ $mstdoc->doc_id }}">{{ $mstdoc->doc_desc }}</option>
                            @endforeach
                        </select>
                    </div>


                            <p>File (PDF,JPG,PNG,GIF,JPEG)</p>
            <div class="form-group">
                    <input type="file" name="doc_file" id="doc_file" class="form-control" required>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script src="{{ asset('frontend_assets/js/chain.min.js') }}"></script>
<script>
    $(document).on("click",".delbutton",function(){
        let url = $(this).attr('data-url');
        let confirmation = confirm("Yakin ingin menghapus data ini ?");
        if(confirmation){
            window.location.href = url;
        }else{

        }
    });

</script>
@endsection
