@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- TODO href de la balise <a> pour pointer vers la route de création de contact -->
                <a class="btn btn-success float-right" href="{{ route('contacts.create') }}">+</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom du contact</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- TODO : Début de la boucle -->
                    @forelse ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->tel }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>
                                <!-- TODO href de la balise <a> pour pointer vers la route de modification du contact -->
                                <a class="btn btn-primary" href="{{ route('contacts.edit', $contact->id)}}">Modifier</a>

                                <a class="btn btn-danger" style="color: white;"
                                onclick="document.getElementById('delete-form-{{$contact->id}}').submit()">Supprimer</a>
                              
                                <!-- TODO Form pour la suppression d'un contact -->
                                <form id="delete-form-{{$contact->id}}" action="{{ route('contacts.destroy', $contact->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    <!-- TODO : Conditions pas de contact -->
                    @empty
                        <tr>
                            <td>Liste de contact vide.</td>
                        </tr>
                    <!-- TODO : FIN Boucle -->
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
