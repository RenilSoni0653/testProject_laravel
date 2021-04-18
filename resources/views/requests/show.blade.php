@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <form method="POST" action="/request">
            @csrf
                <div class="card-header">Know the status of your contact</div>
                <div class="card-body">
                @php
                    $i = 0;
                @endphp
                    <table width=100%>
                        <tr>
                            <td>No.</td>
                            <td>Name</td>
                            <td>Status</td>
                        </tr>

                        @foreach($requesteds as $req)
                        <tr>
                            <td>{{ $i = $i + 1 }}</td>
                            <td>{{ $req->name }}</td>
                            <td>{{ $req->status }}</td>
                        </tr>
                        
                        @endforeach
                        
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
