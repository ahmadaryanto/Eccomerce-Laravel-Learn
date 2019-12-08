<section class="content-header">
	
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h4>Data User</h4>
		</div>
		<div class="box-tools">
			<div class="col-md-4">
				<a class="btn btn-success btn-sm" href="{{URL::to('')}}/user/add"><i class="fa fa-plus"></i></a>
			</div>
			<form id="frm_userdata">
				{{csrf_field()}}
				<div class="col-md-4">
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" id="filter" name="filter">
								<option value="">No Filter</option>
								<option value="username">Username</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" name="valuefilter" id="valuefilter" class="form-control" placeholder="Input Filter">
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" onclick="loadusermenu()"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="col-md-4 pull-right">
					<select class="form-control" id="jumlahdata" name="jumlahdata" onchange="loadusermenu()">
						<option>10</option>
						<option>25</option>
						<option>50</option>
					</select>
					</div>
				</div>
			</form>
		</div>
		<div class="box-body" id="datauser">

		</div>
	</div>
</section>

<script type="text/javascript">
	loadusermenu();
	function loadusermenu() {
		$.ajax({
			url : '{{URL::to("")}}/user/data',
			method : 'get',
			data : $('#frm_userdata').serialize(),
			error: function(result){
				alert(result);
			},
			success: function(data) {
				$('#datauser').html(data);
			}
		})
	}

	function hapusdata(id) {
		var konfirmasi = confirm('HAPUS DATA?');
		if (!konfirmasi) return;
		$.ajax({
			url : '{{URL::to("")}}/user/delete',
			method : 'post',
			data : {
				'id' : id,
				'_token' : '{{csrf_token()}}'
			},
			error: function(result){
				alert(result);
			},
			success: function(data) {
				loadusermenu();
			}
		})
	}
</script>