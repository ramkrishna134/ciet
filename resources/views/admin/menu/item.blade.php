@foreach($menu_links as $menu_link)
    <div class="display-menu-item @if($menu_link->parent_id != null)child @endif">
        
        <div class="item">
            <div class="name"><a href="{{ url($menu_link->link, $menu_link->lang) }}">{{ $menu_link->label }}</a></div>
        </div>
        
        @include('admin.menu.item', ['menu_links' => $menu_link->childs])
    </div>
@endforeach