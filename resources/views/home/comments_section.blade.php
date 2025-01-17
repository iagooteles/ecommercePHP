<section class="container d-flex flex-column align-items-center justify-content-center">
    <h1 class="comments-title">Comentários</h1>
    <form class="d-flex flex-column align-items-center w-100" action="{{ url('add_comment') }}">
        @csrf
        <textarea class="form-control w-100" name="comment" id="message" maxlength="250" placeholder="Mande uma mensagem" rows="6"></textarea>
        <br>
        <input type="submit" value="Comment" class="btn btn-primary">
    </form>
</section>

<section class="container d-flex flex-column align-items-center justify-content-center pt-4">
    @foreach($comments as $comment)
    <div class="comment-box p-3 mb-3 w-75 border rounded">
        <b class="comment-name text-primary d-block mb-2">{{ $comment->name }}</b>
        <p class="comment-text text-muted mb-2">{{ $comment->comment }}</p>
        <!-- <a 
        href="javascript:void(0);" 
        class="btn btn-link" 
        onclick="reply(this)"
        data-commentId="{{ $comment->id }}"
        >Reply</a> -->
    </div>
    @endforeach
</section>

<!-- <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Responder Comentário</h5>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 1.2rem;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea class="form-control" name="message" id="message" maxlength="250" placeholder="Escreva seu comentário aqui" rows="4"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div> -->

<script type="text/javascript">
    function reply(comment) {
        const modal = new bootstrap.Modal(document.getElementById('replyModal'));
        modal.show();
    }
</script>