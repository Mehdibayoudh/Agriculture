@extends('layouts_Admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">


                <div  class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div style="background-color: #60be74" class="shadow-primary border-radius-lg pt-4 pb-3">
                        <h6  class="text-white text-capitalize ps-3">Pending Gardens Table</h6>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">image</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nom</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">localisation</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">type</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jardins as $jardin)
                                @if($jardin->etat == 0)

                                    <tr>

                                    <td>
                                        @if($jardin->photo)
                                            <img src="{{ asset('storage/' . $jardin->photo) }}" alt="Image of {{ $jardin->nom }}" style="max-width: 80px;max-height: 80px;border-radius: 100%">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $jardin->nom }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $jardin->localisation }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $jardin->type }}</span>
                                    </td>

                                    <td class="align-middle">

                                            <form action="{{ route('jardinBack.accept', $jardin->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                            </form>

                                            <form action="{{ route('jardinBack.decline', $jardin->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                            </form>

                                    </td>

                                </tr>
                                @endif

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="card my-4">


                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div style="background-color: #60be74" class="shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Accepted Gardens Table</h6>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">image</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nom</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">localisation</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">type</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jardins as $jardin)
                                @if($jardin->etat == 1)

                                    <tr>
                                        <td>
                                            @if($jardin->photo)
                                                <img src="{{ asset('storage/' . $jardin->photo) }}" alt="Image of {{ $jardin->nom }}" style="max-width: 80px;max-height: 80px;border-radius: 100%">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $jardin->nom }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $jardin->localisation }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $jardin->type }}</span>
                                        </td>

                                        <td class="align-middle">

                                            <span class="badge bg-success">Accepted</span>

                                        </td>

                                    </tr>
                                @endif

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="card my-4">


                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div style="background-color: #60be74" class="shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Declined Gardens Table</h6>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">image</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nom</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">localisation</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">type</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jardins as $jardin)
                                @if($jardin->etat == -1)

                                    <tr>
                                        <td>
                                            @if($jardin->photo)
                                                <img src="{{ asset('storage/' . $jardin->photo) }}" alt="Image of {{ $jardin->nom }}" style="max-width: 80px;max-height: 80px;border-radius: 100%">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $jardin->nom }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $jardin->localisation }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $jardin->type }}</span>
                                        </td>

                                        <td class="align-middle">

                                            <span class="badge bg-danger">Declined</span>

                                        </td>

                                    </tr>
                                @endif

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
