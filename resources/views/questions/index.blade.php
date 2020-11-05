@extends('layouts.app')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-sm-8 text-left font-italic">
            <h2>List of Questions</h2>
        </div>
        <div class="col-sm-4 text-right">
            <a class="btn btn-success" href="{{ route('questions.create') }}" title="Create a question"> 
                <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered table-responsive-sm table-striped">
        <thead class="thead-dark">
            <th width="10%" class="text-center font-italic">#</th>
            <th width="50%" class="font-italic">Title</th>
            <th width="20%" class="text-center font-italic">Total Answers</th>
            <th width="20%" class="text-center font-italic">Action</th>
        </thead>
        <tbody>
        @foreach($questions as $question)
        <tr>
            <td class="text-center">{{ $loop->index + 1 }}</td>
            <td>{{ $question->description }}</td>
            <td class="text-center">
                <span class="badge badge-pill badge-info p-2">
                    {{ $question->answers_totals_count }}
                </span>
            </td>
            <td class="text-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('questions.show', $question->id) }}" title="show">
                        <button type="button" class="btn btn-success">Show</button>           
                    </a>
                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button type="submit" title="delete" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>

    </table>

    
    <nav class="pagination justify-content-center">
        {{ $questions->links("pagination::bootstrap-4") }}    
    </nav>
    

@endsection