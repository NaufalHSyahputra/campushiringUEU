<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">St</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    @php
    $parents = App\Models\Tblmenu::join('tbluser_role','tbluser_role.role_id','=','tblmenu.role_id')->select('tblmenu.*')->where([['tblmenu.is_parent_child', 'P'],['tbluser_role.user_id',Auth::user()->user_id],['tblmenu.is_visible',1]])->get();
    $childs = App\Models\Tblmenu::join('tbluser_role','tbluser_role.role_id','=','tblmenu.role_id')->select('tblmenu.*')->where([['tblmenu.is_parent_child', 'C'],['tbluser_role.user_id',Auth::user()->user_id], ['tblmenu.is_visible',1]])->whereNotNull('parent_id')->orderBy('menu_desc', 'asc')->get();
    $childwithoutparent = App\Models\Tblmenu::join('tbluser_role','tbluser_role.role_id','=','tblmenu.role_id')->select('tblmenu.*')->where([['tblmenu.is_parent_child', 'C'],['tbluser_role.user_id',Auth::user()->user_id],['tblmenu.is_visible',1]])->whereNull('parent_id')->get();

    @endphp
    @foreach($parents as $parent)
    <li class="dropdown">
      <a href="#" class="nav-link has-dropdown"><i class="{{$parent->icon}}"></i><span>{{$parent->menu_desc}}</span></a>
      <ul class="dropdown-menu">
        @foreach($childs as $child)
        @if($child->parent_id == $parent->id)
        <li><a  style="{{strlen($child->menu_desc) > 22 ? 'height: 70px;' : ''}}" class="nav-link" href="{{ ($child->link_to != NULL ? route($child->link_to) : '#') }}">{{$child->menu_desc}}</a></li>
        @endif
        @endforeach
      </ul>
    </li>
    @endforeach
    @foreach($childwithoutparent as $child)
    <li><a class="nav-link" href="{{$child->link_to}}"><i class="{{$child->icon}}"></i> <span>{{$child->menu_desc}}</span></a></li>
    @endforeach
  </ul>
</aside>
