@props(['comment'])
<section class="col-span-8 col-start-5 mt-2">
    <article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u=id{{$comment->user_id}}" width="60" height="60" alt="">
        </div>
        <div>
            <header>
                <h3 class="font-bold">{{$comment->author->username}}</h3>
                <p class="text-xs">Posted
                    <time>{{ $comment->created_at->format('F, j, Y, g:i a')}}</time>
                </p>
                <p class="mt-3 text-s">{{$comment->body}}</p>
            </header>
        </div>
    </article>
</section>
