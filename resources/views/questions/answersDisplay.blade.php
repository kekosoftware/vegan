@foreach($answers_show as $answer)
    <div class="display-answer" @if($answer->parent_id != null) style="margin-left:40px;" @endif>
        <p>{{ $answer->description }}</p>
        <a href="" id="reply"></a>
        <form action="{{ route('answers.store') }}" method="POST" >
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="description" class="form-control" />
                <input type="hidden" name="question_id" value="{{ $questions_id }}" />
                <input type="hidden" name="parent_id" value="{{ $answer->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('questions.answersDisplay', ['answers_show' => $answer->replies])
    </div>
@endforeach