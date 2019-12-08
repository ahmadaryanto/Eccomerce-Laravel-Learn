<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nama Attribute</th>
			<th>Keterangan</th>
			
			<th width="10%">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $dt)
			<tr>
				<td>{{$dt->nama_attribute}}</td>
				<td>{{$dt->keterangan}}</td>
				<td>
					<a href="{{URL::to('')}}/attribute/edit/{{$dt->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
					<button type="button" class="btn btn-danger" onclick="hapusdata('{{$dt->id}}')"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

{{$data->links()}}