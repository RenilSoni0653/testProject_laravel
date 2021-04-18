@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check Status</div>
                <div class="card-body">
                    <table width=100%>
                    <td>{{' To Requests' }}</td>
                        <tr>
                        
                            <td>No.</td>
                            <td>Name</td>
                            <td>Status</td>
                        </tr>
                        <tr>
                        
                        @php
                            $id = auth()->user()->id;
                            $req_from_id = \App\Requested::where('user_id','=',$id)->get();
                            $req_to_id = \App\Requested::where('req_to_id','=',$id)->get();
                            $i = 0;
                            $j = 0;
                        @endphp
                        
                            @foreach($req_from_id as $re)
                            <tr>
                                <td>{{ $i = $i + 1 }}</td>
                                <td>{{ $re->to_name }}</td>
                                <td>{{ old('status') ??  $re->status}}</td>
                            </tr>
                            @endforeach

                            <td>{{' From Requests' }}</td>
                            @foreach($req_to_id as $req)
                            @if($req->status == 'Pending')
                            <tr>
                                <td>{{ $j = $j + 1 }}</td>
                                <td>{{ $req->from_name }}</td>
                                <td>{{ old('status') ??  $req->status}}</td>
                                <td>                                    
                                    <form method="POST" action="/contact">
                                        @csrf
                                        <button class="btn btn-primary" name="accept" value="{{ $req->user_id }}">Accept Request</button>
                                        <button class="btn btn-primary" name="reject" value="{{ $req->user_id }}">Reject Request</button>
                                        <input type="hidden" name="name" value="{{ $req->from_name }}">
                                        <input type="hidden" name="req_id" value="{{ $req->id }}">
                                        <input type="hidden" name="from_id" value="{{ auth()->user()->id }}">
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach      
                    </table>
                </div>
        </div>
    </div>
</div>
@endsection
