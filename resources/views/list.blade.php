<h1>hi</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pangasinan as $ps)
        <tr>
            <td>{{$ps['division']}}</td>
            <td>{{ $ps['school'] }}</td>
            <td>{{ $ps['barangay'] }}</td>

         
        </tr>
        @endforeach
    </tbody>
</table>
