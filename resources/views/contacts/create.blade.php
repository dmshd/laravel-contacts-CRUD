@extends('layout')

@section('content')

<div class="column">

  <h2>Ajouter un contact</h2>
  <form method="post" action="{{ route('contacts.store') }}">
  @csrf
    <div class="form-group">
      <label for= "nom">Nom :</label>
      <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">

      <label for= "prenom">Prénom :</label>
      <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}">

      <label for= "email">Adresse mail :</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}">

      <label for= "phone">Téléphone :</label>
      <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
    </div>
    <button type="submit" class="btn btn-primary btn-spacing">Ajouter</button>
  </form>
  @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
</div>

@endsection