<table class="table table-bordered">
	<thead>
		<tr>
			<th>Username</th>
			<th>Nama User</th>
			<th>Developer</th>
			<th width="10%">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $dt)
			<tr>
				<td>{{$dt->username}}</td>
				<td>{{$dt->nama}}</td>
				<td>
					@if($dt->is_dev==1)
						Ya
					@else
						Tidak
					@endif
				</td>
				<td>
					<a href="{{URL::to('')}}/user/edit/{{$dt->id}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
					<button type="button" class="btn btn-danger" onclick="hapusdata('{{$dt->id}}')"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

{{$data->links()}}