@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header col-sm-12">
                    <div class="row mt-3 mb-3">
                        <div class="col-sm-8 text-left font-italic">
                            <h2>{{ $questions->description }}</h2>
                        </div>
                        <div class="col-sm-4 text-right">
                            <a class="btn btn-primary" href="{{ route('questions.index') }}" title="Go back"> 
                                <i class="fas fa-backward "></i> 
                            </a>
                        </div>
                    </div>
                </div>
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
                <div class="card-body">
                    <h4 class="font-italic">Add Answer</h4>
                    <form action="{{ route('answers.store') }}" method="POST" >
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" 
                                        name="description" 
                                        class="form-control"></textarea>
                                    <input type="hidden" name="question_id" value="{{ $questions->id }}" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    @include(
                        'questions.answersDisplay', 
                        [
                            'answers_show' => $answers_list, 
                            'questions_id' => $questions->id
                        ]
                    )
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

