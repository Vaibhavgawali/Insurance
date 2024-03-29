<!-- resources/views/components/table.blade.php -->
<table class="table {{$tableClass}}">
    <thead>
        <tr>
            @foreach($headers as $header)
            <th class="text-uppercase">{{$header}}</th>
            @endforeach
            @if(count($actions) > 0)
            <th>Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp

        @foreach($items as $item)
        <tr>
            @foreach($headers as $key)
                <td>
                    @if($key == "id")
                        {{$i++}}
                    @elseif($key == "status")
                        @php
                            $status = $item[$key];
                            $badgeClass = $status === "Pass" ? "success" : ($status === "Fail" ? "danger" : "warning");
                            $badgeColor = $status === "Pass" ? "#28a745" : ($status === "Fail" ? "#dc3545" : "#ffc107");
                        @endphp
                        <span class="badge badge-{{ $badgeClass }}" style="background-color: {{ $badgeColor }};">{{ $status }}</span>
                    @else
                        {{$item[$key]}}
                    @endif
                </td>
            @endforeach

            @if(count($actions) > 0)
            <td>
                @foreach($actions as $action)
                    @if($action['action']=='edit' || $action['action']=='view')
                        <a href="{{ $action['url']($item) }}" class="btn btn-{{ $action['class'] ?? 'secondary' }} btn-sm">
                            @if($action['icon']?? '')
                                <i class="{{ $action['icon'] ?? '' }}"></i>
                            @else
                                Take Assessment
                            @endif
                        </a>
                    @endif
                    
                    @if($action['action']=='delete')
                        <form action="{{ $action['url']($item) }}" method="POST" class="d-inline" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-{{ $action['class'] ?? 'secondary' }} btn-sm" onclick="return confirm('Are you sure you want to delete?')">
                                @if($action['icon']?? '')
                                <i class="{{ $action['icon'] ?? '' }}"></i>
                                @else
                                {{ $action['label'] }}
                                @endif
                            </button>
                        </form>
                    @endif
                @endforeach
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

