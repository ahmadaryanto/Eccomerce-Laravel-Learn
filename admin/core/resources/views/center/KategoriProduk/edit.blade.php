<section class="content-header">
	
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h4>Edit Kategori Produk</h4>
		</div>
		<form id="frm_updateproduk" class="form-horizontal">
			<div class="box-body">
			<input type="hidden" name="id" id="id" value="{{$datakatproduk->id}}">
				{{csrf_field()}}
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="Urutan">Urutan</label>
						<div class="col-md-8">
							<input type="text" name="Urutan" id="Urutan" class="form-control" value="{{$datakatproduk->Urutan}}">
						</div>
					</div>
					
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="Nama_kategori_produk">Kategori Produk</label>
						<div class="col-md-8">
							<input type="text" name="Nama_kategori_produk" id="Nama_kategori_produk" class="form-control" value="{{$datakatproduk->Nama_kategori_produk}}">
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
					<button type="button" class="btn btn-primary" onclick="updatekatproduk()">Simpan</button>
					<a href="{{URL::to('')}}/kategoriproduk" class="btn btn-default">Back</a>
				</div>
			</div>
		</form>
	</div>

</section>
<script type="text/javascript">
 //CKEDITOR.replace('descript');
 function updatekatproduk() {
 	var konfirmasi = confirm('Yakin simpan data?');
 	if (!konfirmasi) return;
 	$.ajax({
 		url : '{{URL::to("")}}/kategoriproduk/update',
 		type : 'post',
 		data : $('#frm_updateproduk').serialize(),
 		success : function(data) {
 			if (data == 'berhasil') {
					toastr.success('Berhasil');
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