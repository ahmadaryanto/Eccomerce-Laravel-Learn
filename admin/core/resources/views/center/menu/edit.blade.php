<section class="content-header">
	
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h4>Edit Menu</h4>
		</div>
		<form id="frm_editmenu" class="form-horizontal">
			<div class="box-body">
			<input type="hidden" name="id" id="id" value="{{$datamenu->id}}">
				{{csrf_field()}}
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="menu">Menu</label>
						<div class="col-md-8">
							<input type="text" name="menu" id="menu" class="form-control" value="{{$datamenu->menu}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="nama_menu">Nama Menu</label>
						<div class="col-md-8">
							<input type="text" name="nama_menu" id="nama_menu" class="form-control" value="{{$datamenu->nama_menu}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="idgrupmenu">Grup Menu</label>
						<div class="col-md-8">
							<select name="idgrupmenu" id="idgrupmenu" class="form-control">
								@foreach ($grupmenu as $gmenu)
								<option value="{{$gmenu->id}}" @if ($gmenu->id == $datamenu->idgrupmenu) selected="" @endif>{{$gmenu->namagrupmenu}}</option>
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
								<option value="1" @if ($datamenu->tampilkan == 1) selected="" @endif>Ya</option>
								<option value="0" @if ($datamenu->tampilkan == 0) selected="" @endif>Tidak</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="urutan">Urutan</label>
						<div class="col-md-8">
							<input type="number" name="urutan" id="urutan" class="form-control" value="{{$datamenu->urutan}}">
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
			url : '{{URL::to("")}}/menu/update',
			type : 'post',
			data : $('#frm_editmenu').serialize(),
			success : function(data) {
				alert(data);
			},
			error : function(data) {
				alert(data);
			}
		});
	}
</script>