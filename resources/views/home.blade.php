@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                
                
                @if(auth()->user()->profile()->count() != 0)
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <table width=100%>
                        <tr>
                            <td><a href="{{ url('/contact/'.auth()->user()->id) }}">Add Contact(s)</a></td>
                            <td><a href="{{ url('/contact') }}">Show Contact(s)</a></td>
                            <td><a href="{{ url('/status/'.auth()->user()->id) }}">Know Status & Request(s)</a></td>
                        </tr>
                    </table>

                @else
                <div class="card-header">Create Profile</div>
                <div class="card-body">
                <form method="POST" action="/profile">
                @csrf
                <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">Name</label>
                            <div class="col-md-6">
                            
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? auth()->user()->name }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="number" min="1" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" autocomplete="age" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="textarea" cols="10" rows="10" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    @endif
                
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
