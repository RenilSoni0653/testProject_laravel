@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Contact</div>
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
                            $i = 0;
                                
                        @endphp
                        
                            @foreach($contact as $profiles)
                                <tr>
                                        <td>{{ $i = $i + 1 }}</td>
                                        <td>{{ $profiles->name }}</td>
                                        <td>{{ $profiles->age }}</td>
                                        <td>{{ $profiles->address }}</td>
                                        <td><button name="sub" class="btn btn-danger" value="{{ $profiles->id }}">Remove Contact</button></td>
                                </tr>                             
                            @endforeach   
                            
                            
                        </tr>
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection
