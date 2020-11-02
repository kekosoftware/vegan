@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $questions->description }}</h2>
                    <hr />
                    <h4>Add Answer</h4>
                    <form method="post" action="/storeAnswer}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="post_id" value="{{ $questions->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Answers" />
                        </div>
                    </form>
                    <hr />
                    @include('questions.answersDisplay', 
                        [
                            'answers' => $answers, 
                            'post_id' => $questions->id
                        ]
                    )
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

