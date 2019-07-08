<div class="jbm-search-bar jbm-search-1">
    <div class="container">
    <form action="search" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="jbm-sch-inner margin-top-85-minus">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Cari Kata Kunci" />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="jbm-s-category jbm-select-search" name="kotaID" id="jbm-s-category">
                                    <option value="" selected>--Pilih kota--</option>
                                    @foreach ($kotas as $kota)
                                        <option value="{{ $kota->kota_id }}">{{ $kota->kota_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <select class="jbm-s-category jbm-select-search fakultasID" name="fakultasID" id="jbm-s-category fakultasID">
                                            <option value="" selected>--Pilih Fakultas--</option>
                                            @foreach ($fakultass as $fakultas)
                                                <option value="{{ $fakultas->fakultas_id }}">{{ $fakultas->fakultas_name }}</option>
                                            @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                    <select class="jbm-s-category jbm-select-search skillID" name="skillID" id="jbm-s-category skillID">
                                            <option value="" selected>--Pilih posisi pekerjaan--</option>
                                            @foreach ($skills as $skill)
                                                <option value="{{ $skill->skill_id }}" class="{{ $skill->fakultas_id }}">{{ $skill->skill_name }}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <select class="jbm-s-year jbm-select-hide-search" name="lowTypeID" id="jbm-s-year" style="width: 100%;">
                                        <option value="" selected>--Pilih level pekerjaan--</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->low_type_id }}">{{ $level->low_type_desc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                        <input type="text" class="form-control" id="gajiMin" name="gajiMin" placeholder="Masukkan Gaji Minimal yang diinginkan" />

                                    </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                                    <div class="form-group ">
                                        <input type="submit" class="form-control" id="search-btn" name="search" value="Cari Pekerjaan" />
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
