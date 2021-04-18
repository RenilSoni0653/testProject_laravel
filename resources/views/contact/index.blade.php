@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <form method="POST" action="/request">
            @csrf
                <div class="card-header">Create Contact</div>
                <div class="card-body">
                    <table width=100%>
                        <tr>
                            <td>No.</td>
                            <td>Name</td>
                            <td>Age</td>
                            <td>Address</td>
                        </tr>
                        <tr>
                        
                        @php
                            $id = auth()->user()->id;
                            $req_from_id = \App\Requested::where('user_id','=',$id)->get();
                            $req_to_id = \App\Requested::where('req_to_id','=',$id)->get();
                            $i = 0;

                            foreach($req_from_id as $re)
                            {
                                echo $re->name;
                            }
                            
                            foreach($req_to_id as $req)
                            {
                                echo $req->name;
                            }
                            $req_data = auth()->user()->requesteds;
                            
                        @endphp
                            @foreach($data as $profiles)
                                <tr>
                                        <td>{{ $i = $i + 1 }}</td>
                                        <td>{{ $profiles->name }}</td>
                                        <td>{{ $profiles->age }}</td>
                                        <td>{{ $profiles->address }}</td>
                                        <td><button name="sub" value="{{ $profiles->id }}">Add Contact</button></td>
                                </tr>   
                                <input type="hidden" name="name" value="{{ $profiles->name }}">                          
                            @endforeach   
                            
                            
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
