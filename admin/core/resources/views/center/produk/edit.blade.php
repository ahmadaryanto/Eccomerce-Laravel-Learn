<section class="content-header">
	
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h4>Edit Produk</h4>
		</div>
		<form id="frm_editproduk" class="form-horizontal">
			<div class="box-body">
			<input type="hidden" name="id" id="id" value="{{$dataproduk->id}}">
				{{csrf_field()}}
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="kode_produk">Kode produk</label>
						<div class="col-md-8">
							<input type="text" name="kode_produk" id="kode_produk" class="form-control" value="{{$dataproduk->kode_produk}}" readonly="">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="nama_produk">Nama produk</label>
						<div class="col-md-8">
							<input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{$dataproduk->nama_produk}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="id_kategori_produk">Kategori produk</label>
						<div class="col-md-8">
							<select name="id_kategori_produk" id="id_kategori_produk" class="form-control">
								@foreach ($kategori as $kat)
								<option value="{{$kat->id}}" @if ($dataproduk->id_kategori_produk == $kat->id) selected @endif>{{$kat->Nama_kategori_produk}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="jenis_attribute">Jenis attribute</label>
						<div class="col-md-8">
							<select name="jenis_attribute" id="jenis_attribute" class="form-control">
								@foreach ($attribute as $attr)
								<option value="{{$attr->id}}" @if ($dataproduk->jenis_attribute== $attr->id) selected @endif>{{$attr->nama_attribute}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="attribute">Attribute</label>
						<div class="col-md-8">
							<textarea name="attribute" id="attribute" class="form-control">{{$dataproduk->attribute}}</textarea>
							<p class="help-block">Pisahkan attribute dengan titik koma (;)</p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="newproduct">Produk Baru</label>
						<div class="col-md-8">
							<select name="newproduct" id="newproduct" class="form-control">
								<option value="0" @if ($dataproduk->newproduct==0) selected @endif>Tidak</option>
								<option value="1" @if ($dataproduk->newproduct==1) selected @endif>Ya</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="bestseller">Best Seller</label>
						<div class="col-md-8">
							<select name="bestseller" id="bestseller" class="form-control">
								<option value="0" @if ($dataproduk->bestseller==0) selected @endif>Tidak</option>
								<option value="1" @if ($dataproduk->bestseller==1) selected @endif>Ya</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4" for="harga">Harga</label>
						<div class="col-md-8">
							<input type="text" name="harga" id="harga" class="form-control" value="{{$dataproduk->harga}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="diskon">Diskon</label>
						<div class="col-md-8">
							<input type="text" name="diskon" id="diskon" class="form-control" value="{{$dataproduk->diskon}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="hargaakhir">Harga Akhir</label>
						<div class="col-md-8">
							<input type="text" name="hargaakhir" id="hargaakhir" class="form-control" readonly="" value="{{$dataproduk->harga - $dataproduk->diskon}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="berat">Berat (Kg.)</label>
						<div class="col-md-8">
							<input type="text" name="berat" id="berat" class="form-control" value="{{$dataproduk->berat}}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="images">Image</label>
						<div class="col-md-8">
							<div class="input-group">
								<input type="text" name="images" id="images" class="form-control" onchange="javascript:$('#images-preview').attr('src',$(this).val());" value="{{$dataproduk->images}}">
								<span class="input-group-btn">
									<a id="images_browse" data-input="images" data-preview="images-preview" class="btn btn-primary" src="{{$dataproduk->images}}">
								       <i class="fa fa-picture-o"></i>
								     </a>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-8 pull-right">
							<img id="images-preview" style="margin-top:15px;max-height:100px;">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" for="images_lain_input">Image Lain</label>
						<div class="col-md-8">
							<div class="input-group">
								<input type="text" name="images_lain_input" id="images_lain_input" class="form-control">
								<span class="input-group-btn">
									<a id="images_lain_browse" data-input="images_lain_input" class="btn btn-primary">
								       <i class="fa fa-picture-o"></i>
								     </a>
									<button type="button" class="btn btn-primary" onclick="addImageLain()">Add</button>	
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-8 pull-right">
							<ul id="list-images-lain">
							@if (count(json_decode($dataproduk->images_lain)) > 0)
								@foreach (json_decode($dataproduk->images_lain) as $img)
									<li name="{{$img}}">
										<button type="button" class="btn btn-default btn-xs" onclick="removeList('{{$img}}')">X</button>{{$img}}
										<input type="hidden" name="images_lain[]" id="images_lain" value="{{$img}}" />
									</li>
								@endforeach
								@endif
							</ul>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-4" for="simple_desc">Simple Desc.</label>
						<div class="col-md-8">
							<textarea name="simple_desc" id="simple_desc" class="form-control" maxlength="250">{{$dataproduk->simple_desc}}</textarea>
							<p class="help-block">Max 250 karakter.</p>
						</div>
						
					</div>
				</div>
				<label class="col-md-12" for="simple_desc">Deskripsi</label>
				<div class="col-md-12">
					<div class="form-group">
						<textarea name="description" id="description" class="form-control" placeholder="Deskripsi Produk">{{$dataproduk->description}}</textarea>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<div class="row pull-right">
					<button type="button" class="btn btn-primary" onclick="simpandataproduk()">Simpan</button>
					<a href="{{URL::to('')}}/produk" class="btn btn-default">Back</a>
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
	CKEDITOR.replace('description',options);
	$('#images_browse').filemanager('image');
	$('#images_lain_browse').filemanager('image');
	function simpandataproduk() {
		var konfirmasi = confirm('Yakin simpan data?');
		if (!konfirmasi) return;
		CKupdate();
		$.ajax({
			url : '{{URL::to("")}}/produk/update',
			type : 'post',
			data : $('#frm_editproduk').serialize(),
			success : function(data) {
				if (data == 'berhasil') {
					toastr.success('Berhasil');
				} else {
					$.each(data,function (idx, item) {
						console.log(item);
						toastr.warning(item);
					});
				}
			},
			error : function(data) {
				alert(data);
				toastr.warning('Gagal/Salah'); 
			}
		});
	}

	function addImageLain() {
		var urlpath = $('#images_lain_input').val();
		if (urlpath.trim() == "") return;

		var list = '<li name="'+urlpath+'">';
		list += '<button type="button" class="btn btn-default btn-xs" onclick="removeList(\''+urlpath+'\')">X</button>' + '&nbsp;';
		list += urlpath;
		list += '<input type="hidden" name="images_lain[]" id="images_lain" value="'+urlpath+'"" />';
		list += '</li>';

		$('#list-images-lain').append(list);
		$('#images_lain_input').val('');
	}
	
	function removeList(path) {
		$('[name="'+path+'"]').remove();
	}
	function CKupdate(){
	    for ( instance in CKEDITOR.instances )
	        CKEDITOR.instances[instance].updateElement();
	}
	$('#harga').number(true,0);
	$('#diskon').number(true,0);
	$('#hargaakhir').number(true,0);

	$('#harga').focusout(function(){
		var hargaakhir = parseInt($('#harga').val()) - parseInt($('#diskon').val());
		$('#hargaakhir').val(hargaakhir);
	});

	$('#diskon').focusout(function(){
		var hargaakhir = parseInt($('#harga').val()) - parseInt($('#diskon').val());
		$('#hargaakhir').val(hargaakhir);
	})
</script>