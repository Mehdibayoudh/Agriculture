@extends('layouts_Admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="ps-3">Categories des plantes</h6>
                    <a href="{{ route('planteCategorie.create') }}" class="btn btn-primary mx-3 my-3">Ajouter une categorie</a>
                </div>


                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nom</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Type de sol</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Utilisation</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($planteCategories as $categorie)
                                    <tr>
                                        <td class="text-center">
                                            <h6 class="mb-0 text-sm">{{ $categorie->nom }}</h6>
                                        </td >
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $categorie->type_sol }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $categorie->utilisation }}</p>
                                        </td>
                                        <td class="text-center" >
                                            <a href="{{ route('planteCategorie.edit', $categorie->id) }}"
                                                class="btn btn-secondary btn-sm">
                                                Edit
                                            </a>

                                            <form style="display:inline;" action="{{ route('planteCategorie.destroy', $categorie->id) }}"
                                                method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
