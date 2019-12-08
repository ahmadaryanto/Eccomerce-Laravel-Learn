<section class="content-header">
	
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h4>Edita Page</h4>
		</div>
		<form id="frm_editdatapage" class="form-horizontal">
			<div class="box-body">

				{{csrf_field()}}
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="nama_page">Nama</label>
						<div class="col-md-8">
							<input type="text" name="nama_page" id="nama_page" class="form-control" value="{{$dataPage->nama_page}}">
						</div>
					</div>
					
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="title">Title</label>
						<div class="col-md-8">
							<input type="text" name="title" id="title" class="form-control" value="{{$dataPage->title}}">
						</div>
					</div>

				</div>
				<div class="col-md-12">
					<label class="control-label" for="descript">Deskripsi</label>
					<div class="form-group">
						<textarea name="descript" id="descript">{{$dataPage->descript}}</textarea>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<div class="row pull-right">
					<button type="button" class="btn btn-primary" onclick="simpandatapage()">Simpan</button>
					<a href="{{URL::to('')}}/page" class="btn btn-default">Back</a>
				</div>
			</div>
		</form>
	</div>

</section>
<script type="text/javascript">
var options = {
	    filebrowserImageBrowseUrl: 'http://localhost/ecommerce/admin/laravel-filemanager?type=Images',
	    filebrowserImageUploadUrl: 'http://localhost/ecommerce/admin/laravel-filemanager/upload?type=Images&_token=',
	    filebrowserBrowseUrl: 'http://localhost/ecommerce/admin/laravel-filemanager?type=Files',
	    filebrowserUploadUrl: 'http://localhost/ecommerce/admin/laravel-filemanager/upload?type=Files&_token='
	  };
 CKEDITOR.replace('descript',options);
	function simpandatapage() {
		var konfirmasi = confirm('Yakin simpan data?');
		if (!konfirmasi) return;
		CKupdate();
		$.ajax({
			url : '{{URL::to("")}}/page/update',
			type : 'post',
			data : $('#frm_editdatapage').serialize(),
			success : function(data) {
				if (data == 'berhasil') {
					toastr.success('Berhasil');
					$('#frm_editdatapage')[0].reset();
				} else {
					$.each(data,function (idx, item) {
						toastr.warning(item);
					});
				}
			},
			error : function(data) {
				toastr.error(data);
			}
		});
	}


	function CKupdate(){
	    for ( instance in CKEDITOR.instances )
	        CKEDITOR.instances[instance].updateElement();
	}
</script>