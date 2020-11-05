<table class="table table-bordered table-responsive-sm table-striped mt-3">
    <thead class="thead-dark">
        <th width="20%" class="text-center font-italic">#</th>
        <th width="80%" class="font-italic">Description</th>
    </thead>
    <tbody>
        @foreach($answers_show as $answer)
            <tr>
                <td class="text-center">{{ $loop->index + 1 }}</td>
                <td class="text-left">{{ $answer->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
