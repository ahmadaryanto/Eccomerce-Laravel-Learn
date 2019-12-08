<section class="content-header">
	
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h4>Edit Attribute</h4>
		</div>
		<form id="frm_editattribute" class="form-horizontal">
			<div class="box-body">
			<input type="hidden" name="id" value="{{$dataattribute->id}}">
				{{csrf_field()}}
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="nama_attribute">Nama Attribute</label>
						<div class="col-md-8">
							<input type="text" name="nama_attribute" id="nama_attribute" class="form-control" value="{{$dataattribute->nama_attribute}}">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="keterangan">Keterangan</label>
						<div class="col-md-8">
							<textarea name="keterangan" id="keterangan" class="form-control">{{$dataattribute->keterangan}}</textarea>
						</div>
					</div>
				</div>

			</div>
			<div class="box-footer">
				<div class="row pull-right">
					<button type="button" class="btn btn-primary" onclick="simpandataattribute()">Simpan</button>
					<a href="{{URL::to('')}}/attribute" class="btn btn-default">Back</a>
				</div>
			</div>
		</form>
	</div>

</section>
<script type="text/javascript">

	function simpandataattribute() {
		var konfirmasi = confirm('Yakin simpan data?');
		if (!konfirmasi) return;
		$.ajax({
			url : '{{URL::to("")}}/attribute/update',
			type : 'post',
			data : $('#frm_editattribute').serialize(),
			success : function(data) {
				//alert(data);
				if (data == 'berhasil') {
					toastr.success('Berhasil');
					//$('#frm_editattribute')[0].reset();
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