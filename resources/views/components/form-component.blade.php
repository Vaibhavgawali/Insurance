<!-- Example in form-component.blade.php -->
<form action="{{ $action }}" method="POST" class="{{$formClass ?? 'forms-sample'}}" enctype="multipart/form-data">
    @csrf
    @if($method == "PATCH")
    @method('PATCH')
    @endif
    @if($layout=="default")
    @foreach ($fields as $field)
    @if($field['type']=='text' || $field['type']=='email' || $field['type']=='password' || $field['type']=='date' || $field['type']=='file' || $field['type']=='textarea')
    <div class="form-group">
        <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
        <input type="{{ $field['type'] }}" class="form-control" name="{{ $field['name'] }}" id="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] ?? '' }}" value="{{ old($field['name'], $modelData ? $modelData[$field['name']] :'') }}">
        @if($errors->has($field['name']))
        <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
        @endif
    </div>
    @endif
    @if($field['type']=='checkbox')
    <div class="form-check form-check-flat form-check-primary">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="{{ $field['name'] }}"> {{ $field['label'] }} </label>
        @if($errors->has($field['name']))
        <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
        @endif
    </div>
    @endif
    @if($field['type']=='radio')
    <div class="col-12">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
            @foreach ($field['options'] as $option)
            <div class="col-sm-4">
                <div class="form-check">
                    <label class="form-check-label">
                        @if($modelData && $modelData[$field['name']]==$option['id'])
                        <input type="radio" class="form-check-input" name="{{ $field['name'] }}" value="{{ old($option['id'], $modelData ? $option['id'] :$option['id']) }}" checked> {{ $option['name'] }}
                        @else
                        <input type="radio" class="form-check-input" name="{{ $field['name'] }}" value="{{ old($option['id'], $modelData ? $option['id'] :$option['id']) }}"> {{ $option['name'] }}
                        @endif
                    </label>
                </div>
            </div>
            @endforeach
            @if($errors->has($field['name']))
            <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
            @endif
        </div>
    </div>
    @endif
    @if($field['type']=='select')
    <div class="form-group">
        <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
        @if($field['multiple'])
        <select class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}" multiple>
            @else
            <select class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}">
                @endif
                <option value="" selected disabled>Select option/s</option>
                @foreach ($field['options'] as $option)
                <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
            @if($errors->has($field['name']))
            <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
            @endif
    </div>
    @endif
    @endforeach

    @elseif($layout=="horizontal")
    @foreach ($fields as $field)
    @if($field['type']=='text' || $field['type']=='email' || $field['type']=='password' || $field['type']=='date')
    <div class="form-group row">
        <label for="{{ $field['name'] }}" class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
        <div class="col-sm-9">
            <input type="{{ $field['type'] }}" class="form-control" name="{{ $field['name'] }}" id="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] ?? '' }}" value="{{ old($field['name'], $modelData ? $modelData[$field['name']] :'') }}">
            @if($errors->has($field['name']))
            <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
            @endif
        </div>
    </div>
    @endif
    @if( $field['type']=='file')
    <div class="form-group row">
        <label for="{{ $field['name'] }}" class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
        <div class="col-sm-9">
            <input type="{{ $field['type'] }}" class="form-control" name="{{ $field['name'] }}" id="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] ?? '' }}" value="{{ old($field['name'], $modelData ? $modelData[$field['name']] :'') }}">
            <a target="_blank" class="nav-link" href="{{ old($field['name'], $modelData ? $modelData[$field['name']] :'') }}">View File</a>
            @if($errors->has($field['name']))
            <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
            @endif
        </div>
    </div>
    @endif
    @if($field['type']=='textarea')
    <div class="form-group row">
        <label for="{{ $field['name'] }}" class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="{{ $field['name'] }}" id="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] ?? '' }}" value="{{ old($field['name'], $modelData ? $modelData[$field['name']] :'') }}">
            {{ old($field['name'], $modelData ? $modelData[$field['name']] :'') }}    
        </textarea>
            @if($errors->has($field['name']))
            <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
            @endif
        </div>
    </div>
    @endif
    @if($field['type']=='checkbox')
    <div class="form-check form-check-flat form-check-primary">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input"> Remember me </label>
        @if($errors->has($field['name']))
        <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
        @endif
    </div>
    @endif
    @if($field['type']=='radio')
    <div class="col-12">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
            @foreach ($field['options'] as $option)
            <div class="col-sm-4">
                <div class="form-check">
                    <label class="form-check-label">
                        @if($modelData && $modelData && $modelData[$field['name']]==$option['id'])
                        <input type="radio" class="form-check-input" name="{{ $field['name'] }}" value="{{ old($option['id'], $modelData ? $option['id'] :$option['id']) }}" checked> {{ $option['name'] }}
                        @else
                        <input type="radio" class="form-check-input" name="{{ $field['name'] }}" value="{{ old($option['id'], $modelData ? $option['id'] :$option['id']) }}"> {{ $option['name'] }}
                        @endif
                    </label>
                </div>
            </div>
            @endforeach
            @if($errors->has($field['name']))
            <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
            @endif
        </div>
    </div>
    @endif
    @if($field['type']=='select')
    <div class="form-group row">
        <label for="{{ $field['name'] }}" class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
        <div class="col-sm-9">

            @if($field['multiple'])
            <select class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}" multiple>
                @else
                <select class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}">
                    @endif
                    <option value="" selected disabled>Select option/s</option>
                    @foreach ($field['options'] as $option)
                    @if($modelData && $option->id==$modelData[$field['name']])
                    <option value="{{ $option->id }}" selected>{{ $option->name }}</option>
                    @else
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                    @endif
                    @endforeach
                </select>
                @if($errors->has($field['name']))
                <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
                @endif
        </div>
    </div>
    @endif
    @endforeach

    @elseif($layout=="inline")
    @foreach ($fields as $field)
    @if($field['type']=='text' || $field['type']=='email' || $field['type']=='password' || $field['type']=='date' || $field['type']=='file')
    <label class="sr-only" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <input type="{{ $field['type'] }}" class="form-control mb-2 mr-sm-2" id="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] }}" value="{{ old($field['name'], $modelData ? $modelData[$field['name']] :'') }}">
    @if($errors->has($field['name']))
    <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
    @endif
    @endif

    @if($field['type']=='checkbox')
    <div class="form-check form-check-flat form-check-primary mx-sm-2">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input"> Remember me </label>
        @if($errors->has($field['name']))
        <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
        @endif
    </div>
    @endif
    @if($field['type']=='radio')
    <div class="col-12">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
            @foreach ($field['options'] as $option)
            <div class="col-sm-4">
                <div class="form-check">
                    <label class="form-check-label">
                        @if($modelData && $modelData[$field['name']]==$option['id'])
                        <input type="radio" class="form-check-input" name="{{ $field['name'] }}" value="{{ old($option['id'], $modelData ? $option['id'] :$option['id']) }}" checked> {{ $option['name'] }}
                        @else
                        <input type="radio" class="form-check-input" name="{{ $field['name'] }}" value="{{ old($option['id'], $modelData ? $option['id'] :$option['id']) }}"> {{ $option['name'] }}
                        @endif
                    </label>
                </div>
            </div>
            @endforeach
            @if($errors->has($field['name']))
            <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
            @endif
        </div>
    </div>
    @endif
    @endforeach
    @elseif($layout=="twocolumn")
    <div class="row {{$fieldColumn}}">
        @foreach ($fields as $field)
        @if($field['type']=='text' || $field['type']=='email' || $field['type']=='password' || $field['type']=='file')
        <div class="col-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
                <div class="col-sm-9">
                    <input type="{{ $field['type'] }}" class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] }}" value="{{ old($field['name'], $modelData ? $modelData[$field['name']] :'') }}">
                    @if($errors->has($field['name']))
                    <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
                    @endif
                </div>
            </div>
        </div>
        @endif
        @if($field['type']=='select')
        <div class="col-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
                <div class="col-sm-9">
                    @if($field['multiple'])
                    <select class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}" multiple>
                        @else
                        <select class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}">
                            @endif
                            <option value="" selected disabled>Select option/s</option>
                            @foreach ($field['options'] as $option)
                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has($field['name']))
                        <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
                        @endif
                </div>
            </div>
        </div>
        @endif
        @if($field['type']=='date')
        <div class="col-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}" placeholder="{{ $field['placeholder'] }}" value="{{ old($field['name'], $modelData ? $modelData[$field['name']] :'') }}" />
                    @if($errors->has($field['name']))
                    <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
                    @endif
                </div>
            </div>
        </div>
        @endif
        @if($field['type']=='radio')
        <div class="col-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
                @foreach ($field['options'] as $option)
                <div class="col-sm-4">
                    <div class="form-check">
                        <label class="form-check-label">
                            @if($modelData && $modelData[$field['name']]==$option['id'])
                            <input type="radio" class="form-check-input" name="{{ $field['name'] }}" value="{{ old($option['id'], $modelData ? $option['id'] :$option['id']) }}" checked> {{ $option['name'] }}
                            @else
                            <input type="radio" class="form-check-input" name="{{ $field['name'] }}" value="{{ old($option['id'], $modelData ? $option['id'] :$option['id']) }}"> {{ $option['name'] }}
                            @endif
                        </label>
                    </div>
                </div>
                @endforeach
                @if($errors->has($field['name']))
                <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
                @endif
            </div>
        </div>
        @endif
        @if($field['type']=='checkbox')
        <div class="col-12">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">{{ $field['label'] }}</label>
                @foreach ($field['options'] as $option)
                <div class="col-sm-4">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="{{ $field['name'] }}" value="{{ old($option->id)??'' }}"> {{ $option->name }}

                        </label>
                    </div>
                </div>
                @endforeach
                @if($errors->has($field['name']))
                <div class="invalid-feedback d-block"> {{ $errors->first($field['name']) }}</div>
                @endif
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @endif
    <button type="submit" class="btn btn-gradient-primary me-2">{{$submitLabel ?? "Submit" }}</button>
    <button class="btn btn-light">Cancel</button>
</form>