@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <h3>Ajouter un contact</h3>
                <form action="{{route('contacts.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Entrez le nom du contact" value="{{old('name', '')}}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @enderror   
                    </div>
                    <div class="form-group">
                        <input type="text" name="tel" class="form-control @error('tel') is-invalid @enderror" placeholder="Entrez le téléphone du contact" value="{{old('tel', '')}}">
                            @error('tel')
                                <div class="invalid-feedback">
                                    {{ $errors->first('tel') }}
                                </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrez l'email du contact" value="{{old('email', '')}}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter le contact</button>
                </form>
            </div>
        </div>
    </div>
@endsection
