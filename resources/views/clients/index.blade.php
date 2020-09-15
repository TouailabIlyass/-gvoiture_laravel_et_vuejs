
        <a href="{{url('clients/create')}}" >Add</a>
        <table>
            <thead>
            <th>nom</th>
	<th>prenom</th>
	<th>midlename</th>
	
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                <td>{{$client->nom}}</td>
	<td>{{$client->prenom}}</td>
	<td>{{$client->midlename}}</td>
	
                <td>
                <form action="{{url('clients/'.$client->)}}" method="POST">
                    <a href="">Update</a>
                    {{method_field('delete')}}
                @csrf
                <button type="submit">Delete</button>
                </form>
            </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        