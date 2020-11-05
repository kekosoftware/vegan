@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row mt-3 mb-3">
                <div class="col-sm-8 text-left font-italic">
                    <h2>Make a Question</h2>
                </div>
                <div class="col-sm-4 text-right">
                    <a class="btn btn-success" href="{{ route('questions.index') }}" title="Go back"> 
                        <i class="fas fa-backward "></i> 
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Requirement!</strong><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('questions.store') }}" method="POST" >
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <textarea type="text" 
                                name="description" 
                                class="form-control" 
                                placeholder="{{ $suggestion->description }}"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection