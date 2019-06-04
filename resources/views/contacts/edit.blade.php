@extends('layout')

@section('content')

<div class="column">
  <h2>Edition d'un contact</h2>  
  <form method="post" action="{{ route('contacts.update', $contact->id) }}">
      @method('PATCH')
      @csrf
      

      <label for= "nom">Nom :</label>
      <input type="text" name="nom" class="form-control" value={{ $contact->nom }}>

      <label for= "prenom">Prénom :</label>
      <input type="text" name="prenom" class="form-control" value={{ $contact->prenom }}>

      <label for= "email">email :</label>
      <input type="email" name="email" class="form-control" value={{ $contact->email }}>

      <label for= "nom">Téléphone :</label>
      <input type="text" name="phone" class="form-control" value={{ $contact->telephone }}>

      <div class="row">
        <button type="submit" class="btn btn-primary btn-spacing btn-spacing">Envoyer</button>
        <a class="btn btn-primary btn-spacing btn-spacing" href="{{ route('contacts.index') }}">Retour</a>
      </div>
  </form>

  @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opps!</strong> Something went wrong<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

</div>
@endsection