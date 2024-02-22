@extends('layouts.default')


@section('content')
    <div class="container mt-5">
        <form method="post" action="{{ route('ticket.store') }}">
            @csrf
            <div class="row">
                <div class="form-row col-4">
                    <div class="form-group">
                        <label for="barcodeType">Primeiro:</label>
                        <input type="text" id="size" name="primeiro" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="barcodeType">Ultimo:</label>
                        <input type="text" id="size" name="ultimo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="barcodeType">Data de validade:</label>
                        <input type="date" id="size" name="data" class="form-control">
                    </div>
                </div>

                <div class="form-row col-4">
                    <div class="form-group">
                        <label for="barcodeType">Sufixo:</label>
                        <input type="text" id="size" name="sufixo" class="form-control">
                    </div>
                    <div class="form-group ">
                        <label for="barcodeType">Prefixo:</label>
                        <input type="text" id="size" name="prefixo" class="form-control">
                    </div>
                </div>

            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary">Gerar Códigos</button>
            </div>
        </form>
    </div>
@endsection
