@extends('layout')

@section('content')
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <nav>
    <a class="btn btn-primary btn-spacing btn-spacing" href="{{ route('contacts.create') }}">Ajouter un contact</a>
  </nav>
  <table class="table table-striped">
    <thead>
      <tr>
        <td>N°</td>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Adresse email</td>
        <td>Téléphone</td>
        <td colspan="2">Actions</td>
      </tr>
    </thead>
    <tbody>
      @foreach($contacts as $contact)
      <tr>
        <td>{{$contact->id}}</td>
        <td>{{$contact->nom}}</td>
        <td>{{$contact->prenom}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->phone}}</td>
        <td><a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-spacing">Editer</a></td>
        <td>
            <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">

              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-spacing" type="submit">Supprimer</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
