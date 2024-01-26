<div class="comment-box mt-10 border-t border-gray-200 py-10">
    <h2 class="text-2xl font-semibold text-gray-900 mb-5">Komentar</h2>
    @auth
        <textarea
                wire:model="comment"
                class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
                cols="30" row="7"></textarea>
        <button wire:click="postComment"
                class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wider text-white transition duration-200 rounded-lg bg-gray-900 hover:bg-gray-800 focus:shadow-outline focus:outline-none">
            Kirim Komentar
        </button>
    @else
        <a wire:navigate href="{{route('login')}}" class="text-yellow-500 underline py-1">Login to Post Comment</a>
    @endauth
    <div class="user-comments px-3 py-2 mt-5">
        @forelse($this->comments as $comment)
            <div class="comment border-gray-100 py-5 [&:not(:last-child)]:border-b">
                <div class="user-meta flex gap-2 mb-4 text-sm items-center">
                    <x-posts.author :author="$comment->user" size="sm"/>
                    <span class="text-gray-500">{{$comment->created_at->diffForHumans()}}</span>
                </div>
                <div class="text-justify text-gray-700 text-sm">{{$comment->comment}}</div>
            </div>
        @empty
            <div class="text-gray-500 text-center">
                <span>no comment posted</span>
            </div>
        @endforelse
    </div>
    <div class="my-2">
        {{$this->comments->links()}}
    </div>
</div>
