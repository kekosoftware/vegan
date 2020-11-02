@extends('layouts.app')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-sm-8 pull-left">
            <h2>Make a Question</h2>
        </div>
        <div class="col-sm-4">
            <a class="btn btn-success" href="{{ route('questions.create') }}" title="Create a question"> 
                <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-sm">
        <thead>
            <th width="10%" class="text-center">Id</th>
            <th width="50%">Title</th>
            <th width="20%" class="text-center">Total Answers</th>
            <th width="20%" class="text-center">Action</th>
        </thead>
        <tbody>
        @foreach($questions as $question)
        <tr>
            <td class="text-center">{{ $question->id }}</td>
            <td>{{ $question->description }}</td>
            <td class="text-center btn btn-outline-info">
                <div class="badge badge-light">
                    {{ $totals }}
                </div>
            </td>
            <td class="text-center">
                <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                    <a href="{{ route('questions.show', $question->id) }}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i>
                    </a>
                    <a href="{{ route('questions.edit', $question->id) }}">
                        <i class="fas fa-edit  fa-lg"></i>
                    </a>
                    {{ csrf_field() }}
                    @method('DELETE')
                    <button type="submit" title="delete" style="border: none; background-color:transparent;">
                        <i class="fas fa-trash fa-lg text-danger"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>

    </table>

    
    <nav class="pagination justify-content-center">
        {{ $questions->links("pagination::bootstrap-4") }}    
    </nav>
    

@endsection