<section class="content-header">
	
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h4>Tambah Menu</h4>
		</div>
		<form id="frm_addmenu" class="form-horizontal">
			<div class="box-body">

				{{csrf_field()}}
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="menu">Menu</label>
						<div class="col-md-8">
							<input type="text" name="menu" id="menu" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="nama_menu">Nama Menu</label>
						<div class="col-md-8">
							<input type="text" name="nama_menu" id="nama_menu" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="idgrupmenu">Grup Menu</label>
						<div class="col-md-8">
							<select name="idgrupmenu" id="idgrupmenu" class="form-control">
								@foreach ($grupmenu as $gmenu)
								<option value="{{$gmenu->id}}">{{$gmenu->namagrupmenu}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="tampilkan">Tampikan</label>
						<div class="col-md-8">
							<select name="tampilkan" id="tampilkan" class="form-control">
								<option value="1">Ya</option>
								<option value="0">Tidak</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="urutan">Urutan</label>
						<div class="col-md-8">
							<input type="number" name="urutan" id="urutan" class="form-control">
						</div>
					</div>
				</div>

			</div>
			<div class="box-footer">
				<div class="row pull-right">
					<button type="button" class="btn btn-primary" onclick="simpandatamenu()">Simpan</button>
					<a href="{{URL::to('')}}/menu" class="btn btn-default">Back</a>
				</div>
			</div>
		</form>
	</div>

</section>
<script type="text/javascript">

	function simpandatamenu() {
		var konfirmasi = confirm('Yakin simpan data?');
		if (!konfirmasi) return;
		$.ajax({
			url : '{{URL::to("")}}/menu/insert',
			type : 'post',
			data : $('#frm_addmenu').serialize(),
			success : function(data) {
				//alert(data);
				if (data == 'berhasil') {
					toastr.success('Berhasil');
					$('#frm_addmenu')[0].reset();
				} else {
					$.each(data,function (idx, item) {
						console.log(item);
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