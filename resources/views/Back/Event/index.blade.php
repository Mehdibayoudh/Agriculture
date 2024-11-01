@extends('layouts_Admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <!-- Add Event Button -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('eventadmin.create') }}" class="btn btn-primary mx-3 my-3">Add Event</a>
                </div>
                <br>
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Events Table</h6>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Location</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sponsors</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $event->titre }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $event->localisation }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $event->date }}</span>
                                    </td>
                                    <td>
                                        <!-- Sponsors Column -->
                                        @if($event->sponsors->isNotEmpty())
                                            <ul>
                                                @foreach($event->sponsors as $sponsor)
                                                    <li>{{ $sponsor->name }} - {{ $sponsor->industry }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-xs text-secondary mb-0">No sponsors assigned</p>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('eventadmin.edit', $event->id) }}" class="text-secondary font-weight-bold text-xs">
                                            Edit
                                        </a>
                                        <form action="{{ route('eventadmin.destroy', $event->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border:none; background:none;" class="text-danger font-weight-bold text-xs">Delete</button>
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
