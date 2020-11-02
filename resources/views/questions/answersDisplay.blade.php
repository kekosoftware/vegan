@foreach($answers as $answer)
    <div class="display-answer" @if($answer->parent_id != null) style="margin-left:40px;" @endif>
        <p>{{ $answer->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="/answerstore">
        <form action="{{ route('answers.store') }}" method="POST" >
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $answer->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('answersDisplay', ['answers' => $answer->replies])
    </div>
@endforeach