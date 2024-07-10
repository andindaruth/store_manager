@extends('layouts.app')

@section('title', 'lub In')
@section('page_title', 'New lub In Transaction')

@section('bread_crumb')
    <ol class="breadcrumb float-sm-right btn btn-default">
        <a href={{ route('lub-in.index') }}>
            <li class="breadcrumb-item btn btn-outline-success btn-sm ">lub In Transactions</li>
        </a>
    </ol>
@endsection

@section('main_content')

    <div class="col-sm-12">
        <form method="post" action="{{ route('lub-in.store') }}">
            @csrf
            <div class="card card-outline card-success pl-5 pr-5">
                <div class="card-body">

                    <div class="form-group">
                        <label for="date">Transaction Date *</label>
                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                            <div class="input-group-prepend" data-target="#reservationdate1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                            <input id="date" name="date" type="text" class="form-control datetimepicker-input"
                                data-target="#reservationdate1" value="{{ old('date') }}" placeholder="YYYY-MM-DD"
                                required>
                        </div>
                        @error('date')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lub_id">Lubricant Type *</label>
                        <select class="form-control select2" id="lub_id" name="lub_id" required>
                            <option value="">--Select type</option>
                            @foreach ($lubs as $lub)
                                <option value="{{ $lub->id }}">
                                    {{ $lub->type }}
                                </option>
                            @endforeach
                        </select>
                        @error('lub_id')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="vehicle_id">Vehicle *</label>
                        <select class="form-control select2" id="vehicle_id" name="vehicle_id" required>
                            <option value="">--Select Vehicle</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $lub->id }}">
                                    {{ strtoupper(substr($vehicle->category->name, 0, 1)) }}/{{ $vehicle->model }}/{{ $vehicle->number_plate }}
                                </option>
                            @endforeach
                        </select>
                        @error('vehicle_id')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="person_id">Brought By *</label>
                        <select class="form-control select2" id="person_id" name="person_id" required>
                            <option value="">--Select Person</option>
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                            @endforeach
                        </select>
                        @error('person_id')
                            <div class="text-sm text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity of lubricant *</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="quantity" name="quantity"
                                value="{{ old('quantity') }}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">Litres</span>
                            </div>
                            @error('quantity')
                                <div class="text-sm text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $user->id }}"
                        hidden>
                    <input type="text" class="form-control" id="type" name="type" value="In" hidden>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="card-tools text-right">
                        <button name="submit" type="submit" class="btn btn-success">Save Transaction</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
