<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h1>Дата</h1>
            <input class="date form-control" type="text" style="width: 200px" id="datepicker">
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <span type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </span>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @forelse($posts as $post)
                        <div style="border-bottom: solid 1px darkgrey; margin-top: 1.5em">
                            @if($post->is_completed)
                                <label style="margin-bottom: -1px; color: #1e7e34; text-decoration: line-through">{{ $post->body }}</label>
                            @else
                                <label style="margin-bottom: -1px">{{ $post->body }}</label>
                            @endif
                            <form method="POST" action="{{ route('destroy', $post->id) }}"
                                  style="margin-top: -15px; margin-right: 5px; vertical-align: bottom; float: right">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">удалить</button>
                            </form>
                            <form method="POST" action="{{ route('update', $post->id) }}"
                                  style="margin-top: -15px; margin-right: 5px; vertical-align: bottom; float: right">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning">редактировать</button>
                            </form>
                            <form method="POST" action="{{ route('complete', $post->id) }}"
                                  style="margin-top: -15px; margin-right: 5px; vertical-align: bottom; float: right">
                                @csrf
                                <button type="submit" class="btn btn-success">выполнено!</button>
                            </form>
                        </div>
                    @empty
                        <div>
                            <label>Нет записей</label>
                        </div>
                    @endforelse
                    <div class="info" style="display: none">
                        <form method="POST" action="{{route('add')}}" id="form" style="margin-top: 2em">
                            @csrf
                            <input type="text" name="content">
                            <input type="text" name="date" id="date" hidden>
                            <button type="submit" class="btn btn-success" id="submit_form">добавить</button>
                        </form>
                    </div>
                    <button class="btn btn-add btn-success" style="margin-top: 2em; border-radius: 50%">+</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="/js/dashboard.js"></script>
