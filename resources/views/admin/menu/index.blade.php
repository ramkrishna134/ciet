@extends('layouts.sidebar')

@section('title')
Menu Builder
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check mr-1"></i> {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card">
    {{-- Create New Menu Group --}}
    <div class="card-body">
        <form action="{{ route('menu.store') }}" method="post">
            @csrf
            @method('post')

            <div class="row align-items-center">
                <div class="col-sm-2">
                    <Strong>Create New Menu</Strong>
                </div>
                <div class="col-sm-4">
                    <input type="text" id="name" name="name" placeholder="Menu Name" required class="form-control">
                </div>
                <div class="col-sm-4">
                    <select name="location" id="location" class="form-control">
                        <option value="">-- Select Menu Location --</option>
                        <option value="header">Header</option>
                        <option value="footer">Footer</option>
                    </select>
                </div>

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Create Menu</button>
                </div>
            </div>
        </form>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-sm-3">
        {{-- Menu Groups --}}
        <div class="card">
            <div class="card-body">
                <strong class="mb-2">Your Menus</strong>

                <table class="table">
                    <tbody>
                        @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $menu->name }} <small>({{ $menu->location }})</td>
                            <td>
                                <a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('menu.destroy', $menu) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <hr>

        {{-- <div class="card mt-2">
            <div class="card-body">
                <p><strong>Visual Menu Hierarchy</strong></p>

                @include('admin.menu.item')

            </div>
        </div> --}}
    </div>

    <div class="col-sm-9">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('menuItem.store') }}" method="post">
                    @csrf
                    @method('post')
                    {{-- Crate New Menu Item --}}

                    <div class="card mb-3 bg-light">
                        <div class="card-body">
                            <strong>Create New Menu Item</strong>

                            <div class="row mt-2 align-items-center">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <select name="menu_id" id="menu_id" class="form-control">
                                            <option value="">-- Select Menu --</option>
                                            @foreach ($menus as $menu)
                                                <option value="{{ $menu->id }}">{{ $menu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <input type="text" id="label" name="label" class="form-control" placeholder="Menu Label">
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="mb-3">
                                        <input type="text" id="link" name="link" class="form-control" placeholder="Menu link">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option value="">-- Select Parent Menu --</option>
                                            @foreach ($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <input type="text" name="class" id="class" placeholder="Css class if you want" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="mb-3">
                                        <select name="depth" id="depth" class="form-control">
                                            <option value="0">Depth (0)</option>
                                            <option value="1">Depth (1)</option>
                                            <option value="2">Depth (2)</option>
                                            <option value="3">Depth (3)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="target" name="target" value="1">
                                            <label class="form-check-label" for="target"><small>Open in new tab</small></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <select name="has_child" id="has_child" class="form-control">
                                            <option value="0">-- Menu has Submenu --</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <select name="status" id="status" class="form-control">
                                            <option value="0">Darft</option>
                                            <option value="1">Published</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <select name="lang" id="lang" class="form-control">
                                            <option value="en">English</option>
                                            <option value="hi">Hindi</option>
                                            <option value="ur">Urdu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Create Menu Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

                <hr>
                {{-- List of Menu items --}}
                <strong>Your Menu Items</strong>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Label</th>
                            <th>Menu</th>
                            <th>Link</th>
                            <th>Parent</th>
                            <th>Class</th>
                            <th>Depth</th>
                            <th>Has Child</th>
                            <th>Target</th>
                            <th>Language</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($items as $item)
                        <tr class="menu-item menu-list">
                            <th class="id">{{ $item->id }}</th>
                            <td class="label">{{ $item->label }}</td>
                            <td class="menu" data-menu={{ $item->menu_id }}>{{ $item->menu->name }}</td>
                            <td class="link" data-link="{{ $item->link }}"><a href="{{ url($item->link, $item->lang) }}" target="_blank">{{ $item->link }}</a></td>
                            <td class="parent" data-parent={{ $item->parent_id }}>{{ $item->parent->label ?? '' }}</td>
                            <td class="class">{{ $item->class ?? '' }}</td>
                            <td class="depth">{{ $item->depth }}</td>
                            <td class="has_child" data-child="{{ $item->has_child }}">
                                @if($item->has_child == 0)
                                    No
                                @elseif($item->has_child == 1)
                                    Yes
                                @endif
                            </td>
                            <td class="target" data-target="{{ $item->target }}">
                                @if($item->target == 0)
                                <small>Same Window</small>
                                @else
                                <small>Open in New Window</small>
                                @endif
                            </td>

                            <td class="lang" data-lang="{{ $item->lang }}"> @if($item->lang === 'en')
                                <i class="fas fa-language"></i> English
                                @elseif($item->lang === 'hi')
                                <i class="fas fa-language"></i> Hindi
                                @endif
                            </td>

                            <td class="status" data-status="{{ $item->status }}">
                                @if($item->status == 0)
                                    <span class="badge bg-warning">Darft</span>
                                @elseif($item->status == 1)
                                    <span class="badge bg-primary">Published</span>
                                @endif
                            </td>

                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#editMenuItem" class="btn btn-info btn-sm mb-1"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('menuItem.destroy', $item) }}" class="btn btn-danger btn-sm mb-1"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $items->links() !!}
            </div>
        </div>
    </div>
</div>

{{-- Edit Menu Item Modal --}}

<div class="modal fade" id="editMenuItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editMenuItem" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Menu Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

            {{-- Update Menu Item Form --}}

            <form action="" method="post" id="editMenuItemForm">
                @csrf
                @method('put')

                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">-- Select Menu --</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <input type="text" id="label" name="label" class="form-control" placeholder="Menu Label">
                        </div>
                    </div>
    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <input type="text" id="link" name="link" id="link" class="form-control" placeholder="Menu link">
                        </div>
                    </div>
    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="">-- Select Parent Menu --</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <input type="text" name="class" id="class" placeholder="Css class if you want" class="form-control">
                        </div>
                    </div>
    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <select name="depth" id="depth" class="form-control">
                                <option value="0">Depth (0)</option>
                                <option value="1">Depth (1)</option>
                                <option value="2">Depth (2)</option>
                                <option value="3">Depth (3)</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="up_target" name="target" value="1">
                                <label class="form-check-label" for="up_target"><small>Open in new tab</small></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <select name="has_child" id="has_child" class="form-control">
                                <option value="0">-- Menu has Submenu --</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <select name="status" id="status" class="form-control">
                                <option value="0">Darft</option>
                                <option value="1">Published</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <select name="lang" id="lang" class="form-control">
                                <option value="en">English</option>
                                <option value="hi">Hindi</option>
                                <option value="ur">Urdu</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Menu Item</button>
                        </div>
                    </div>
                </div>

            </form>
            
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
</div>


  <script>
      $(document).ready(function(){

        

        $('#editMenuItem').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal

        // Get Values form menuItem
        var parent = button.parents('.menu-item');

        var id = parent.children('.id').html()

        var label = parent.children('.label').html();
        var link = parent.children('.link').attr('data-link');
        var class_name = parent.children('.class').html();
        var menu = parent.children('.menu').attr('data-menu');
        var parent_id = parent.children('.parent').attr('data-parent');
        var depth = parent.children('.depth').html();
        var status = parent.children('.status').attr('data-status');
        var child = parent.children('.has_child').attr('data-child');
        var lang = parent.children('.lang').attr('data-lang');
        var target = parent.children('.target').attr('data-target');
        


        // Set Values into the modal
        var modal = $('#editMenuItem');

        $('#editMenuItemForm').attr('action', '/admin/menuItem/'+id);

        modal.find('#menu_id').val(1);
        modal.find('#label').val(label);
        modal.find('#link').val(link);
        modal.find('#parent_id').val(parent_id);
        modal.find('#depth').val(depth);
        modal.find('#depth').val(child);
        modal.find('#status').val(status);
        modal.find('#lang').val(lang);

        if(target == 1){
            modal.find('#up_target').prop('checked', true);
        }else{
            modal.find('#up_target').prop('checked', false);
        }
        
        
        })

      })
  </script>

@endsection