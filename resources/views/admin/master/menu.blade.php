@extends('layouts.main')

@section('title', 'Campus Hiring - Master Menu')

@section('title-section', 'Master Menu')

@section('content')
<div class="card">
        <div class="card-header">
            <h4>@yield('title-section')</h4>
            <a href="#" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1" width="100%">
                    <thead>
                        <tr>
                            <th>Menu ID</th>
                            <th>Nama Menu</th>
                            <th>Link To</th>
                            <th>Parent/Child</th>
                            <th>Parent ID</th>
                            <th>Parent ID2</th>
                            <th>Role</th>
                            <th>Visible</th>
                            <th>Icon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('modal')
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('admin.master.menu.save') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="menu_id">ID Menu</label>
                            <input type="text" class="form-control" name="menu_id">
                        </div>
                        <div class="form-group">
                            <label for="menu_desc">Nama Menu</label>
                            <input type="text" class="form-control" name="menu_desc">
                        </div>
                        <div class="form-group">
                            <label for="link_to">Link</label>
                            <input type="text" class="form-control" name="link_to">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Parent / Child</label>
                            <select name="is_parent_child" id="is_parent_child" class="form-control">
                                <option value="P">Parent</option>
                                <option value="C">Child</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent ID</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">null</option>
                                @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->menu_id }} - {{ $parent->menu_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="parent_id2">Parent ID 2 (Nested Parent)</label>
                            <select name="parent_id2" id="parent_id2" class="form-control">
                                <option value="">null</option>
                                @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->menu_id }} - {{ $parent->menu_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role ID</label>
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach ($roles as $role)
                                <option value="{{ $role->role_id }}">{{ $role->role_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_visible">Is Visible</label>
                            <select name="is_visible" id="is_visible" class="form-control">
                                <option value="1">true</option>
                                <option value="0">false</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" name="icon">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('admin.master.menu.update') }}">
                    <input type="hidden" name="id" id="id_edit" value="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perubahan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="menu_id">ID Menu</label>
                            <input type="text" class="form-control" name="menu_id" id="menu_id_edit">
                        </div>
                        <div class="form-group">
                            <label for="menu_desc">Nama Menu</label>
                            <input type="text" class="form-control" name="menu_desc" id="menu_desc_edit">
                        </div>
                        <div class="form-group">
                            <label for="link_to">Link</label>
                            <input type="text" class="form-control" name="link_to" id="link_to_edit">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Parent / Child</label>
                            <select name="is_parent_child" id="is_parent_child_edit" class="form-control">
                                <option value="P">Parent</option>
                                <option value="C">Child</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent ID</label>
                            <select name="parent_id" id="parent_id_edit" class="form-control">
                                <option value="">null</option>
                                @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->menu_id }} - {{ $parent->menu_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="parent_id2">Parent ID 2 (Nested Parent)</label>
                            <select name="parent_id2" id="parent_id2_edit" class="form-control">
                                <option value="">null</option>
                                @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->menu_id }} - {{ $parent->menu_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role ID</label>
                            <select name="role_id" id="role_id_edit" class="form-control">
                                @foreach ($roles as $role)
                                <option value="{{ $role->role_id }}">{{ $role->role_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_visible">Is Visible</label>
                            <select name="is_visible" id="is_visible_edit" class="form-control">
                                <option value="1">true</option>
                                <option value="0">false</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" name="icon" id="icon_edit">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
$('#table-1').dataTable({
    serverSide: true,
    processing: true,
    responsive: true,
    ajax: "{{ route('admin.master.menu.getdata') }}",
    "order": [
        [0, "asc"]
    ],
    columns: [{
            data: 'menu_id',
            name: 'tblmenu.menu_id'
        },
        {
            data: 'menu_desc',
            name: 'tblmenu.menu_desc'
        },
        {
            data: 'link_to',
            name: 'tblmenu.link_to'
        },
        {
            data: 'is_parent_child',
            name: 'tblmenu.is_parent_child'
        },
        {
            data: 'parent_id',
            name: 'tblmenu.parent_id'
        },
        {
            data: 'parent_id2',
            name: 'tblmenu.parent_id2'
        },
        {
            data: 'role_desc',
            name: 'tblrole.role_desc'
        },
        {
            data: 'is_visible',
            name: 'tblmenu.is_visible'
        },
        {
            data: 'icon',
            name: 'tblmenu.icon'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }
    ],
});
$(document).on("click", ".editbutton", function() {
    let data_id = $(this).attr('data-id');
    $.get('/admin/master/menu/get/' + data_id, function(data) {
        $("#id_edit").val(data.id);
        $('#menu_id_edit').val(data.menu_id);
        $('#menu_desc_edit').val(data.menu_desc);
        $('#link_to_edit').val(data.link_to);
        $('#is_parent_child_edit').val(data.is_parent_child);
        $('#parent_id_edit').val(data.parent_id);
        $('#parent_id2_edit').val(data.parent_id2);
        $('#role_id_edit').val(data.role_id);
        $('#is_visible_edit').val(data.is_visible);
        $('#icon_edit').val(data.icon);
        $("#editModal").modal('show');
    });
});
$(document).on("click", ".deletebutton", function() {
    let url = $(this).attr('data-url');
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Anda tidak dapat mengembalikan data ini jika sudah dihapus',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
    }).then((result) => {
        if (result.value) {
            window.location.href = url;
        }
    })
});
</script>
@endsection

