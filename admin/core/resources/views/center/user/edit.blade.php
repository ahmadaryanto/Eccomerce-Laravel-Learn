<section class="content-header">
	
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h4>Tambah user</h4>
		</div>
		<form id="frm_edituser" class="form-horizontal">
			<div class="box-body">
				<input type="hidden" name="id" id="id" value="{{$datauser->id}}">
				{{csrf_field()}}
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="username">Username</label>
						<div class="col-md-8">
							<input type="text" name="username" id="username" class="form-control" value="{{$datauser->username}}" readonly="">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="nama">Nama user</label>
						<div class="col-md-8">
							<input type="text" name="nama" id="nama" class="form-control" value="{{$datauser->nama}}">
						</div>
					</div>
					
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="password">Password</label>
						<div class="col-md-8">
							<input type="password" name="password" id="password" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-4" for="is_dev">Developer</label>
						<div class="col-md-8">
							<select class="form-control" name="is_dev" id="is_dev">
								<option @if ($datauser->is_dev == 1) selected="a" @endif value="1">Ya</option>
								<option @if ($datauser->is_dev == 0) selected="a" @endif value="0">Tidak</option>
							</select>
						</div>
					</div>

				</div>
				<!--<div class="col-md-12">
					<div class="form-group">
						<textarea name="descript" id="descript"></textarea>
					</div>
				</div>-->
			</div>
			<div class="box-footer">
				<div class="row pull-right">
					<button type="button" class="btn btn-primary" onclick="simpandatauser()">Simpan</button>
					<a href="{{URL::to('')}}/user" class="btn btn-default">Back</a>
				</div>
			</div>
		</form>
	</div>

</section>
<script type="text/javascript">
 //CKEDITOR.replace('descript');
	function simpandatauser() {
		var konfirmasi = confirm('Yakin simpan data?');
		if (!konfirmasi) return;
		$.ajax({
			url : '{{URL::to("")}}/user/update',
			type : 'post',
			data : $('#frm_edituser').serialize(),
			success : function(data){
				if (data == 'berhasil') {
					toastr.success('Berhasil');
					$('#frm_edituser')[0].reset();
				} else {
					$.each(data,function (idx, item) {
						toastr.warning(item);
					});
				}
			},
			error : function(data) {
				alert(data);
				
			}
		});
	}
</script>