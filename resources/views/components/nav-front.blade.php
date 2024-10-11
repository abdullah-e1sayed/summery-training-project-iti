<div>
    @foreach ($items as $item )
        <li class="nav-item">
            <a  style="margin-left: 20px;" href=" {{ route("{$item['route']}") }}" class="nav-link {{ Route::is($item['active']) ?'text-white':'' }}" >{{$item['title']}}</a>
        </li>        
    @endforeach
</div>