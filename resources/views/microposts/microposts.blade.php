<ul class="media-list">
    @foreach ($microposts as $micropost)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $micropost->user->name, ['id' => $micropost->user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                </div>
                
                <div class="row">
                   <div class="col-md-5">
                       <!--favor_button.bladeをinclude-->
                       @include('user_favorites.favorite_button', ['user' => $user])
                   </div>
                   <div class="offset-md-2 col-md-5">
                    @if (Auth::id() == $micropost->user_id)
                        {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    @endif
                   </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->render('pagination::bootstrap-4') }}