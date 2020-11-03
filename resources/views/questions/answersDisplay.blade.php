@foreach($answers as $answer)
    <div class="display-answer">
        <p>{{ $answer->description }}</p>
        <a href="" id="reply"></a>

        <form action="{{ route('answers.store') }}" method="POST" >        

            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="description" class="form-control" />
                <input type="hidden" name="question_id" value="{{ $questions->id }}" />
                <input type="hidden" name="parent_id" value="{{ $answer->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        
    </div>
@endforeach