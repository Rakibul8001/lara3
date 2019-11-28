@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
            </ul>
    </div>
@endif
